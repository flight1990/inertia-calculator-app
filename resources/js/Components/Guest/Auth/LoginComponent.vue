<script setup>
    import { useForm } from '@inertiajs/vue3';
    import FTextInput from "@/Components/Base/FTextInput.vue";
    import FCheckBox from "@/Components/Base/FCheckBox.vue";
    import RDialog from "@/Components/Base/RDialog.vue";

    const form = useForm({
        email: '',
        password: '',
        remember: false,
    });
</script>
<template>
    <RDialog title="Авторизация" :width="360">
        <template v-slot:trigger>
            <button type="button"
                class="w-full flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-200">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="w-5 h-5 flex-none">
                    <path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4" />
                    <polyline points="10 17 15 12 10 7" />
                    <line x1="15" x2="3" y1="12" y2="12" />
                </svg>
                Войти
            </button>
        </template>
        <template v-slot:body>
            <form class="space-y-4">
                <FTextInput v-model="form.email" label="Ваш E-mail" id="login-email" :error-message="form.errors.email" />
                <FTextInput v-model="form.password" type="password" label="Пароль" id="login-password" :error-message="form.errors.password" />
                <FCheckBox v-model="form.remember" label="Запомнить меня" id="login-remember" />
            </form>
        </template>
        <template v-slot:footer>
            <button @click.prevent="form.post('/login')" :disabled="form.processing" 
                class="py-2 px-3 font-semibold text-sm text-white bg-primary-500 rounded-lg hover:bg-primary-600 active:bg-primary-700 disabled:opacity-50 disabled:pointer-events-none flex items-center justify-center gap-x-2">
                Войти
            </button>
        </template>
    </RDialog>
</template>