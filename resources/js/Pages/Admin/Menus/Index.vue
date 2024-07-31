<script setup>

import Layout from "@/Layouts/Admin/Admin.vue";
import {Head, Link, router} from "@inertiajs/vue3";

import Nested from "@/Pages/Admin/Menus/infra/Nested.vue";

defineOptions({
    layout: Layout
})

const props = defineProps({
    items: Object
})

</script>

<template>
    <Head>
        <title>Меню</title>
    </Head>

    <div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden">
        <div class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-b border-gray-200">
            <div>
                <h2 class="text-xl font-semibold text-gray-800">
                    Меню
                </h2>
            </div>
            <div>
                <div class="inline-flex gap-x-2">
                    <Link href="/admin/menus/create"
                          class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-primary-600 text-white hover:bg-primary-700 disabled:opacity-50 disabled:pointer-events-none">
                        <svg
                            class="flex-shrink-0 size-4"
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
                            <path d="M5 12h14"/>
                            <path d="M12 5v14"/>
                        </svg>
                        Добавить
                    </Link>
                </div>
            </div>
        </div>
        <div class="px-6 py-4">
            <div class="text-slate-700 mb-4 text-sm">
                {{ items.data.length ? 'Потяните пункт меню для сортировки' : 'Нет данных...' }}
            </div>

            <Nested :tasks="items.data" />
            <pre>
                {{ items.data }}
            </pre>
            <!-- <ul>
                <li v-for="item in items.data">
                    <div>
                        {{ item }}
                    </div>

                    <div>
                        <Link :href="`/admin/menus/${item.id}/edit`">Редактировать</Link>

                        <Link method="DELETE" as="button" :href="`/admin/menus/${item.id}`">Удалить</Link>
                    </div>
                </li>
            </ul> -->

        </div>
    </div>
</template>
