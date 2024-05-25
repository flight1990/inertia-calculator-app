<script setup>

import {Head} from "@inertiajs/vue3";
import Layout from "../../Layouts/Guest.vue";

defineOptions({
   layout: Layout
});

</script>

<template>
    <Head>
        <title>Home</title>
        <meta name="description" content="Your page description">
    </Head>

    <div>
        Page: guest/index
    </div>
</template>
