<script setup>
import { computed } from 'vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import Layout from "../../Layouts/Auth.vue";

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
        <title>Email Verification</title>
    </Head>

    <p>
        Thanks for signing up! Before getting started, could you verify your email address by clicking on the link
        we just emailed to you? If you didn't receive the email, we will gladly send you another.
    </p>

    <p v-if="verificationLinkSent">
        A new verification link has been sent to the email address you provided during registration.
    </p>

    <form @submit.prevent="form.post('/email/verification-notification')">

        <button :disabled="form.processing">Resend Verification Email</button>

        <Link href="/logout" method="post" as="button">Log Out</Link>
    </form>
</template>
