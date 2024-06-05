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
    {key: 'question', title: 'Question'},
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

    fetchFaqs();
}

const fetchFaqs = async () => {
    try {
        loading.value = true;

        const {data} = await axios.get('/api/faq', {params});

        items.value = data.data;
        total.value = data.meta.total;
    } catch (e) {
    } finally {
        loading.value = false;
    }
}

const deleteFaq = (id) => {
    router.delete(`/admin/faq/${id}`, {
        onSuccess() {
            fetchFaqs();
        }
    });
}

</script>

<template>
    <Head>
        <title>FAQ</title>
    </Head>

    <Link href="/admin/faq/create">Create</Link>

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
            <Link :href="`/admin/faq/${item.id}/edit`">Edit</Link>
            <button @click="deleteFaq(item.id)">Delete</button>
        </template>
    </FDataTableServer>
</template>
