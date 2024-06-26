<script setup>
    import FTextInput from "@/Components/Base/FTextInput.vue";
    import FTextArea from "@/Components/Base/FTextArea.vue";
    import FFileInput from "@/Components/Base/FFileInput.vue";
    import { useForm, usePage } from "@inertiajs/vue3";
    import { computed, ref } from "vue";
    import RDialog from "@/Components/Base/RDialog.vue";

    const props = defineProps({
        modalTitle: {
            type: String,
            default: 'Обратиться в поддержку'
        },
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

    const open = ref(false);

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
                open.value = false
            }
        });
    }
</script>

<template>
    <RDialog :title="modalTitle" :width="490" v-model="open">
        <template v-slot:trigger>
            
            <template v-if="sendUrl">
                <button type="button" class="flex items-center text-sm gap-2 text-gray-500 hover:text-gray-800">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="h-4 w-4">
                        <path d="M22 10.5V6a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2v12c0 1.1.9 2 2 2h12.5" />
                        <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7" />
                        <path d="M20 14v4" />
                        <path d="M20 22v.01" />
                    </svg>
                    Сообщить об ошибке
                </button>
            </template>
            <template v-else>
                <button type="button" class="inline-block rounded-lg px-3 py-2 text-sm text-gray-700 hover:bg-gray-100">
                    Поддержка
                </button>
            </template>
            
        </template>
        <template v-slot:body>
            <form class="space-y-6">
                <FTextInput v-model="form.email" label="Ваш E-mail" id="support-email" :error-message="form.errors.email" />
                <FTextArea v-model="form.message" label="Сообщение" id="support-message" :error-message="form.errors.message" />
                <FFileInput v-model="form.files" label="Прикрепить файл" id="support-files" :error-message="fileErrors" />
            </form>
        </template>
        <template v-slot:footer>
            <button @click.prevent="sendHandler" :disabled="form.processing"
                    class="px-3 py-2 font-semibold text-sm text-white bg-primary-500 rounded-lg hover:bg-primary-600 active:bg-primary-700 flex items-center gap-x-2">
                Отправить
            </button>
        </template>
    </RDialog>









    <!-- <FDialog :title="modalTitle">
        <template v-if="sendUrl" v-slot:button="{openDialog}">
            <button @click="openDialog" type="button" class="flex items-center text-sm gap-2 text-gray-500 hover:text-gray-800">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round" class="h-4 w-4">
                    <path d="M22 10.5V6a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2v12c0 1.1.9 2 2 2h12.5" />
                    <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7" />
                    <path d="M20 14v4" />
                    <path d="M20 22v.01" />
                </svg>
                Сообщить об ошибке
            </button>
        </template>
        <template v-else v-slot:button="{openDialog}">
            <button @click="openDialog" type="button" class="inline-block rounded-lg px-3 py-2 text-sm text-gray-700 hover:bg-gray-100">
                Поддержка
            </button>
        </template>
        <template v-slot:default="{closeDialog}">
            <form class="space-y-6">
                <FTextInput v-model="form.email" label="Ваш E-mail" id="support-email" :error-message="form.errors.email" />
                <FTextArea v-model="form.message" label="Сообщение" id="support-message" :error-message="form.errors.message" />
                <FFileInput v-model="form.files" label="Прикрепить файл" id="support-files" :error-message="fileErrors" />
            </form>
        </template>
        <template v-slot:actions>
            <button @click.prevent="sendHandler" :disabled="form.processing"
                    class="px-3 py-2 font-semibold text-sm text-white bg-primary-500 rounded-lg hover:bg-primary-600 active:bg-primary-700 flex items-center gap-x-2">
                Отправить
            </button>
        </template>
    </FDialog> -->
</template>
