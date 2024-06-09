<script setup>
    import { ref, watch } from "vue";
    import { debounce } from "lodash";
    import { Link } from "@inertiajs/vue3";
    import FDialog from "@/Components/Base/FDialog.vue";

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

    watch(() => search.value, () => searchHandler());
</script>
<template>
    <FDialog
        @dialog:closed="search = null"
        title="Поиск"
    >
        <template v-slot:button="{openDialog}">
            <button @click="openDialog">Search</button>
        </template>
        <template v-slot:actions="{closeDialog}">
            <button @click="closeDialog">Save</button>
        </template>

        <template v-slot:default="{closeDialog}">
            <div
                class="overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300">
                <input id="search" type="search" v-model="search" autofocus placeholder="Найти калькулятор"
                       class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-primary-500 focus:ring-primary-500 disabled:opacity-50 disabled:pointer-events-none">
                <div v-if="calculators.length" class="mt-6">
                    <ul class="space-y-1.5">
                        <li v-for="calculator in calculators" :key="calculator.id">
                            <Link @click="closeDialog"
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
        </template>
    </FDialog>
</template>
