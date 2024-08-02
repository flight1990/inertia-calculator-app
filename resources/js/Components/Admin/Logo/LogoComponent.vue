<script setup>
    import { Link, usePage } from "@inertiajs/vue3";
    import { computed } from "vue";

    const site_name = computed(() => usePage().props.site_settings.site_name);
</script>
<template>
    <Link href="/admin" class="flex items-center gap-2 select-none">
        <svg class="h-8 lg:h-10" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path fill="#404040" d="M12 15.75a3.75 3.75 0 1 1 0-7.5 3.75 3.75 0 0 1 0 7.5Zm0-6a2.25 2.25 0 1 0 0 4.5 2.25 2.25 0 0 0 0-4.5Z"></path>
            <path fill="#06b6d4" d="m16.99 3.137-1.634 1.885-1.053 1.216 1.287.966A5.952 5.952 0 0 1 17.997 12v.043l.002.031c.014.324.181 7.584-10.99 8.792l1.635-1.888 1.053-1.216-1.287-.966A5.952 5.952 0 0 1 6.003 12v-.043L6 11.926c-.014-.324-.18-7.57 10.988-8.79ZM18.747 1.5h-.037C3.94 2.187 4.503 12 4.503 12a7.482 7.482 0 0 0 3.007 5.996l-2.832 3.27a.754.754 0 0 0 .574 1.234h.037C20.06 21.813 19.497 12 19.497 12a7.482 7.482 0 0 0-3.007-5.996l2.832-3.27a.753.753 0 0 0-.574-1.234Z"></path>
        </svg>
        <h3 class="text-lg lg:text-2xl font-medium text-gray-700">
            {{ site_name }}
        </h3>
    </Link>
</template>
