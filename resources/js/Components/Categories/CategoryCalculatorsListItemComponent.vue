<script setup>

import {Link} from "@inertiajs/vue3";

defineProps({
    calculator: Object
});

</script>

<template>
    <li>
        <Link :href="`/${calculator.slug}`">{{ calculator.name }}</Link>
    </li>
</template>
