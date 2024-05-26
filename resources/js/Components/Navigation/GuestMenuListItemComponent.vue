<script setup>

import {Link} from "@inertiajs/vue3";
import MenuList from "./GuestMenuListComponent.vue";

defineProps({
    menuItem: Object
});

</script>

<template>
    <li>
        <Link :href="menuItem.url">{{ menuItem.name }}</Link>

        <MenuList
            v-if="menuItem.children.length"
            :menu="menuItem.children"
        />
    </li>
</template>
