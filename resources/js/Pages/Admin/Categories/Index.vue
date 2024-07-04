<script setup>

    import {Head, router, Link} from "@inertiajs/vue3";
    import Layout from "@/Layouts/Admin/Admin.vue";
    import FDataTableServer from "@/Components/Base/DataTables/FDataTableServer.vue";
    import {useDateTransformer} from "@/Composables/useDateTransformer.js";
    import {reactive, ref} from "vue";

    defineOptions({
        layout: Layout
    });

    const headers = ref([
        {key: 'id', title: 'ID', align: 'center'},
        {key: 'name', title: 'Name'},
        {key: 'icon', title: 'Icon'},
        {key: 'slug', title: 'Slug'},
        {key: 'created_at', title: 'Created at', align: 'center'},
        {key: 'updated_at', title: 'Updated at', align: 'center'},
        {key: 'actions', title: 'Actions', align: 'center'},
    ]);

    const params = reactive({
        page: 1,
        limit: 10,
        sortBy: {}
    });

    const items = ref([]);
    const total = ref(0);
    const loading = ref(false);
    const selected = ref([]);
    const expanded = ref([]);

    const updateOptionsHandler = (options) => {
        params.page = options.page;
        params.limit = options.itemsPerPage;
        params.sortBy = options.sortBy;

        fetchCategories();
    }

    const fetchCategories = async () => {
        try {
            loading.value = true;

            const {data} = await axios.get('/api/categories', {params});

            items.value = data.data;
            total.value = data.meta.total;
        } catch (e) {
        } finally {
            loading.value = false;
        }
    }

    const deleteCategory = (id) => {
        router.delete(`/admin/categories/${id}`, {
            onSuccess() {
                fetchCategories();
            }
        });
    }

</script>

<template>
    <Head>
        <title>Категории</title>
    </Head>

    <div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden">
        <div class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-b border-gray-200">
            <div>
                <h2 class="text-xl font-semibold text-gray-800">
                    Категории
                </h2>
            </div>
            <div>
                <div class="inline-flex gap-x-2">
                    <Link href="/admin/categories/create" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-primary-600 text-white hover:bg-primary-700 disabled:opacity-50 disabled:pointer-events-none">
                        <svg
                            class="flex-shrink-0 size-4"
                            xmlns="http://www.w3.org/2000/svg"
                            width="24"
                            height="24"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                        >
                            <path d="M5 12h14"/>
                            <path d="M12 5v14"/>
                        </svg>
                        Добавить
                    </Link>
                </div>
            </div>
        </div>
        <FDataTableServer
            :headers="headers"
            :items="items"
            :items-length="total"
            :loading="loading"
            @update:options="updateOptionsHandler"
        >
            <template v-slot:item.icon="{item}">
                <div v-html="item.icon" class="text-xl text-center"></div>
            </template>
            <template v-slot:item.created_at="{item}">
                {{ useDateTransformer(item.created_at) }}
            </template>
            <template v-slot:item.updated_at="{item}">
                {{ useDateTransformer(item.updated_at) }}
            </template>
            <template v-slot:item.actions="{item}">
                <div class="inline-flex gap-2">
                    <Link :href="`/admin/categories/${item.id}/edit`" class="py-1.5 px-1.5 inline-flex text-sm font-medium rounded-lg border border-amber-200 bg-amber-100 text-amber-800 shadow-sm hover:bg-amber-200 disabled:opacity-50 disabled:pointer-events-none">
                        <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21.174 6.812a1 1 0 0 0-3.986-3.987L3.842 16.174a2 2 0 0 0-.5.83l-1.321 4.352a.5.5 0 0 0 .623.622l4.353-1.32a2 2 0 0 0 .83-.497z"/><path d="m15 5 4 4"/></svg>
                    </Link>
                    <button @click="deleteCategory(item.id)" type="button" class="py-1.5 px-1.5 inline-flex text-sm font-medium rounded-lg border border-rose-200 bg-rose-100 text-rose-800 shadow-sm hover:bg-rose-200 disabled:opacity-50 disabled:pointer-events-none">
                        <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 6h18"/><path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"/><path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"/><line x1="10" x2="10" y1="11" y2="17"/><line x1="14" x2="14" y1="11" y2="17"/></svg>
                    </button>
                </div>
            </template>
        </FDataTableServer>
    </div>

    <!-- expanded: {{ expanded }}
    selected: {{ selected }}

    <Link href="/admin/categories/create">Create</Link>

    <FDataTableServer
        v-model:expanded="expanded"
        v-model:selected="selected"
        :show-selected="true"
        :show-expanded="true"
        :headers="headers"
        :items="items"
        :items-length="total"
        :loading="loading"
        @update:options="updateOptionsHandler"
    >
        <template v-slot:loading>
            My fucking loading...
        </template>

        <template v-slot:expanded-row="{item}">
            {{ item }}
        </template>

        <template v-slot:item.created_at="{item}">
            {{ useDateTransformer(item.created_at) }}
        </template>

        <template v-slot:item.updated_at="{item}">
            {{ useDateTransformer(item.updated_at) }}
        </template>

        <template v-slot:item.actions="{item}">
            <Link :href="`/admin/categories/${item.id}/edit`">Edit</Link>
            <button @click="deleteCategory(item.id)">Delete</button>
        </template>
    </FDataTableServer> -->
</template>
