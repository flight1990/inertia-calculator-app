<script setup>

import Layout from "@/Layouts/Admin.vue";
import {Head, Link, useForm} from "@inertiajs/vue3";
import FTextInput from "@/Components/Base/FTextInput.vue";

defineOptions({
    layout: Layout
});

const props = defineProps({
    user: Object
});

const form = useForm({
    name: props.user?.name ?? "",
    email: props.user?.email ?? "",
    password: "",
    password_confirmation: ""
});

const saveUser = () => {
    props.user ? form.patch(`/admin/users/${props.user.id}`) : form.post('/admin/users');
}

</script>

<template>
    <Head>
        <title>{{ user ? 'Edit' : 'Create' }} user</title>
    </Head>

    <form @submit.prevent="saveUser">

        <FTextInput
            label="Name"
            v-model="form.name"
            :error-message="form.errors.name"
        />

        <FTextInput
            label="Email"
            v-model="form.email"
            :error-message="form.errors.email"
        />

        <FTextInput
            type="password"
            label="Password"
            v-model="form.password"
            :error-message="form.errors.password"
        />

        <FTextInput
            type="password"
            label="Password confirmation"
            v-model="form.password_confirmation"
            :error-message="form.errors.password_confirmation"
        />

        <button type="submit">{{ user ? 'Update' : 'Create' }}</button>
    </form>

    <Link href="/admin/users">Return to index</Link>
</template>
