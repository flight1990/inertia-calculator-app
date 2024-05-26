<script setup>

import CategoriesListItem from "./CategoriesListItemComponent.vue";

defineProps({
    items: Array
});

</script>

<template>
    <ul>
        <CategoriesListItem
            v-for="item in items"
            :key="item.id"
            :item="item"
        />
    </ul>
</template>
