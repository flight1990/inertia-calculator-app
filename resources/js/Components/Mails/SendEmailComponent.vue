<script setup>

import FTextInput from "@/Components/Base/FTextInput.vue";
import FTextArea from "@/Components/Base/FTextArea.vue";
import FFileInput from "@/Components/Base/FFileInput.vue";
import {useForm, usePage} from "@inertiajs/vue3";
import {computed} from "vue";

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
    <form @submit.prevent="sendHandler">
        <FTextInput
            label="Email"
            v-model="form.email"
            :error-message="form.errors.email"
        />

        <FTextArea
            label="Message"
            v-model="form.message"
            :error-message="form.errors.message"
        />

        <FFileInput
            label="File"
            v-model="form.files"
            :error-message="fileErrors"
        />

        <button type="submit" :disabled="form.processing">Send</button>
    </form>
</template>
