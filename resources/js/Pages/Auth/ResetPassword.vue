<script setup>
import { Head, useForm } from '@inertiajs/vue3';
import Layout from "../../Layouts/Auth.vue";

defineOptions({
    layout: Layout
});

const props = defineProps({
    email: {
        type: String,
        required: true,
    },
    token: {
        type: String,
        required: true,
    },
});

const form = useForm({
    token: props.token,
    email: props.email,
    password: '',
    password_confirmation: '',
});

</script>

<template>

    <Head>
        <title>Reset Password</title>
    </Head>

    <form @submit.prevent="form.post('/reset-password')">
        <div>{{ status }}</div>

        <div>
            <label for="email">Email</label>
            <input type="text" id="email" v-model="form.email">
            <small v-if="form.errors.email">{{ form.errors.email }}</small>
        </div>

        <div>
            <label for="password">Password</label>
            <input type="password" id="password" v-model="form.password">
            <small v-if="form.errors.password">{{ form.errors.password }}</small>
        </div>

        <div>
            <label for="password_confirmation">Password confirmation</label>
            <input type="password" id="password_confirmation" v-model="form.password_confirmation">
            <small v-if="form.errors.password_confirmation">{{ form.errors.password_confirmation }}</small>
        </div>

        <button type="submit">Reset Password</button>
    </form>
</template>
