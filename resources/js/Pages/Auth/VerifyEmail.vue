<script setup>

import { computed } from 'vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import Layout from "@/Layouts/Auth/Auth.vue";

defineOptions({
    layout: Layout
});

const props = defineProps({
    status: String
});

const form = useForm({});
const verificationLinkSent = computed(() => props.status === 'verification-link-sent');

</script>

<template>
    <Head>
        <title>Подтверждение Email</title>
    </Head>

    <div class="w-full max-w-80 mx-2 bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden">
        <div class="px-6 py-4 gap-3 border-b border-gray-200 text-center">
            <h2 class="text-xl font-semibold text-gray-800">
                Подтверждение Email
            </h2>
        </div>
        <div class="px-6 py-4 flex flex-col gap-y-3.5">
            <p class="text-sm">
                Thanks for signing up! Before getting started, could you verify your email address by clicking on the link
                we just emailed to you? If you didn't receive the email, we will gladly send you another.
            </p>
            <p class="text-sm" v-if="verificationLinkSent">
                A new verification link has been sent to the email address you provided during registration.
            </p>
            <form @submit.prevent="form.post('/email/verification-notification')" class="flex flex-col gap-y-3.5">
                <button :disabled="form.processing" type="submit" class="py-2 px-3 w-full flex items-center justify-center text-sm font-semibold rounded-lg border border-transparent bg-primary-600 text-white hover:bg-primary-700 disabled:opacity-50 disabled:pointer-events-none">
                    Выслать повторно письмо для подтверждения
                </button>
                <div class="text-center">
                    <Link href="/logout" method="post" as="button" class="text-sm underline hover:text-gray-500">Выход</Link>
                </div>
            </form>
        </div>
    </div>
</template>
