<script setup>
    import { onMounted, ref, watch } from "vue";
    import { debounce } from "lodash";
    import { Link } from "@inertiajs/vue3";

    const search = ref("");
    const loading = ref(false);
    const calculators = ref([]);

    const searchHandler = debounce(async () => {
        try {
            loading.value = true;
            const { data } = await axios.get('/api/search', {
                params: {
                    search: search.value
                }
            });
            calculators.value = data;
        } catch (e) {
            console.log(e);
        } finally {
            loading.value = false;
        }
    }, 400);

    const closeSearchModal = () => {
        document.getElementById('close-search-modal').click();
    }

    watch(() => search.value, () => searchHandler());
</script>
<template>
    <section>
        <button
            class="p-2 font-semibold text-gray-700 bg-white rounded-lg hover:bg-gray-100 active:bg-gray-200 flex items-center gap-x-2"
            data-hs-overlay="#hs-search-modal">
            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="11" cy="11" r="8" />
                <path d="m21 21-4.3-4.3" />
            </svg>
        </button>

        <div id="hs-search-modal"
            class="hs-overlay-backdrop-open:backdrop-blur-sm hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto pointer-events-none">
            <div
                class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto h-[calc(100%-3.5rem)] min-h-[calc(100%-3.5rem)] flex items-center">
                <div
                    class="w-full max-h-full overflow-hidden flex flex-col bg-white border shadow-sm rounded-xl pointer-events-auto">
                    <div class="flex justify-between items-center py-3 px-4 border-b">
                        <h2 class="text-xl font-semibold text-gray-700">
                            Поиск
                        </h2>
                        <button type="button" id="close-search-modal"
                            class="flex justify-center items-center size-9 text-sm font-semibold rounded-lg border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none"
                            data-hs-overlay="#hs-search-modal">
                            <span class="sr-only">Close</span>
                            <svg class="flex-shrink-0 size-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path d="M18 6 6 18"></path>
                                <path d="m6 6 12 12"></path>
                            </svg>
                        </button>
                    </div>
                    <div
                        class="p-4 overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300">
                        <input id="search" type="search" v-model="search" autofocus placeholder="Найти калькулятор"
                            class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-primary-500 focus:ring-primary-500 disabled:opacity-50 disabled:pointer-events-none">
                        <div v-if="calculators.length" class="mt-6">
                            <ul class="space-y-1.5">
                                <li v-for="calculator in calculators" :key="calculator.id">
                                    <Link @click="closeSearchModal"
                                        class="py-3 px-5 rounded-lg text-sm text-gray-700 bg-gray-50 hover:text-white hover:bg-primary-600 transition flex items-center justify-between gap-4"
                                        :href="`/${calculator.slug}`">
                                    <span>
                                        {{ calculator.name }}
                                    </span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="flex-none size-4">
                                        <path d="m9 18 6-6-6-6" />
                                    </svg>
                                    </Link>
                                </li>
                            </ul>
                        </div>
                        <div v-else class="py-10 text-sm text-gray-500 flex items-center justify-center">
                            <p v-if="!search">
                                Начните вводить для поиска
                            </p>
                            <div v-if="loading"
                                class="animate-spin inline-block size-6 border-[3px] border-current border-t-transparent text-primary-600 rounded-full"
                                role="status" aria-label="loading">
                                <span class="sr-only">Loading...</span>
                            </div>
                            <p v-if="search && !loading">
                                Ничего не найдено
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>