<script setup>

import { Head, useForm } from '@inertiajs/vue3';
import Layout from "@/Layouts/Auth/Auth.vue";
import FTextInput from "@/Components/Base/FTextInput.vue";

defineOptions({
    layout: Layout
});

const props = defineProps({
    email: {
        type: String,
        required: true,
    },
    token: {
        type: String,
        required: true,
    },
});

const form = useForm({
    token: props.token,
    email: props.email,
    password: '',
    password_confirmation: '',
});

</script>

<template>

    <Head>
        <title>Сброс пароля</title>
    </Head>

    <div class="w-full max-w-80 mx-2 bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden">
        <div class="px-6 py-4 gap-3 border-b border-gray-200 text-center">
            <h2 class="text-xl font-semibold text-gray-800">
                Сброс пароля
            </h2>
        </div>
        <div class="px-6 py-4">
           <form @submit.prevent="form.post('/reset-password')" class="flex flex-col gap-y-3.5">
                <FTextInput
                    label="Email"
                    type="email"
                    id="email"
                    v-model="form.email"
                    :error-message="form.errors.email"
                />
                <FTextInput
                    label="Пароль"
                    type="password"
                    id="password"
                    v-model="form.password"
                    :error-message="form.errors.password"
                />
                <FTextInput
                    label="Подтверждение пароля"
                    type="password"
                    id="password_confirmation"
                    v-model="form.password_confirmation"
                    :error-message="form.errors.password_confirmation"
                />
                <button :disabled="form.processing" type="submit" class="py-2 px-3 w-full flex items-center justify-center text-sm font-semibold rounded-lg border border-transparent bg-primary-600 text-white hover:bg-primary-700 disabled:opacity-50 disabled:pointer-events-none">
                    Сбросить пароль
                </button>
            </form>
        </div>
    </div>
</template>
