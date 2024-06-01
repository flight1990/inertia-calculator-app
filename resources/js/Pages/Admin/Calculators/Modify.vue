<script setup>

import Layout from "@/Layouts/Admin.vue";
import {Head, Link, useForm} from "@inertiajs/vue3";
import FTextInput from "@/Components/Base/FTextInput.vue";
import FSelect from "@/Components/Base/FSelect.vue";
import FTextArea from "@//Components/Base/FTextArea.vue";

defineOptions({
    layout: Layout
});

const props = defineProps({
    calculator: Object,
    categories: Object
});

const form = useForm({
    name: props.calculator?.name ?? "",
    description: props.calculator?.description ?? "",
    category_id: props.calculator?.category_id ?? "",
    seo_title: props.calculator?.seo_title ?? "",
    seo_description: props.calculator?.seo_description ?? "",
    seo_keywords: props.calculator?.seo_keywords ?? "",
});

const saveCalculator = () => {
    props.calculator ? form.patch(`/admin/calculators/${props.calculator.id}`) : form.post('/admin/calculators');
}

</script>

<template>
    <Head>
        <title>{{ calculator ? 'Edit' : 'Create' }} calculator</title>
    </Head>

    <form @submit.prevent="saveCalculator">

        <FSelect
            label="Category"
            :items="categories.data"
            v-model="form.category_id"
            :error-message="form.errors.category_id"
        />

        <FTextInput
            label="Name"
            v-model="form.name"
            :error-message="form.errors.name"
        />

        <FTextArea
            label="Description"
            v-model="form.description"
            :error-message="form.errors.description"
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

        <button type="submit">{{ calculator ? 'Update' : 'Create' }}</button>
    </form>

    <Link href="/admin/calculators">Return to index</Link>
</template>
