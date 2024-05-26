<script setup>

import Layout from "../../Layouts/Guest.vue";
import {Head} from "@inertiajs/vue3";
import CalculatorsList from "../../Components/Calculators/CalculatorsListComponent.vue";

defineOptions({
    layout: Layout
});

defineProps({
    calculators: Object
});

</script>

<template>
    <Head>
        <title>Favorites</title>
    </Head>

    <div>
        Pages: Guest/Favorites

        <CalculatorsList
            :calculators="calculators.data"
        />
    </div>
</template>
