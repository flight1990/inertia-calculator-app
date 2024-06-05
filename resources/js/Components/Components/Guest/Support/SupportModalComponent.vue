<script setup>
import FTextInput from "@/Components/Base/FTextInput.vue";
import FTextArea from "@/Components/Base/FTextArea.vue";
import FFileInput from "@/Components/Base/FFileInput.vue";
import { useForm, usePage } from "@inertiajs/vue3";
import { computed } from "vue";

const props = defineProps({
    title: {
        type: String,
        required: true
    },
    subject: {
        type: String,
        required: true
    },
    sendUrl: {
        type: Boolean,
        default: false
    }
});

const user = computed(() => usePage().props.auth.user);
const url = computed(() => props.sendUrl ? window.location.href : null);

const form = useForm({
    title: props.title ?? null,
    subject: props.subject ?? null,
    email: user?.value?.email ?? null,
    message: null,
    url: url.value ?? null,
    files: []
});

const fileErrors = computed(() => {
    return Object.entries(form.errors)
        .filter(([key, value]) => key.startsWith('files'))
        .map(([key, value]) => value);
})

const sendHandler = () => {
    form.post('/mails/send', {
        preserveScroll: true,
        forceFormData: true,
        onSuccess: () => {
            form.reset();
        }
    });
}
</script>

<template>
    <div id="hs-support-modal"
        class="hs-overlay-backdrop-open:backdrop-blur-sm hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto pointer-events-none">
        <div
            class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto h-[calc(100%-3.5rem)] min-h-[calc(100%-3.5rem)] flex items-center">
            <div
                class="w-full max-h-full overflow-hidden flex flex-col bg-white border shadow-sm rounded-xl pointer-events-auto">
                <div class="flex justify-between items-center py-3 px-4 border-b">
                    <h2 class="text-xl font-semibold text-gray-700">
                        Обратиться в поддержку
                    </h2>
                    <button type="button"
                        class="flex justify-center items-center size-9 text-sm font-semibold rounded-lg border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none"
                        data-hs-overlay="#hs-support-modal">
                        <span class="sr-only">Close</span>
                        <svg class="flex-shrink-0 size-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path d="M18 6 6 18"></path>
                            <path d="m6 6 12 12"></path>
                        </svg>
                    </button>
                </div>
                <div
                    class="p-4 overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300">

                    <form @submit.prevent="sendHandler" class="space-y-6">
                        <FTextInput v-model="form.email" label="Ваш E-mail" :error-message="form.errors.email" />
                        <FTextArea v-model="form.message" label="Сообщение" :error-message="form.errors.message" />
                        <FFileInput v-model="form.files" label="Прикрепить файл" :error-message="fileErrors" />
                        
                        <button type="submit" :disabled="form.processing" 
                            class="px-3 py-2 font-semibold text-sm text-white bg-primary-500 rounded-lg hover:bg-primary-600 active:bg-primary-700 flex items-center gap-x-2">
                            Отправить
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>
