<script setup>

import Layout from "@/Layouts/Admin.vue";
import {Head, Link, useForm} from "@inertiajs/vue3";
import FTextInput from "@/Components/Base/FTextInput.vue";

defineOptions({
    layout: Layout
});

const props = defineProps({
    category: Object
});

const form = useForm({
    name: props.category?.name ?? "",
    seo_title: props.category?.seo_title ?? "",
    seo_description: props.category?.seo_description ?? "",
    seo_keywords: props.category?.seo_keywords ?? "",
});

const saveCategory = () => {
    props.category ? form.patch(`/admin/categories/${props.category.id}`) : form.post('/admin/categories');
}

</script>

<template>
    <Head>
        <title>{{ category ? 'Edit' : 'Create' }} category</title>
    </Head>

    <form @submit.prevent="saveCategory">

        <FTextInput
            label="Name"
            v-model="form.name"
            :error-message="form.errors.name"
        />

        <FTextInput
            label="Seo title"
            v-model="form.seo_title"
            :error-message="form.errors.seo_title"
        />

        <FTextInput
            label="Seo description"
            v-model="form.seo_description"
            :error-message="form.errors.seo_description"
        />

        <FTextInput
            label="Seo keywords"
            v-model="form.seo_keywords"
            :error-message="form.errors.seo_keywords"
        />

        <button type="submit">{{ category ? 'Update' : 'Create' }}</button>
    </form>

    <Link href="/admin/categories">Return to index</Link>
</template>
