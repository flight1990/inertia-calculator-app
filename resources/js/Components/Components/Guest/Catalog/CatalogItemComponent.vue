<script setup>

    import {Link} from "@inertiajs/vue3";

    defineProps({
        calculators: Array
    });

</script>
<template>
    <section v-for="calculator in calculators" :key="calculator.id">
        <Link :href="`/${calculator.slug}`" class="flex items-center justify-center p-4 text-base text-gray-900 font-medium text-center relative rounded-xl shadow-sm bg-white border hover:bg-primary-600 hover:text-white transition">
            {{ calculator.name }}
        </Link>    
    </section>
</template>