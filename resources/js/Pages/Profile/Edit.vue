<script setup>
import DeleteUserForm from './Partials/DeleteUserForm.vue';
import UpdatePasswordForm from './Partials/UpdatePasswordForm.vue';
import UpdateProfileInformationForm from './Partials/UpdateProfileInformationForm.vue';
import {Head} from '@inertiajs/vue3';

defineProps({
    mustVerifyEmail: Boolean,
    status: String
});
</script>

<template>
    <Head>
        <title>Profile</title>
    </Head>

    <UpdateProfileInformationForm
        :must-verify-email="mustVerifyEmail"
        :status="status"
    />

    <UpdatePasswordForm/>

    <DeleteUserForm/>
</template>
