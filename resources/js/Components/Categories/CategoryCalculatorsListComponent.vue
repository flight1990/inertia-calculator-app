<script setup>

import CalculatorsListItem from "./CategoryCalculatorsListItemComponent.vue";

defineProps({
    calculators: Array
});

</script>

<template>
    <div>
        Components: CategoryCalculatorsListComponent

        <ul>
            <CalculatorsListItem
                v-for="calculator in calculators"
                :key="calculator.id"
                :calculator="calculator"
            />
        </ul>
    </div>
</template>
