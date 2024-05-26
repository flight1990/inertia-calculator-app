<script setup>

import CategoriesListItem from "./CategoriesListItemComponent.vue";

defineProps({
    items: Array
});

</script>

<template>
    <div>
        Components: CategoriesListComponent

        <ul>
            <CategoriesListItem
                v-for="item in items"
                :key="item.id"
                :item="item"
            />
        </ul>
    </div>
</template>
