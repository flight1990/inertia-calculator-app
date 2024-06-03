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
        categories: Object
    });

</script>

<template>

    <Head>
        <title>Главная</title>
        <meta name="description" content="Your page description">
    </Head>


    <HeroComponent />
    <CatalogComponent />



    <!-- <div>
        <CategoriesList :items="categories.data" />
    </div> -->
</template>