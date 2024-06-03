<script setup>

    import { Head } from "@inertiajs/vue3";
    import Layout from "@/Layouts/Guest.vue";
    import HeroComponent from "@/Components/Components/Guest/Hero/HeroComponent.vue";
    import CatalogComponent from "@/Components/Components/Guest/Catalog/CatalogComponent.vue";
    // import CategoriesList from "../../Components/Categories/CategoriesListComponent.vue";

    defineOptions({
        layout: Layout
    });

    defineProps({
        categories: Object,
        metta_seo: Object
    });

</script>

<template>

    <Head>
        <title>Главная</title>

        <meta name="description" :content="metta_seo.description">
        <meta name="keywords" :content="metta_seo.keywords">
        <meta name="title" :content="metta_seo.title">
    </Head>


    <HeroComponent />
    <CatalogComponent :items="categories.data" />



    <!-- <div>
        <CategoriesList :items="categories.data" />
    </div> -->
</template>