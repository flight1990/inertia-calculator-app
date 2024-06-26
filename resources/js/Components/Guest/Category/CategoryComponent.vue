<script setup>
    import {Link} from "@inertiajs/vue3";

    defineProps({
        category: Object,
        calculatorId: Number
    });
</script>

<template>
    <section>
        <div class="rounded-lg border bg-white shadow-sm">
            <div class="border-b px-4 py-2">
                <h4 class="font-semibold text-gray-700 flex items-center gap-3.5">
                    <div v-html="category.icon" class="text-xl text-primary-500"></div>
                    {{ category.name }}
                </h4>
            </div>
            <div class="p-4">
                <ul class="space-y-1.5">
                    <li v-for="calculator in category.calculators" :key="calculator.id">
                        <span v-if="calculatorId == calculator.id" class="flex py-2 px-2.5 text-sm font-medium text-gray-700 rounded-lg bg-gray-100 cursor-default select-none">
                            {{ calculator.name }}
                        </span>
                        <Link v-else class="flex py-2 px-2.5 text-sm text-gray-700 rounded-lg hover:bg-gray-100 focus:bg-gray-200"
                            :href="`/${calculator.slug}`">
                            {{ calculator.name }}
                        </Link>
                    </li>
                </ul>
            </div>
        </div>
    </section>
</template>