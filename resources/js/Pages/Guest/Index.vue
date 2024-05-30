<script setup>

import {Head} from "@inertiajs/vue3";
import Layout from "@/Layouts/Guest.vue";
import CategoriesList from "../../Components/Categories/CategoriesListComponent.vue";

defineOptions({
    layout: Layout
});

defineProps({
    categories: Object
});

</script>

<template>
    <Head>
        <title>Home</title>
        <meta name="description" content="Your page description">
    </Head>

    <div>
        <CategoriesList
            :items="categories.data"
        />
    </div>
</template>
