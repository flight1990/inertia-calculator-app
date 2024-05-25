<script setup>
import {Link, useForm, usePage} from '@inertiajs/vue3';

defineProps({
    mustVerifyEmail: Boolean,
    status: String,
});

const user = usePage().props.auth.user;

const form = useForm({
    name: user.name,
    email: user.email,
});
</script>

<template>

    <h2>Profile Information</h2>

    <p>
        Update your account's profile information and email address.
    </p>

    <form @submit.prevent="form.patch('/profile')">
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

        <div v-if="mustVerifyEmail && user.email_verified_at === null">
            <p>
                Your email address is unverified.
            </p>

            <Link href="/email/verification-notification" method="post" as="button">
                Click here to re-send the verification email.
            </Link>

            <div v-show="status === 'verification-link-sent'">
                A new verification link has been sent to your email address.
            </div>
        </div>

        <div>
            <button :disabled="form.processing">Save</button>

            <Transition
                enter-active-class="transition ease-in-out"
                enter-from-class="opacity-0"
                leave-active-class="transition ease-in-out"
                leave-to-class="opacity-0"
            >
                <p v-if="form.recentlySuccessful">Saved.</p>
            </Transition>
        </div>
    </form>
</template>
