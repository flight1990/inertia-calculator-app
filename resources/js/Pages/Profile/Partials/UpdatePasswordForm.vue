<script setup>

import {useForm} from '@inertiajs/vue3';
import {ref} from 'vue';

const passwordInput = ref(null);
const currentPasswordInput = ref(null);

const form = useForm({
    current_password: '',
    password: '',
    password_confirmation: '',
});

const updatePassword = () => {
    form.put('/password', {
        preserveScroll: true,
        onSuccess: () => form.reset(),
        onError: () => {
            if (form.errors.password) {
                form.reset('password', 'password_confirmation');
            }
            if (form.errors.current_password) {
                form.reset('current_password');
            }
        },
    });
};
</script>

<template>

    <h2>Update Password</h2>

    <p>
        Ensure your account is using a long, random password to stay secure.
    </p>

    <form @submit.prevent="updatePassword">
        <div>
            <label for="current_password">Current password</label>
            <input type="password" id="current_password" v-model="form.current_password">
            <small v-if="form.errors.current_password">{{ form.errors.current_password }}</small>
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

        <button :disabled="form.processing">Save</button>

        <Transition
            enter-active-class="transition ease-in-out"
            enter-from-class="opacity-0"
            leave-active-class="transition ease-in-out"
            leave-to-class="opacity-0"
        >
            <p v-if="form.recentlySuccessful">Saved.</p>
        </Transition>
    </form>
</template>
