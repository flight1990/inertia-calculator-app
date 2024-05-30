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
    <table width="100%">
        <slot name="thead" :headers="headers">
            <thead>
            <tr>
                <th v-if="showExpanded"></th>
                <th v-if="showSelected" align="center">
                    <input
                        type="checkbox"
                        :checked="isAllSelected"
                        :indeterminate="isPartiallySelected"
                        @click="toggleSelectAll"
                    />
                </th>
                <th v-for="header in headers" :key="header.key" :align="header.align ?? 'left'">
                    <slot :name="`head.${header.key}`" :header="header">
                        <button
                            v-if="(header.sortable !== false && !disableSort)"
                            @click="toggleSort(header.key)"
                        >
                            {{ getSortState(header.key) }}
                        </button>

                        {{ header.title }}
                    </slot>
                </th>
            </tr>
            </thead>
        </slot>
        <slot name="tbody" :items="items">
            <tbody>
            <template v-if="loading">
                <tr>
                    <td :colspan="colSpan">
                        <slot name="loading">{{ loadingText }}</slot>
                    </td>
                </tr>
            </template>
            <template v-else>
                <template v-if="items.length">
                    <template v-for="item in items" :key="item[itemKey]">
                        <tr @dblclick.prevent="dbClickRowHandler(item)">
                            <td v-if="showExpanded">
                                <button @click.prevent="toggleExpandedHandler(item[itemValue])">
                                    {{ isRowExpanded(item[itemValue]) ? '-' : '+' }}
                                </button>
                            </td>
                            <td v-if="showSelected" align="center">
                                <input type="checkbox" :value="item[itemValue]" v-model="selected"/>
                            </td>
                            <td v-for="header in headers" :key="header.key" :align="header.align ?? 'left'">
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
                        <td :colspan="colSpan">
                            {{ noDataText }}
                        </td>
                    </tr>
                </template>
            </template>
            </tbody>
        </slot>
        <slot name="tfoot">
            <tr>
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

                    <button :disabled="isPrevBtnDisabled" @click.prevent="prevPageHandler">
                        {{ prevPageLabel }}
                    </button>
                    <template v-if="showCurrentPage">
                        {{ options.page }}
                    </template>
                    <button :disabled="isNextBtnDisabled" @click.prevent="nextPageHandler">
                        {{ nexPageLabel }}
                    </button>
                </td>
            </tr>
        </slot>
    </table>
</template>
