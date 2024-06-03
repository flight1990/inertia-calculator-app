<script setup>

import FaqListItemComponent from "@/Components/Faq/FaqListItemComponent.vue";

defineProps({
    items: Array
});

</script>

<template>
    <div>
        <FaqListItemComponent
            v-for="item in items"
            :key="item.id"
            :item="item"
        />
    </div>
</template>
