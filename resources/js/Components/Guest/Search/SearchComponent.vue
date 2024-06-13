<script setup>
import { ref, watch, onMounted } from 'vue';
import { debounce } from 'lodash';
import { Link } from '@inertiajs/vue3';
import RDialog from '@/Components/Base/RDialog.vue';
import { DialogClose } from 'radix-vue';
import axios from 'axios';

const search = ref('');
const loading = ref(false);
const calculators = ref([]);
const status = ref('Начните поиск');
const inputRef = ref(null);

const setFocus = debounce(() => {
    if (inputRef.value) {
        inputRef.value.focus();
    }
}, 5);

const searchHandler = async () => {
    if (!search.value) {
        calculators.value = [];
        status.value = 'Начните поиск';
    } else {
        loading.value = true;
        try {
            const { data } = await axios.get('/api/search', {
                params: { search: search.value },
            });
            calculators.value = data;
            status.value = data.length ? '' : 'Ничего не найдено';
        } catch (e) {
            console.error(e);
        } finally {
            loading.value = false;
        }
    }
};

watch(
    () => search.value,
    debounce(() => searchHandler(), 350)
);

onMounted(() => {
    setFocus();
});
</script>

<template>
    <RDialog title="Поиск" @update:open="setFocus">
        <template v-slot:trigger>
            <button
                type="button"
                class="p-2 font-semibold text-gray-700 bg-white rounded-lg hover:bg-gray-100 active:bg-gray-200 flex items-center gap-x-2"
            >
                <svg
                    class="w-5 h-5"
                    xmlns="http://www.w3.org/2000/svg"
                    width="24"
                    height="24"
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                >
                    <circle cx="11" cy="11" r="8" />
                    <path d="m21 21-4.3-4.3" />
                </svg>
            </button>
        </template>

        <template v-slot:body>
            <input
                ref="inputRef"
                id="search"
                type="search"
                v-model="search"
                placeholder="Найти калькулятор"
                class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-primary-500 focus:ring-primary-500 disabled:opacity-50 disabled:pointer-events-none"
            />

            <div v-if="!calculators.length" class="py-10 text-sm text-gray-500 flex items-center justify-center">
                <div
                    v-if="loading"
                    class="animate-spin inline-block size-6 border-[3px] border-current border-t-transparent text-primary-600 rounded-full"
                    role="status"
                    aria-label="loading"
                >
                    <span class="sr-only">Loading...</span>
                </div>

                <div v-else>
                    {{ status }}
                </div>
            </div>

            <div v-else class="mt-6">
                <ul class="space-y-1.5">
                    <li v-for="calculator in calculators" :key="calculator.id">
                        <DialogClose as-child>
                            <Link
                                @click="search = null"
                                class="py-3 px-5 rounded-lg text-sm text-gray-700 bg-gray-50 hover:text-white hover:bg-primary-600 transition flex items-center justify-between gap-4"
                                :href="`/${calculator.slug}`"
                            >
                                <span>{{ calculator.name }}</span>
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
                                    class="flex-none size-4"
                                >
                                    <path d="m9 18 6-6-6-6" />
                                </svg>
                            </Link>
                        </DialogClose>
                    </li>
                </ul>
            </div>
        </template>
    </RDialog>
</template>
