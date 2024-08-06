<script setup>
import {Link, usePage} from "@inertiajs/vue3";
import {computed} from "vue";

const page = usePage();
const activeItems = computed(() => filterActiveElements(page.props.menu.data));

const filterActiveElements = (data) => {
    return data.reduce((acc, item) => {
        if (item.isActive) {
            const newItem = {...item};
            if (newItem.children && newItem.children.length > 0) {
                newItem.children = filterActiveElements(newItem.children);
            }
            acc.push(newItem);
        }
        return acc;
    }, []);
};

const flattenMenu = (menu) => {
    let result = [];

    menu.forEach(item => {
        result.push({ name: item.name, url: item.url });
        if (item.children && item.children.length > 0) {
            result = result.concat(flattenMenu(item.children));
        }
    });

    return result;
};

</script>
<template>
    <ol class="flex items-center whitespace-nowrap flex-wrap">
        <li class="inline-flex items-center">
            <Link
                class="flex items-center text-sm text-gray-500 hover:text-gray-900 focus:outline-none focus:text-gray-900"
                href="/">
                {{ page.props.site_settings.site_name }}
            </Link>
            <svg class="flex-shrink-0 mx-2 overflow-visible size-4 text-gray-400" xmlns="http://www.w3.org/2000/svg"
                 width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                 stroke-linecap="round" stroke-linejoin="round">
                <path d="m9 18 6-6-6-6"></path>
            </svg>
        </li>
        <li class="inline-flex items-center" v-for="(item, index) in flattenMenu(activeItems)">
            <Link v-if="item.url && index + 1 < flattenMenu(activeItems).length"
                class="flex items-center text-sm text-gray-500 hover:text-gray-900 focus:outline-none focus:text-gray-900"
                :href="item.url">
                {{ item.name }}
            </Link>

            <span v-else class="flex items-center text-sm text-gray-500" :class="index + 1 === flattenMenu(activeItems).length ? 'font-bold' : ''">
                {{ item.name }}
            </span>

            <svg v-if="index + 1 < flattenMenu(activeItems).length" class="flex-shrink-0 mx-2 overflow-visible size-4 text-gray-400" xmlns="http://www.w3.org/2000/svg"
                 width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                 stroke-linecap="round" stroke-linejoin="round">
                <path d="m9 18 6-6-6-6"></path>
            </svg>
        </li>
    </ol>
</template>
