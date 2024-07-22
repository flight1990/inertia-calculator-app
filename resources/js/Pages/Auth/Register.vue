<script setup>

import {Head, Link, useForm} from '@inertiajs/vue3';
import Layout from "@/Layouts/Auth/Auth.vue";

defineOptions({
    layout: Layout
});

const form = useForm({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
});

</script>

<template>

    <Head>
        <title>Register</title>
    </Head>

    <form @submit.prevent="form.post('register')">
        <div>
            <label for="name">Name</label>
            <input type="text" id="name" v-model="form.name">
            <small v-if="form.errors.name">{{ form.errors.name }}</small>
        </div>

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

        <button type="submit">Register</button>
    </form>

    <Link href="/login">Login</Link>
</template>
