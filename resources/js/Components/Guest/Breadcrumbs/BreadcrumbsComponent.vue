<script setup>
    import {Link} from "@inertiajs/vue3";

    defineProps({
        category: String,
        title: String,
    });
</script>
<template>
    <ol class="flex items-center whitespace-nowrap flex-wrap">
        <li class="inline-flex items-center">
            <Link class="flex items-center text-sm text-gray-500 hover:text-gray-900 focus:outline-none focus:text-gray-900" href="/">
                Calcutor.ru
            </Link>
            <svg class="flex-shrink-0 mx-2 overflow-visible size-4 text-gray-400" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="m9 18 6-6-6-6"></path>
            </svg>
        </li>
        <li v-if="category" class="inline-flex items-center">
            <span class="flex items-center text-sm text-gray-500">
                {{ category }}
                <svg class="flex-shrink-0 mx-2 overflow-visible size-4 text-gray-400" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="m9 18 6-6-6-6"></path>
                </svg>
            </span>
        </li>
        <li class="inline-flex items-center text-sm font-semibold text-gray-700 truncate" aria-current="page">
            {{ title }}
        </li>
    </ol>
</template>