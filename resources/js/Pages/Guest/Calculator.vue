<script setup>

import {Head, useForm, usePage} from "@inertiajs/vue3";
import Category from "@/Components/Categories/CategoryComponent.vue";
import SendEmailComponent from "@/Components/Mails/SendEmailComponent.vue";
import Layout from "@/Layouts/Guest.vue";
import {computed, onMounted} from "vue";

const user = computed(() => usePage().props.auth.user);

const props = defineProps({
    calculator: Object,
    category: Object,
    metta_seo: Object
});

defineOptions({
    layout: Layout
})

const form = useForm({});

const addToFavorites = () => {
    form.post(`/favorites/${props.calculator.id}`, {
        preserveScroll: true
    });
}

const removeFromFavorites = () => {
    form.delete(`/favorites/${props.calculator.id}`, {
        preserveScroll: true
    });
}

const toggleFavorite = () => {
    props.calculator.is_favorite ? removeFromFavorites() : addToFavorites();
}

onMounted( () => {
    import(props.calculator.script).then((script) => {
        script.show(props.calculator.uuid);
    });
})

</script>

<template>
    <Head>
        <title>{{ calculator.name }}</title>

        <meta name="description" :content="metta_seo.description">
        <meta name="keywords" :content="metta_seo.keywords">
        <meta name="title" :content="metta_seo.title">
    </Head>

    <div>
        <h2>{{ calculator.slug }}</h2>

        <p v-html="calculator.description"></p>

        <hr>
            <h3>Calculator {{ calculator.uuid }}</h3>
            <div id="calculator-container"></div>
        <hr>

        <button @click.prevent="toggleFavorite" :disabled="form.processing" v-if="user">
            Favorite {{ calculator.is_favorite }}
        </button>

        <SendEmailComponent
            title="Error message"
            subject="Error message"
            :send-url="true"
        />

        <Category
            :category="category"
        />
    </div>
</template>
