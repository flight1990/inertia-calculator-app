<script setup>

import {Link, useForm} from "@inertiajs/vue3";
import {computed} from "vue";

const {name, slug, items} = defineProps({
    name: String,
    slug: String,
    items: Array
})


const form = useForm({});

const onDelete = (id) => {


    console.log(id);


    form.delete(`/calculators/${id}`, {
        preserveState: true,
        preserveScroll: true
    })
}


</script>

<template>
        <div class="rounded-lg border bg-white shadow-sm">
            <div class="border-b px-4 py-2">
                <h4 class="font-semibold text-gray-700 flex items-center gap-3.5">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                         fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                         stroke-linejoin="round" class="w-5 h-5 flex-none text-primary-500">
                        <path d="M15.2 3a2 2 0 0 1 1.4.6l3.8 3.8a2 2 0 0 1 .6 1.4V19a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2z" />
                        <path d="M17 21v-7a1 1 0 0 0-1-1H8a1 1 0 0 0-1 1v7" />
                        <path d="M7 3v4a1 1 0 0 0 1 1h7" />
                    </svg>
                    Сохраненные расчеты
                </h4>
            </div>
            <div class="p-4">
                <ul v-if="items.length" class="space-y-1.5">
                    <li v-for="item in items" :key="item.name" class="flex items-center gap-x-2">
<!--                        <div v-if="slug === currentSlug" class="flex py-2 px-2.5 text-sm text-gray-700 rounded-lg bg-gray-100 focus:none select-none">-->
<!--                            {{ item.name }}-->
<!--                        </div>-->


                        <Link class="flex-1 flex py-2 px-2.5 text-sm text-gray-700 rounded-lg hover:bg-gray-100 focus:bg-gray-200"
                              :href="`/${slug}?input=${item.input}`">
                            {{ item.name }}
                        </Link>
                        <div @click="onDelete(item.id)" class="flex-none py-2 px-2 text-gray-700 rounded-lg hover:bg-gray-100 focus:bg-gray-200">
                            <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 6h18"/><path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"/><path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"/><line x1="10" x2="10" y1="11" y2="17"/><line x1="14" x2="14" y1="11" y2="17"/></svg>
                        </div>
                    </li>
                </ul>
                <p v-else class="text-sm text-gray-500">
                    Вы можете сохранять ваши расчеты и они будут отображаться здесь.
                </p>
            </div>
        </div>
</template>
