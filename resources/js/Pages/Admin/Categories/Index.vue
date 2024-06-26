<script setup>

import {Head, router, Link} from "@inertiajs/vue3";
import Layout from "@/Layouts/Admin.vue";
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
        <title>Categories</title>
    </Head>

    expanded: {{ expanded }}
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
            <Link :href="`/admin/categories/${item.id}/edit`">Edit</Link>
            <button @click="deleteCategory(item.id)">Delete</button>
        </template>
    </FDataTableServer>
</template>
