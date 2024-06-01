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

        <button type="submit">{{ calculator ? 'Update' : 'Create' }}</button>
    </form>

    <Link href="/admin/calculators">Return to index</Link>
</template>
