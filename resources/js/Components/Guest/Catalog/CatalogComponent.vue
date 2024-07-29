<script setup>
    import { Link, usePage } from "@inertiajs/vue3";
    import {computed, onMounted, ref} from "vue";
    import RecentUsedCalculators from "@/Components/Guest/Calculations/RecentUsedCalculatorsComponent.vue"

    const {items} = defineProps({
        items: Array
    });

    const favorites = computed(() => usePage().props.auth.favorites);
    const user = computed(() => usePage().props.auth.user);

    // const recentUsed = ref([])
    //
    // const getRecentUsed = () => {
    //     recentUsed.value = Object.keys(localStorage)
    //         .filter(key => key.startsWith("history_"))
    //         .map(key => key.substring("history_".length));
    // }
    //
    // const recentUsedCalculators = computed(() => {
    //     return items.flatMap(item =>
    //         item.calculators.filter(calc => recentUsed.value.includes(calc.uuid)).map(calc => ({
    //             id: calc.id,
    //             name: calc.name,
    //             slug: calc.slug
    //         }))
    //     );
    // });
    //
    // onMounted(() => getRecentUsed())
</script>
<template>

    <!-- <RecentUsedCalculators v-if="recentUsedCalculators.length" :items="recentUsedCalculators"/> -->



    <section id="catalog" class="py-8">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <!-- <div v-if="recentUsedCalculators.length" class="mt-16 first:mt-0">
                <div class="scroll-mt-12 text-start col-span-2 md:col-span-3 lg:col-span-4 mb-4 xl:mb-6">
                    <h3 class="text-gray-700 text-lg font-semibold flex items-center gap-3.5">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="24"
                            height="24"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            class="h-6 text-primary-500"
                        >
                            <path d="M21 7.5V6a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h3.5"/>
                            <path d="M16 2v4"/>
                            <path d="M8 2v4"/>
                            <path d="M3 10h5"/>
                            <path d="M17.5 17.5 16 16.3V14"/>
                            <circle cx="16" cy="16" r="6"/>
                        </svg>
                        Ранее используемые
                    </h3>
                </div>
                <div class="text-start grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 xl:gap-6">
                    <section v-for="calculator in recentUsedCalculators" :key="calculator.id">
                        <Link :href="`/${calculator.slug}`" class="flex items-center justify-center p-4 text-base text-gray-900 font-medium text-center relative rounded-xl shadow-sm bg-white border hover:bg-primary-600 hover:text-white transition">
                        {{ calculator.name }}
                        </Link>
                    </section>
                </div>
            </div> -->
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
            <div v-for="item in items" :key="item.id" class="mt-16 first:mt-0">
                <div class="scroll-mt-12 text-start col-span-2 md:col-span-3 lg:col-span-4 mb-4 xl:mb-6">
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
            </div>
        </div>
    </section>
</template>
