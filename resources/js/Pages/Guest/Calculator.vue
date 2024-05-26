<script setup>

import {Head, useForm} from "@inertiajs/vue3";
import Category from "../../Components/Categories/CategoryComponent.vue";
import Layout from "../../Layouts/Guest.vue";

const props = defineProps({
    calculator: Object,
    category: Object
});

defineOptions({
    layout: Layout
})

const form = useForm({});

const addToFavorites = () => {
    form.post(`/favorites/${props.calculator.id}`);
}

const removeFromFavorites = () => {
    form.delete(`/favorites/${props.calculator.id}`);
}

const toggleFavorite = () => {
    props.calculator.is_favorite ? removeFromFavorites() : addToFavorites();
}

</script>

<template>
    <Head>
        <title>{{ calculator.seo_title }}</title>
        <meta name="description" :content="calculator.seo_description">
        <meta name="keywords" :content="calculator.seo_keywords">
    </Head>

    <div>
        <h2>{{ calculator.slug }}</h2>

        <p v-html="calculator.description"></p>

        <button @click.prevent="toggleFavorite" :disabled="form.processing">Favorite {{ calculator.is_favorite }}</button>

        <Category
            :category="category"
        />
    </div>
</template>
