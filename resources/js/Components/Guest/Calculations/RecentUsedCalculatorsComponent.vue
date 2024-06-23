<script setup>

import {Link} from "@inertiajs/vue3";

const {items} = defineProps({
    items: Array
})

</script>

<template>
    <div>
        <h3>Недавно используемые</h3>
        <ul>
            <li v-for="item in items">
                <Link :href="`/${item.slug}`">{{ item.name }}</Link>
            </li>
        </ul>
    </div>
</template>

