<script setup>

import CalculatorsListItem from "./CalculatorsListItemComponent.vue";

defineProps({
    calculators: Array
});

</script>

<template>
    <ul>
        <CalculatorsListItem
            v-for="calculator in calculators"
            :key="calculator.id"
            :calculator="calculator"
        />
    </ul>
</template>
