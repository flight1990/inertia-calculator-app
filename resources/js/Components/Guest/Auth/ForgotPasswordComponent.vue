<script setup>
    import FTextInput from "@/Components/Base/FTextInput.vue";

    import { ref } from "vue";
    import { useForm} from '@inertiajs/vue3';
   

    defineProps({
        status: String
    });

    const form = useForm({
        email: '',
    });
    const successMessage = ref(false);

    const closeForgotPasswordModal = () => {
        document.getElementById('close-forgotPassword-modal').click();
    }

    const forgotPassword = () => {
        form.post('/forgot-password', {
            onSuccess: () => {
                successMessage.value = true;
            }
        })
    }


</script>
<template>
    <section>
        <div id="hs-forgotPassword-modal"
            class="hs-overlay-backdrop-open:backdrop-blur-sm hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto pointer-events-none">
            <div
                class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-sm sm:w-full m-3 sm:mx-auto h-[calc(100%-3.5rem)] min-h-[calc(100%-3.5rem)] flex items-center">
                <div
                    class="w-full max-h-full overflow-hidden flex flex-col bg-white border shadow-sm rounded-xl pointer-events-auto">
                    <div class="flex justify-between items-center py-3 px-4 border-b">
                        <h2 class="text-xl font-semibold text-gray-700">
                            Восстановление пароля
                        </h2>
                        <button type="button" id="close-forgotPassword-modal"
                            class="flex justify-center items-center size-9 text-sm font-semibold rounded-lg border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none"
                            data-hs-overlay="#hs-forgotPassword-modal">
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

                        <div>{{ status }}</div>

                        <p v-if="successMessage" class="text-gray-700 ">
                            Письмо с инструкциями по восстановлению пароля отправлено на адрес <strong>{{ form.email }}</strong>
                        </p>

                        <form v-else @submit.prevent="forgotPassword" class="space-y-4">
                            <FTextInput v-model="form.email" label="Введите E-mail, указанный при регистрации" id="forgot-password-email" :error-message="form.errors.email" />
                            <button type="submit" :disabled="form.processing" 
                                class="w-full py-3 px-4 font-semibold text-sm text-white bg-primary-500 rounded-lg hover:bg-primary-600 active:bg-primary-700 disabled:opacity-50 disabled:pointer-events-none flex items-center justify-center gap-x-2">
                                Отправить
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>