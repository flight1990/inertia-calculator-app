<script setup>
    import {Link} from "@inertiajs/vue3";

    defineProps({
        items: Array
    });
</script>
<template>
    <section id="catalog" class="py-8">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div v-for="item in items" :key="item.id" class="mt-16 first:mt-0">
                <div class="scroll-mt-12 text-start col-span-2 md:col-span-3 lg:col-span-4 mb-4 xl:mb-6">
                    <h3 class="text-gray-700 text-lg font-semibold flex items-center gap-3.5">
                        <div class="h-6 text-primary-500">
                            {{ item.icon }}
                            <svg class="h-6 text-primary-500" fill="none" stroke="currentColor" stroke-linecap="round" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M3.95 2.5c1.419 1.51 2.128 3.47 2.128 5.882C6.078 12 3 14.77 2.484 16.75 2.142 18.07 1.98 19.654 2 21.5"></path>
                                <path d="M19.628 2.5C18.209 4.01 17.5 5.97 17.5 8.382c0 3.618 3.078 6.387 3.593 8.368.344 1.32.505 2.904.485 4.75"></path>
                                <path d="M3.122 15.418c3.263 2.065 6.225 3.097 8.889 3.097 2.663 0 5.479-1.032 8.449-3.097"></path>
                                <path fill="currentColor" stroke="none" d="M12 15.5a1.25 1.25 0 1 0 0-2.5 1.25 1.25 0 0 0 0 2.5Z"></path>
                            </svg>
                        </div>
                        {{ item.name }}
                    </h3>
                </div>
                <div class="text-start grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 xl:gap-6">
                    <section v-for="calculator in item.calculators" :key="calculator.id">
                        <Link :href="`/${calculator.slug}`" class="flex items-center justify-center p-4 text-base text-gray-900 font-medium text-center relative rounded-xl shadow-sm bg-white border hover:bg-primary-600 hover:text-white transition">
                            {{ calculator.name }}
                        </Link>
                    </section>
                </div>
            </div>
        </div>
    </section>
</template>
