<script setup>

import CalculatorsList from "../Calculators/CalculatorsListComponent.vue";

defineProps({
    item: Object
});

</script>

<template>
    <li>
        {{ item.name }}

        <CalculatorsList
            :calculators="item.calculators"
        />
    </li>
</template>
