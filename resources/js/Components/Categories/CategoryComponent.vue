<script setup>

import CalculatorsList from "./CategoryCalculatorsListComponent.vue";

defineProps({
    category: Object
});

</script>

<template>
    <h3>{{ category.name }}</h3>

    <CalculatorsList
        :calculators="category.calculators"
    />
</template>

