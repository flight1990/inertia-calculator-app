<script setup>

import { useForm } from '@inertiajs/vue3';

const form = useForm({
    password: '',
});

</script>

<template>
    <h2>Delete Account</h2>

    <p>
        Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting
        your account, please download any data or information that you wish to retain.
    </p>

    <form @submit.prevent="form.delete('/profile')">
        <div>
            <label for="password">Password</label>
            <input type="password" id="password" v-model="form.password">
            <small v-if="form.errors.password">{{ form.errors.password }}</small>
        </div>

        <button type="submit">Delete Account</button>
    </form>
</template>
