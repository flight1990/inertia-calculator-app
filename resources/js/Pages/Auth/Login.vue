<script setup>

import {Head, Link, useForm} from '@inertiajs/vue3';
import Layout from "@/Layouts/Auth/Auth.vue";
import FTextInput from "@/Components/Base/FTextInput.vue";
import FCheckBox from "@/Components/Base/FCheckBox.vue";

defineOptions({
    layout: Layout
});

const form = useForm({
    email: '',
    password: '',
    remember: false,
});

</script>

<template>
    <Head>
        <title>Авторизация</title>
    </Head>
    <div class="w-full max-w-80 mx-2 bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden">
        <div class="px-6 py-4 gap-3 border-b border-gray-200 text-center">
            <h2 class="text-xl font-semibold text-gray-800">
                Авторизация
            </h2>
        </div>
        <div class="px-6 py-4">
           <form @submit.prevent="form.post('/login')" class="flex flex-col gap-y-3.5">
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
                <FCheckBox
                    label="Запомнить меня"
                    id="remember"
                    v-model="form.remember"
                />
                <button :disabled="form.processing" type="submit" class="py-2 px-3 w-full flex items-center justify-center text-sm font-semibold rounded-lg border border-transparent bg-primary-600 text-white hover:bg-primary-700 disabled:opacity-50 disabled:pointer-events-none">
                    Войти
                </button>
            </form>
            <div class="text-center mt-2">
                <Link href="/forgot-password" class="text-sm underline hover:text-gray-500">Забыли пароль?</Link>
            </div>
        </div>
    </div>

    <!-- <Link href="/register">Register</Link> -->
</template>
