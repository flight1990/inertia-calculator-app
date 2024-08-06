<script setup>
import {Head} from "@inertiajs/vue3";
import Layout from "@/Layouts/Guest/Guest.vue";
import HeroComponent from "@/Components/Guest/Hero/HeroComponent.vue";
import CatalogComponent from "@/Components/Guest/Catalog/CatalogComponent.vue";

defineOptions({
    layout: Layout
});

defineProps({
    categories: Object,
    metta_seo: Object,
    site_settings: Object
});

</script>

<template>

    <Head>
        <title>Главная</title>

        <meta name="title" :content="metta_seo.title">
        <meta name="description" :content="metta_seo.description">
        <meta name="keywords" :content="metta_seo.keywords">
        <meta name="robots"
              :content="(metta_seo.index ? 'index' : 'noindex')+','+ (metta_seo.follow ? 'follow' : 'nofollow')">
    </Head>

    <HeroComponent
        :site_settings="site_settings"
    />
    <CatalogComponent :items="categories.data"/>
</template>
