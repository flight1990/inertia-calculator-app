<script setup>

import MenuItem from "./AdminMenuListItemComponent.vue";

defineProps({
    menu: Array
});

</script>

<template>
    <ul>
        <MenuItem
            v-for="item in menu"
            :key="item.id"
            :menu-item="item"
        />
    </ul>
</template>
