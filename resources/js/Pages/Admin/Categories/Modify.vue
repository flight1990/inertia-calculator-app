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
    icon: props.category?.icon ?? "",
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
            label="Icon"
            v-model="form.icon"
            :error-message="form.errors.icon"
        />

        <button type="submit">{{ category ? 'Update' : 'Create' }}</button>
    </form>

    <Link href="/admin/categories">Return to index</Link>
</template>
