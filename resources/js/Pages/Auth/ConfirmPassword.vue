<script setup>

import {Head, useForm} from '@inertiajs/vue3';
import Layout from "@/Layouts/Auth/Auth.vue";

defineOptions({
    layout: Layout
});

const form = useForm({
    password: '',
});

</script>

<template>
    <Head>
        <title>Confirm Password</title>
    </Head>

    <p>
        This is a secure area of the application. Please confirm your password before continuing.
    </p>

    <form @submit.prevent="form.post('confirm-password')">

        <div>
            <label for="password">Password</label>
            <input type="password" id="password" v-model="form.password">
            <small v-if="form.errors.password">{{ form.errors.password }}</small>
        </div>

        <button type="submit">Confirm</button>
    </form>

</template>
