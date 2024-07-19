<script setup>
import {computed, onMounted, reactive, watch, defineModel} from "vue";
import datableConfig from "./datatableConfig.js";

const props = defineProps({
    headers: {
        type: Array,
        required: true
    },
    items: {
        type: Array,
        required: true
    },
    disableSort: {
        type: Boolean,
        default: datableConfig.disableSort
    },
    page: Number,
    itemsPerPage: Number,
    itemsLength: {
        type: Number,
        required: true,
        default: 0
    },
    loading: Boolean,
    multipleSort: {
        type: Boolean,
        default: datableConfig.multipleSort
    },
    mustSort: {
        type: Boolean,
        default: datableConfig.mustSort
    },
    sortBy: Object,
    showCurrentPage: {
        type: Boolean,
        default: true
    },
    showExpanded: Boolean,
    showSelected: Boolean,
    itemValue: {
        type: String,
        default: datableConfig.itemValue
    },
    itemKey: {
        type: String,
        default: datableConfig.itemKey
    },
    itemsPerPageOptions: {
        type: Array,
        default: () => datableConfig.itemsPerPageOptions,
    },
    loadingText: {
        type: String,
        default: datableConfig.loadingText,
    },
    itemsPerPageText: {
        type: String,
        default: datableConfig.itemsPerPageText,
    },
    noDataText: {
        type: String,
        default: datableConfig.noDataText,
    },
    pageText: {
        type: String,
        default: datableConfig.pageText,
    },
    nexPageLabel: {
        type: String,
        default: datableConfig.nexPageLabel
    },
    prevPageLabel: {
        type: String,
        default: datableConfig.prevPageLabel
    },
    firstPageLabel: {
        type: String,
        default: datableConfig.firstPageLabel
    },
    lastPageLabel: {
        type: String,
        default: datableConfig.lastPageLabel
    }
});

const emits = defineEmits([
    "update:options",
    "update:page",
    "update:itemsPerPage",
    "update:sortBy",
    "dbClick:row",
]);

const expanded = defineModel("expanded", {default: []});
const selected = defineModel("selected", {default: []});

const options = reactive({
    page: props.page ?? 1,
    itemsPerPage: props.itemsPerPage ?? 10,
    sortBy: props.sortBy ?? {}
});

const computedPageText = computed(() => {
    return props.pageText
        .replace("{0}", (options.page - 1) * options.itemsPerPage + 1)
        .replace("{1}", Math.min(options.page * options.itemsPerPage, props.itemsLength))
        .replace("{2}", props.itemsLength);
});

const isPrevBtnDisabled = computed(() => options.page === 1);
const isNextBtnDisabled = computed(() => options.page >= Math.ceil(props.itemsLength / options.itemsPerPage));

const isFirstPageBtnDisabled = computed(() => options.page === 1);
const isLastPageBtnDisabled = computed(() => options.page >= Math.ceil(props.itemsLength / options.itemsPerPage));

const colSpan = computed(() => {
    let span = props.headers.length;
    if (props.showSelected) span++;
    if (props.showExpanded) span++;
    return span;
});

const isAllSelected = computed(() => selected.value.length && (selected.value.length === props.items.length));
const isPartiallySelected = computed(() => selected.value.length > 0 && selected.value.length < props.items.length);

const getSortState = (key) => {
    if (!options.sortBy[key]) return 'off';
    return options.sortBy[key];
};

const toggleSort = (key) => {
    const sortStates = ['off', 'asc', 'desc'];
    const nextState = (current) => sortStates[(sortStates.indexOf(current) + 1) % sortStates.length];

    if (props.multipleSort) {
        options.sortBy[key] = nextState(options.sortBy[key] || 'off');
    } else {
        Object.keys(options.sortBy).forEach(k => {
            if (k !== key) {
                options.sortBy[k] = 'off';
            }
        });

        options.sortBy[key] = nextState(options.sortBy[key] || 'off');

        if (props.mustSort && options.sortBy[key] === 'off') {
            options.sortBy[key] = 'asc';
        }
    }

    Object.keys(options.sortBy).forEach(k => {
        if (options.sortBy[k] === 'off') delete options.sortBy[k];
    });

    emits('update:sortBy', options.sortBy);
};

