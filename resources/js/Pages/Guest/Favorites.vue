<script setup>

import Layout from "@/Layouts/Guest/Guest.vue";
import {Head} from "@inertiajs/vue3";

defineOptions({
    layout: Layout
});

defineProps({
    calculators: Object
});

</script>

<template>
    <Head>
        <title>Favorites</title>
    </Head>

    <div>
        Pages: Guest/Favorites
    </div>
</template>
