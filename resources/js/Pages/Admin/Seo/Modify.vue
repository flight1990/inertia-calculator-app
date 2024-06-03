<script setup>

import Layout from "@/Layouts/Admin.vue";
import {Head, Link, useForm} from "@inertiajs/vue3";
import FTextInput from "@/Components/Base/FTextInput.vue";
import FTextArea from "@/Components/Base/FTextArea.vue";
import FCheckBox from "@/Components/Base/FCheckBox.vue";

defineOptions({
    layout: Layout
});

const props = defineProps({
    seo: Object
});

const form = useForm({
    url: props.seo?.url ?? "",
    h1: props.seo?.h1 ?? "",
    title: props.seo?.title ?? "",
    description: props.seo?.description ?? "",
    keywords: props.seo?.keywords ?? "",
    robots: props.seo?.robots ?? "",
    no_index: props.seo?.no_index ?? false,
    no_follow: props.seo?.no_follow ?? false,
});

const saveSeo = () => {

    console.log(props.seo);

    props.seo ? form.patch(`/admin/seo/${props.seo.id}`) : form.post('/admin/seo');
}

</script>

<template>
    <Head>
        <title>{{ seo ? 'Edit' : 'Create' }} seo</title>
    </Head>

    <form @submit.prevent="saveSeo">

        <FTextInput
            label="URL"
            v-model="form.url"
            :error-message="form.errors.url"
        />

        <FTextInput
            label="H1"
            v-model="form.h1"
            :error-message="form.errors.h1"
        />

        <FTextInput
            label="Title"
            v-model="form.title"
            :error-message="form.errors.title"
        />

        <FTextInput
            label="Description"
            v-model="form.description"
            :error-message="form.errors.description"
        />

        <FTextInput
            label="Keywords"
            v-model="form.keywords"
            :error-message="form.errors.keywords"
        />

        <FTextArea
            label="Robots"
            v-model="form.robots"
            :error-message="form.errors.robots"
        />

        <FCheckBox
            label="No index"
            v-model="form.no_index"
            :error-message="form.errors.no_index"
        />

        <FCheckBox
            label="No follow"
            v-model="form.no_follow"
            :error-message="form.errors.no_follow"
        />

        <button type="submit">{{ seo ? 'Update' : 'Create' }}</button>
    </form>

    <Link href="/admin/seo">Return to index</Link>
</template>
