<script setup>

import Layout from "@/Layouts/Admin/Admin.vue";
import {Head, Link, useForm} from "@inertiajs/vue3";
import FTextInput from "@/Components/Base/FTextInput.vue";
import FSelect from "@/Components/Base/FSelect.vue";

defineOptions({
    layout: Layout
});

const props = defineProps({
    item: Object,
    parents: Array
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

    <div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden">
        <div class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-b border-gray-200">
            <div>
                <h2 class="text-lg sm:text-xl font-semibold text-gray-800">
                    {{ item ? 'Редактировать' : 'Создать' }} пункт меню {{ form.title ? '"'+form.title+'"' : '' }}
                </h2>
            </div>
        </div>
        <div class="px-6 py-4 border-b border-gray-200">
            <form class="flex flex-col gap-y-3.5">
                <FSelect
                    label="Родитель"
                    :items="parents"
                    item-name="title"
                    item-value="id"
                    v-model="form.parent_id"
                    :error-message="form.errors.parent_id"
                />

                <FTextInput
                    label="Название"
                    v-model="form.title"
                    :error-message="form.errors.title"
                />
                <FTextInput
                    label="URL"
                    v-model="form.url"
                    :error-message="form.errors.url"
                />
            </form>
        </div>
        <div class="px-6 py-4 flex items-center gap-x-2">
            <button @click.prevent="saveMenu" type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-primary-600 text-white hover:bg-primary-700 disabled:opacity-50 disabled:pointer-events-none">
                Сохранить
            </button>
            <Link href="/admin/menus" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none">
                Отмена
            </Link>
        </div>
    </div>



    <!-- <FTextInput
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

    <Link href="/admin/menus">Отмена</Link> -->
</template>
