<script setup>

import {Head, useForm} from '@inertiajs/vue3';
import Layout from "@/Layouts/Auth.vue";

defineOptions({
    layout: Layout
});


defineProps({
    status: String
});

const form = useForm({
    email: '',
});

</script>

<template>
    <Head>
        <title>Forgot Password</title>
    </Head>

    <form @submit.prevent="form.post('/forgot-password')">
        <div>{{ status }}</div>

        <div>
            <label for="email">Email</label>
            <input type="text" id="email" v-model="form.email">
            <small v-if="form.errors.email">{{ form.errors.email }}</small>
        </div>

        <button type="submit" :disabled="form.processing">Email Password Reset Link</button>
    </form>
</template>