const toggleSelectAll = () => {
    if (isAllSelected.value) {
        selected.value = [];
    } else {
        selected.value = props.items.map((item) => item[props.itemValue]);
    }
};

const dbClickRowHandler = (item) => {
    emits("dbClick:row", item);
};

const updateOptionsHandler = () => {
    emits("update:options", options);
};

const updateItemsPerPageHandler = () => {
    options.page = 1;
    emits("update:itemsPerPage", options.itemsPerPage);
};

const prevPageHandler = () => {
    options.page--;
    updatePageHandler();
};

const nextPageHandler = () => {
    options.page++;
    updatePageHandler();
};

const firstPageHandler = () => {
    options.page = 1;
    updatePageHandler();
};

const lastPageHandler = () => {
    options.page = Math.ceil(props.itemsLength / options.itemsPerPage);
    updatePageHandler();
};

const autoPrevPage = () => {
    if (options.page > 1 && !props.loading && !props.items.length) {
        options.page --;
    }
}

const updatePageHandler = () => {
    emits("update:page", options.page);
};

const isRowExpanded = (id) => expanded.value.includes(id);

const toggleExpandedHandler = (id) => {
    const index = expanded.value.indexOf(id);
    if (index !== -1) {
        expanded.value.splice(index, 1);
    } else {
        expanded.value.push(id);
    }
};

watch(
    () => options,
    () => updateOptionsHandler(),
    {deep: true}
);

watch(() => props.items, () => autoPrevPage());

onMounted(() => updateOptionsHandler());
</script>

