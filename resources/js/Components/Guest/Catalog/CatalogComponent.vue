<script setup>
    import { Link, usePage } from "@inertiajs/vue3";
    import {computed, onMounted, ref} from "vue";
    import RecentUsedCalculators from "@/Components/Guest/Calculations/RecentUsedCalculatorsComponent.vue"
    import RDialog from "@/Components/Base/RDialog.vue";

    const {items} = defineProps({
        items: Array
    });

    const favorites = computed(() => usePage().props.auth.favorites);
    const user = computed(() => usePage().props.auth.user);
    const menu = computed(() => usePage().props.menu.data);
</script>
<template>
    <section id="catalog" class="py-8">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div v-if="user && favorites.length" class="mt-16 first:mt-0">
                <div class="scroll-mt-12 text-start col-span-2 md:col-span-3 lg:col-span-4 mb-4 xl:mb-6">
                    <h3 class="text-gray-700 text-lg font-semibold flex items-center gap-3.5">
                        <svg class="h-6 text-primary-500" fill="currentColor" stroke="currentColor" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="m12.412 17.876 4.725 3c.61.385 1.36-.187 1.181-.89l-1.368-5.382a.815.815 0 0 1 .272-.825l4.237-3.534c.553-.46.272-1.388-.45-1.434l-5.531-.357a.779.779 0 0 1-.684-.506L12.73 2.754a.778.778 0 0 0-1.463 0l-2.06 5.194a.778.778 0 0 1-.684.506l-5.532.357c-.722.046-1.003.975-.45 1.434l4.238 3.534a.816.816 0 0 1 .272.825l-1.266 4.988c-.215.844.684 1.528 1.406 1.069l4.397-2.785a.768.768 0 0 1 .825 0v0Z">
                            </path>
                        </svg>
                        Избранные калькуляторы
                    </h3>
                </div>
                <div class="text-start grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 xl:gap-6">
                    <section v-for="calculator in favorites" :key="calculator.id">
                        <Link :href="`/${calculator.slug}`" class="flex items-center justify-center p-4 text-base text-gray-900 font-medium text-center relative rounded-xl shadow-sm bg-white border hover:bg-primary-600 hover:text-white transition">
                            {{ calculator.name }}
                        </Link>
                    </section>
                </div>
            </div>

                <pre>
                    {{menu}}
                </pre>

            <div v-for="item in menu" :key="item.id" class="mt-10 first:mt-0">
                <div v-if="item.children.length">
                    <div class="text-start col-span-2 md:col-span-3 lg:col-span-4 mb-4 xl:mb-6">
                        <h3 class="text-gray-700 text-lg font-semibold flex items-center gap-3.5">
                            <span v-html="item.icon" class="text-2xl text-primary-500"></span>
                            {{ item.name }}
                        </h3>
                    </div>
                    <div class="text-start grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 xl:gap-6">
                        <template v-for="calculator in item.children" :key="calculator.id">
                            <RDialog v-if="calculator.children.length" :title="calculator.name" :width="420">
                                <template v-slot:trigger>
                                    <button type="button" class="w-full flex items-center justify-center p-4 text-base text-gray-900 font-medium text-center relative rounded-xl shadow-sm bg-white border hover:bg-primary-600 hover:text-white transition">
                                        {{ calculator.name }}
                                    </button>
                                </template>
                                <template v-slot:body>
                                    <ul class="">
                                        <template v-for="child in calculator.children">
                                            <li v-if="child.url">
                                                <Link :href="child.url" class="flex flex-col py-2 px-2.5 text-sm text-gray-700 rounded-lg hover:bg-gray-100">
                                                    <div> {{ child.name }}</div>
                                                </Link>
                                            </li>
                                        </template>
                                    </ul>
                                </template>
                            </RDialog>
                            <Link v-else-if="calculator.url" :href="calculator.url" class="flex items-center justify-center p-4 text-base text-gray-900 font-medium text-center relative rounded-xl shadow-sm bg-white border hover:bg-primary-600 hover:text-white transition">
                                {{ calculator.name }}
                            </Link>
                        </template>
                    </div>
                </div>
            </div>


            <!-- <div v-for="item in items" :key="item.id" class="mt-16 first:mt-0">
                <div class="text-start col-span-2 md:col-span-3 lg:col-span-4 mb-4 xl:mb-6">
                    <h3 class="text-gray-700 text-lg font-semibold flex items-center gap-3.5">
                        <div v-html="item.icon" class="text-2xl text-primary-500"></div>
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
            </div> -->
        </div>
    </section>
</template>
