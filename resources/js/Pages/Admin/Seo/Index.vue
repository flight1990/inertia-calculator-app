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
    {key: 'url', title: 'URL', align: 'center'},
    {key: 'h1', title: 'H1', align: 'center'},
    {key: 'title', title: 'Title', align: 'center'},
    {key: 'description', title: 'Description', align: 'center'},
    {key: 'keywords', title: 'Keywords', align: 'center'},
    {key: 'robots', title: 'Robots', align: 'center'},
    {key: 'no_index', title: 'No index', align: 'center'},
    {key: 'no_follow', title: 'No follow', align: 'center'},
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

const updateOptionsHandler = (options) => {
    params.page = options.page;
    params.limit = options.itemsPerPage;
    params.sortBy = options.sortBy;

    fetchSeo();
}

const fetchSeo = async () => {
    try {
        loading.value = true;

        const {data} = await axios.get('/api/seo', {params});

        items.value = data.data;
        total.value = data.meta.total;
    } catch (e) {
    } finally {
        loading.value = false;
    }
}

const deleteSeo = (id) => {
    router.delete(`/admin/seo/${id}`, {
        onSuccess() {
            fetchSeo();
        }
    });
}

</script>

<template>
    <Head>
        <title>Seo</title>
    </Head>

    <Link href="/admin/seo/create">Create</Link>

    <FDataTableServer
        :headers="headers"
        :items="items"
        :items-length="total"
        :loading="loading"
        @update:options="updateOptionsHandler"
    >

        <template v-slot:item.created_at="{item}">
            {{ useDateTransformer(item.created_at) }}
        </template>

        <template v-slot:item.updated_at="{item}">
            {{ useDateTransformer(item.updated_at) }}
        </template>

        <template v-slot:item.actions="{item}">
            <Link :href="`/admin/seo/${item.id}/edit`">Edit</Link>
            <button @click="deleteSeo(item.id)">Delete</button>
        </template>
    </FDataTableServer>
</template>
