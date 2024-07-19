<script setup>

    import Layout from "@/Layouts/Admin/Admin.vue";
    import {Head, Link, useForm} from "@inertiajs/vue3";
    import FTextInput from "@/Components/Base/FTextInput.vue";

    defineOptions({
        layout: Layout
    });

    const props = defineProps({
        category: Object
    });

    const form = useForm({
        name: props.category?.name ?? "",
        icon: props.category?.icon ?? "",
    });

    const saveCategory = () => {
        props.category ? form.patch(`/admin/categories/${props.category.id}`) : form.post('/admin/categories');
    }

</script>

<template>
    <Head>
        <title>{{ category ? 'Редактировать' : 'Создать' }} категорию</title>
    </Head>

    <div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden">
        <div class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-b border-gray-200">
            <div>
                <h2 class="text-lg sm:text-xl font-semibold text-gray-800">
                    {{ category ? 'Редактировать' : 'Создать' }} категорию {{ form.name ? '"'+form.name+'"' : '' }}
                </h2>
            </div>
        </div>
        <div class="px-6 py-4 border-b border-gray-200">
            <form class="flex flex-col gap-y-3.5">
                <FTextInput
                    label="Имя"
                    v-model="form.name"
                    :error-message="form.errors.name"
                />
                <FTextInput
                    label="Иконка"
                    v-model="form.icon"
                    :error-message="form.errors.icon"
                />
                <div class="text-sm">
                    Иконки копируются из
                    <a class="underline hover:text-gray-500" href="https://icons.getbootstrap.com/#icons" target="_blank">icons.getbootstrap.com</a>
                    как
                    <strong>Icon font </strong>
                    (Например: "&lt;i class="bi bi-calculator"&gt;&lt;/i&gt;")
                </div>
            </form>
        </div>
        <div class="px-6 py-4 flex items-center gap-x-2">
            <button @click.prevent="saveCategory" type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-primary-600 text-white hover:bg-primary-700 disabled:opacity-50 disabled:pointer-events-none">
                Сохранить
            </button>
            <Link href="/admin/categories" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none">
                Отмена
            </Link>
        </div>
    </div>
</template>
