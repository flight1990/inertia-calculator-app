<script setup>

import Layout from "@/Layouts/Guest.vue";
import {Head} from "@inertiajs/vue3";
import FaqListComponent from "@/Components/Faq/FaqListComponent.vue";

defineOptions({
    layout: Layout
});

const props = defineProps({
    faqs: Object,
    metta_seo: Object
});

</script>

<template>
    <Head>
        <title>FAQ</title>

        <meta name="description" :content="metta_seo.description">
        <meta name="keywords" :content="metta_seo.keywords">
        <meta name="title" :content="metta_seo.title">
    </Head>
    <div>
        <FaqListComponent
            :items="faqs.data"
        />
    </div>
</template>

