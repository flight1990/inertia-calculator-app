<script setup>

import Layout from "@/Layouts/Admin/Admin.vue";
import {Head, Link, useForm} from "@inertiajs/vue3";
import FTextInput from "@/Components/Base/FTextInput.vue";

defineOptions({
    layout: Layout
});

const props = defineProps({
    user: Object
});

const form = useForm({
    name: props.user?.name ?? "",
    email: props.user?.email ?? "",
    password: "",
    password_confirmation: ""
});

const saveUser = () => {
    props.user ? form.patch(`/admin/users/${props.user.id}`) : form.post('/admin/users');
}

</script>

<template>
    <Head>
        <title>{{ user ? 'Редактировать' : 'Создать' }} пользователя</title>
    </Head>
    
    <div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden">
        <div class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-b border-gray-200">
            <div>
                <h2 class="text-lg sm:text-xl font-semibold text-gray-800">
                    {{ user ? 'Редактировать' : 'Создать' }} пользователя {{ form.name ? '"'+form.name+'"' : '' }}
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
                    label="Email"
                    v-model="form.email"
                    :error-message="form.errors.email"
                />
                <FTextInput
                    type="password"
                    label="Пароль"
                    v-model="form.password"
                    :error-message="form.errors.password"
                />
                <FTextInput
                    type="password"
                    label="Подтверждение пароля"
                    v-model="form.password_confirmation"
                    :error-message="form.errors.password_confirmation"
                />
            </form>
        </div>
        <div class="px-6 py-4 flex items-center gap-x-2">
            <button @click.prevent="saveUser" type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-primary-600 text-white hover:bg-primary-700 disabled:opacity-50 disabled:pointer-events-none">
                Сохранить
            </button>
            <Link href="/admin/users" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none">
                Отмена
            </Link>
        </div>
    </div>

    

</template>
