<script setup>

import {Head, Link, useForm} from '@inertiajs/vue3';
import Layout from "../../Layouts/Auth.vue";

defineOptions({
    layout: Layout
});

const form = useForm({
    email: '',
    password: '',
    remember: false,
});

</script>

<template>
    <Head>
        <title>Login</title>
    </Head>

    <form @submit.prevent="form.post('/login')">
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
            <input type="checkbox" id="remember" v-model="form.remember">
            <label for="remember">Remember me</label>
        </div>

        <button type="submit" :disabled="form.processing">Login</button>
    </form>

    <Link href="/forgot-password">Forgot your password?</Link>
    <Link href="/register">Register</Link>
</template>
