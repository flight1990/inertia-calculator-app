<script setup>
    import FTextInput from "@/Components/Base/FTextInput.vue";
    import FCheckBox from "@/Components/Base/FCheckBox.vue";
    import { Link, useForm } from '@inertiajs/vue3';

    const form = useForm({
        email: '',
        password: '',
        remember: false,
    });

    const closeLoginModal = () => {
        document.getElementById('close-login-modal').click();
    }

    const login = () => {
        form.post('/login', {
            onSuccess: () => {
                closeLoginModal();
            }
        })
    }

</script>
<template>
    <section>
        <div id="hs-login-modal"
            class="hs-overlay-backdrop-open:backdrop-blur-sm hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto pointer-events-none">
            <div
                class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-sm sm:w-full m-3 sm:mx-auto h-[calc(100%-3.5rem)] min-h-[calc(100%-3.5rem)] flex items-center">
                <div
                    class="w-full max-h-full overflow-hidden flex flex-col bg-white border shadow-sm rounded-xl pointer-events-auto">
                    <div class="flex justify-between items-center py-3 px-4 border-b">
                        <h2 class="text-xl font-semibold text-gray-700">
                            Авторизация
                        </h2>
                        <button type="button" id="close-login-modal"
                            class="flex justify-center items-center size-9 text-sm font-semibold rounded-lg border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none"
                            data-hs-overlay="#hs-login-modal">
                            <span class="sr-only">Close</span>
                            <svg class="flex-shrink-0 size-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path d="M18 6 6 18"></path>
                                <path d="m6 6 12 12"></path>
                            </svg>
                        </button>
                    </div>
                    <div
                        class="p-4 overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300">

                        <form @submit.prevent="login" class="space-y-4">
                            <FTextInput v-model="form.email" label="Ваш E-mail" id="login-email" :error-message="form.errors.email" />
                            <FTextInput v-model="form.password" type="password" label="Пароль" id="login-password" :error-message="form.errors.password" />
                            <div class="flex items-center justify-between">
                                <FCheckBox v-model="form.remember" label="Запомнить меня" id="login-remember" />
                                <!-- <button type="button" class="text-sm font-medium text-primary-500 hover:underline decoration-2 underline-offset-4"
                                    data-hs-overlay="#hs-forgotPassword-modal">
                                    Забыли пароль?
                                </button> -->
                            </div>

                            <button type="submit" :disabled="form.processing" 
                                class="w-full py-3 px-4 font-semibold text-sm text-white bg-primary-500 rounded-lg hover:bg-primary-600 active:bg-primary-700 disabled:opacity-50 disabled:pointer-events-none flex items-center justify-center gap-x-2">
                                Войти
                            </button>
                        </form>

                        <div class="py-3 flex items-center text-xs text-gray-400 uppercase before:flex-1 before:border-t before:border-gray-200 before:me-6 after:flex-1 after:border-t after:border-gray-200 after:ms-6">
                           Или
                        </div>
                        
                        <button type="button" data-hs-overlay="#hs-register-modal"
                            class="w-full py-3 px-4 inline-flex items-center justify-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none">
                            Зарегистрироваться
                        </button>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>