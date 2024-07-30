<script setup>

import Layout from "@/Layouts/Admin/Admin.vue";
import {Head, Link, router} from "@inertiajs/vue3";

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


    <Link href="/admin/menus/create">Создать</Link>

    <ul>
        <li v-for="item in items.data">
            <div>
                {{ item }}
            </div>

            <div>
                <Link :href="`/admin/menus/${item.id}/edit`">Редактировать</Link>

                <Link method="DELETE" as="button" :href="`/admin/menus/${item.id}`">Удалить</Link>
            </div>
        </li>
    </ul>
</template>
