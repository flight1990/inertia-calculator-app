<script setup>
    import { useForm } from '@inertiajs/vue3';
    import RDialog from "@/Components/Base/RDialog.vue";
    import FTextInput from "@/Components/Base/FTextInput.vue";
    import FCheckBox from "@/Components/Base/FCheckBox.vue";

    const form = useForm({
        name: '',
        email: '',
        password: '',
        password_confirmation: '',
    });
</script>
<template>
    <RDialog title="Регистрация" :width="400">
        <template v-slot:trigger>
            <button type="button"
                class="w-full flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-200">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="w-5 h-5 flex-none">
                    <path d="M2 21a8 8 0 0 1 13.292-6" />
                    <circle cx="10" cy="8" r="5" />
                    <path d="M19 16v6" />
                    <path d="M22 19h-6" />
                </svg>
                Регистрация
            </button>
        </template>
        <template v-slot:body>
            <form class="space-y-4">
                <FTextInput v-model="form.name" label="Имя" id="register-name" :error-message="form.errors.name" />
                <FTextInput v-model="form.email" label="E-mail" id="register-email" :error-message="form.errors.email" />
                <FTextInput v-model="form.password" type="password" label="Пароль" id="register-password" :error-message="form.errors.password" />
                <FTextInput v-model="form.password_confirmation" type="password" label="Подтверждение пароля" id="register-password_confirmation" :error-message="form.errors.password_confirmation" />
            </form>
        </template>
        <template v-slot:footer>
            <button @click.prevent="form.post('/register')" :disabled="form.processing" 
                class="py-2 px-3 font-semibold text-sm text-white bg-primary-500 rounded-lg hover:bg-primary-600 active:bg-primary-700 disabled:opacity-50 disabled:pointer-events-none flex items-center justify-center gap-x-2">
                Зарегистрироваться
            </button>
        </template>
    </RDialog>
</template>