<template>
    <div class="block w-full overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <slot name="thead" :headers="headers">
                <thead class="bg-gray-50">
                    <tr>
                        <th v-if="showExpanded"></th>
                        <th v-if="showSelected" align="center" class="px-4 py-3">
                            <label for="hs-at-with-checkboxes-main" class="flex">
                                <input
                                    type="checkbox"
                                    :checked="isAllSelected"
                                    :indeterminate="isPartiallySelected"
                                    @click="toggleSelectAll"
                                    class="shrink-0 border-gray-300 rounded text-primary-600 focus:ring-primary-500 disabled:opacity-50 disabled:pointer-events-none"
                                />
                            </label>
                        </th>
                        <th v-for="header in headers" :key="header.key" :align="header.align ?? 'center'" class="px-4 py-3">
                            <slot :name="`head.${header.key}`" :header="header">
                                <span class="text-xs font-semibold uppercase tracking-wide text-gray-800">
                                    {{ header.title }}
                                </span>
                                <button
                                    v-if="(header.sortable !== false && !disableSort)"
                                    @click="toggleSort(header.key)"
                                >
                                    {{ getSortState(header.key) }}
                                </button>
                            </slot>
                        </th>
                    </tr>
                </thead>
            </slot>
            <slot name="tbody" :items="items">
                <tbody class="divide-y divide-gray-200 bg-white">
                    <template v-if="loading">
                        <tr>
                            <td :colspan="colSpan" class="size-px px-2 py-3 text-sm text-gray-700">
                                <slot name="loading">{{ loadingText }}</slot>
                            </td>
                        </tr>
                    </template>
                    <template v-else>
                        <template v-if="items.length">
                            <template v-for="item in items" :key="item[itemKey]">
                                <tr @dblclick.prevent="dbClickRowHandler(item)" class="hover:bg-gray-50">
                                    <td v-if="showExpanded" class="size-px px-2 py-2 text-sm text-gray-700">
                                        <button @click.prevent="toggleExpandedHandler(item[itemValue])">
                                            {{ isRowExpanded(item[itemValue]) ? '-' : '+' }}
                                        </button>
                                    </td>
                                    <td v-if="showSelected" align="center" class="size-px px-2 py-2 text-sm text-gray-700">
                                        <input type="checkbox" :value="item[itemValue]" v-model="selected"/>
                                    </td>
                                    <td v-for="header in headers" :key="header.key" :align="header.align ?? 'left'" class="size-px px-2 py-2 text-sm text-gray-700">
                                        <slot :name="`item.${header.key}`" :item="item">
                                            {{ item[header.key] }}
                                        </slot>
                                    </td>
                                </tr>
                                <tr v-if="isRowExpanded(item[itemValue])">
                                    <td :colspan="colSpan">
                                        <slot name="expanded-row" :item="item">

                                        </slot>
                                    </td>
                                </tr>
                            </template>
                        </template>
                        <template v-else>
                            <tr>
                                <td :colspan="colSpan" class="size-px px-6 py-3 text-sm text-center text-gray-700">
                                    {{ noDataText }}
                                </td>
                            </tr>
                        </template>
                    </template>
                </tbody>
            </slot>
        </table>
    </div>
    <slot name="tfoot">
        <div class="px-6 py-4 border-t border-gray-200 flex flex-col sm:flex-row items-center justify-between gap-4 !mt-0">
            <div class="order-last sm:order-first flex items-center gap-x-3.5">
                <label>
                    <!-- {{ itemsPerPageText }} -->
                    <select v-model="options.itemsPerPage" @change="updateItemsPerPageHandler"
                        class="form-select py-1.5 px-2 pe-9 block w-full border-gray-200 rounded-lg text-sm font-medium focus:border-primary-500 focus:ring-primary-500 disabled:opacity-50 disabled:pointer-events-none">
                        <option v-for="option in itemsPerPageOptions" :key="option.value" :value="option.value">
                            {{ option.title }}
                        </option>
                    </select>
                </label>
                
            </div>
            <div class="flex items-center gap-x-2">
                <button :disabled="isFirstPageBtnDisabled" @click.prevent="firstPageHandler" type="button" class="py-1.5 px-1.5 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none">
                    <svg class="flex-shrink-0 size-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m17 18-6-6 6-6"/><path d="M7 6v12"/></svg>
                </button>
                <button :disabled="isPrevBtnDisabled" @click.prevent="prevPageHandler" type="button" class="py-1.5 px-1.5 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none">
                    <svg class="flex-shrink-0 size-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m15 18-6-6 6-6"/></svg>
                </button>
                <span class="text-sm font-semibold text-gray-800">
                    {{ computedPageText }}
                </span>
                <!-- <div v-if="showCurrentPage" class="py-1.5 px-2.5 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700">
                    {{ options.page }}
                </div> -->
                <button :disabled="isNextBtnDisabled" @click.prevent="nextPageHandler" type="button" class="py-1.5 px-1.5 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none">
                    <svg class="flex-shrink-0 size-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"/></svg>
                </button>
                <button :disabled="isLastPageBtnDisabled" @click.prevent="lastPageHandler" type="button" class="py-1.5 px-1.5 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none">
                    <svg class="flex-shrink-0 size-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m7 18 6-6-6-6"/><path d="M17 6v12"/></svg>
                </button>
            </div>
        </div>
        <!-- <tr>
            <td :colspan="colSpan">
                {{ computedPageText }}
                <label>
                    {{ itemsPerPageText }}
                    <select v-model="options.itemsPerPage" @change="updateItemsPerPageHandler">
                        <option v-for="option in itemsPerPageOptions" :key="option.value" :value="option.value">
                            {{ option.title }}
                        </option>
                    </select>
                </label>
                <button :disabled="isFirstPageBtnDisabled" @click.prevent="firstPageHandler">
                    {{ firstPageLabel }}
                </button>
                <button :disabled="isPrevBtnDisabled" @click.prevent="prevPageHandler">
                    {{ prevPageLabel }}
                </button>
                <template v-if="showCurrentPage">
                    {{ options.page }}
                </template>
                <button :disabled="isNextBtnDisabled" @click.prevent="nextPageHandler">
                    {{ nexPageLabel }}
                </button>
                <button :disabled="isLastPageBtnDisabled" @click.prevent="lastPageHandler">
                    {{ lastPageLabel }}
                </button>
            </td>
        </tr> -->
    </slot>
</template>
