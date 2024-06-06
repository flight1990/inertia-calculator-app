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
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="w-5 h-5 text-primary-500">
                        <rect width="16" height="20" x="4" y="2" rx="2" />
                        <line x1="8" x2="16" y1="6" y2="6" />
                        <line x1="16" x2="16" y1="14" y2="18" />
                        <path d="M16 10h.01" />
                        <path d="M12 10h.01" />
                        <path d="M8 10h.01" />
                        <path d="M12 14h.01" />
                        <path d="M8 14h.01" />
                        <path d="M12 18h.01" />
                        <path d="M8 18h.01" />
                    </svg>
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