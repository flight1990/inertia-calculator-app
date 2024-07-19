<script setup>
    import {Link} from "@inertiajs/vue3";

    import {usePage} from "@inertiajs/vue3";
    import {computed} from "vue";

    const page = usePage();
    const menu = computed(() => page.props.menu);

</script>

<template>
    <ul class="space-y-1.5">
        <li v-for="item in menu.data" :key="item.id">
            <Link :href="item.url" class="w-full flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-neutral-700 rounded-lg hover:bg-gray-100"
                :class="{'bg-gray-100' : item.isActive}">
                {{ item.name }}
            </Link>
        </li>
    </ul>
</template>
