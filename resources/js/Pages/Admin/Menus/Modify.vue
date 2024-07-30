<script setup>

import Layout from "@/Layouts/Admin/Admin.vue";
import {Head, Link, useForm} from "@inertiajs/vue3";
import FTextInput from "@/Components/Base/FTextInput.vue";

defineOptions({
    layout: Layout
});

const props = defineProps({
    item: Object
});

const form = useForm({
    title: props.item?.title ?? '',
    url: props.item?.url ?? '',
    parent_id: props.item?.parent_id ?? null
})

const saveMenu = () => {
    props.item ? form.patch(`/admin/menus/${props.item.id}`) : form.post('/admin/menus');
}

</script>

<template>
    <Head>
        <title>{{ item ? 'Редактировать' : 'Создать' }} меню</title>
    </Head>

    {{ form.errors }}

    <FTextInput
        label="Название"
        :error-message="form.errors.title"
        v-model="form.title"
    />

    <FTextInput
        label="URL"
        :error-message="form.errors.url"
        v-model="form.url"
    />

    <button @click.prevent="saveMenu">Сохранить</button>

    <Link href="/admin/menus">Отмена</Link>
</template>
