<script setup>

import Layout from "@/Layouts/Admin.vue";
import {Head, Link, useForm} from "@inertiajs/vue3";
import FTextInput from "@/Components/Base/FTextInput.vue";
import FSelect from "@/Components/Base/FSelect.vue";
import FTextArea from "@/Components/Base/FTextArea.vue";
import FFileInput from "@/Components/Base/FFileInput.vue"

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
    frontend: null,
    backend: null,
    _method: props.calculator ? 'PATCH' : 'POST'
});

const saveCalculator = () => {
    props.calculator
        ? form.post(`/admin/calculators/${props.calculator.id}`, {
            forceFormData: true
        })
        : form.post('/admin/calculators', {
            forceFormData: true
        });
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

        <FFileInput
            label="PHP"
            v-model="form.backend"
            :multiple="false"
            :error-message="form.errors.backend"
        />

        <FFileInput
            label="JS"
            v-model="form.frontend"
            :multiple="false"
            :error-message="form.errors.frontend"
        />

        <button type="submit">{{ calculator ? 'Update' : 'Create' }}</button>
    </form>

    <Link href="/admin/calculators">Return to index</Link>
</template>
