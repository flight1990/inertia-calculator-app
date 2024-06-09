<script setup>

    import { Link, usePage } from "@inertiajs/vue3";
    import { computed, onMounted, ref } from "vue";

    const menu = computed(() => usePage().props.menu.data);
    const favorites = computed(() => usePage().props.auth.favorites);

    const close = () => {
        document.getElementById('close').click();
    }

</script>
<template>

    <section>
        <button
            class="p-2 font-semibold text-sm text-gray-700 bg-white rounded-lg hover:bg-gray-100 active:bg-gray-200 flex items-center gap-x-2"
            data-hs-overlay="#hs-overlay-menu">
            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <line x1="3" x2="21" y1="6" y2="6" />
                <line x1="3" x2="21" y1="12" y2="12" />
                <line x1="3" x2="21" y1="18" y2="18" />
            </svg>
            <span class="hidden sm:block">Меню</span>
        </button>
        <div id="hs-overlay-menu"
            class="hs-overlay hs-overlay-open:translate-x-0 hs-overlay-backdrop-open:backdrop-blur-sm hidden translate-x-full fixed top-0 end-0 transition-all duration-300 transform h-full max-w-xs w-full z-[80] bg-white border-s"
            tabindex="-1">
            <div class="h-16 flex justify-between items-center px-4 border-b">
                <h2 class="text-xl font-semibold text-gray-700">
                    Меню
                </h2>
                <button id="close" type="button"
                    class="flex justify-center items-center size-9 text-sm font-semibold rounded-lg border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none"
                    data-hs-overlay="#hs-overlay-menu">
                    <span class="sr-only">Close</span>
                    <svg class="flex-shrink-0 size-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path d="M18 6 6 18"></path>
                        <path d="m6 6 12 12"></path>
                    </svg>
                </button>
            </div>
            <div
                class="p-2 h-[calc(100vh-4rem)] !overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300">
                {{ favorites }}
                <div class="hs-accordion-group space-y-1.5">
                    <div v-for="item in menu" :key="item.id" class="hs-accordion" :id="'heading-'+item.id">
                        <button :aria-controls="'collapse-'+item.id"
                            class="hs-accordion-toggle hs-accordion-active:bg-gray-100 w-full text-start flex items-center gap-x-3.5 py-2 px-2.5 font-medium text-sm text-gray-700 rounded-lg hover:bg-gray-100">
                            <div class="flex items-center gap-x-3.5">
                                <svg class="w-5 h-5 hs-accordion-active:text-primary-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round">
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
                                {{ item.name }}
                            </div>
                            <svg class="hs-accordion-active:rotate-180 ms-auto block size-4 text-gray-600 group-hover:text-gray-500 transition"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round">
                                <path d="m6 9 6 6 6-6" />
                            </svg>
                        </button>
                        <div :id="'collapse-'+item.id" :aria-labelledby="'heading-'+item.id"
                            class="hs-accordion-content w-full overflow-hidden transition-[height] duration-300 hidden">
                            <ul class="pt-2 ps-2">
                                <li v-for="child in item.children" :key="child.id">
                                    <Link @click="close"
                                        class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-700 rounded-lg hover:bg-gray-100"
                                        :href="child.url">
                                    {{ child.name }}
                                    </Link>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>
