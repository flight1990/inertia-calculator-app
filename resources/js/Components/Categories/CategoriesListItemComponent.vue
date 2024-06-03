<script setup>

import CalculatorsList from "../Calculators/CalculatorsListComponent.vue";

defineProps({
    item: Object
});

</script>

<template>
    <li>
        <b>{{ item.name }}</b>

        <CalculatorsList
            :calculators="item.calculators"
        />
    </li>
</template>
