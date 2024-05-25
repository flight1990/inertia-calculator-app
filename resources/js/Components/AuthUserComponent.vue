<script setup>

import {usePage, Link} from "@inertiajs/vue3";
import {computed} from "vue";

const page = usePage();
const user = computed(() => page.props.auth.user);

</script>

<template>
    <div v-if="user">
        {{ user }}

        <Link href="/profile">Profile</Link>
        <Link href="/logout" as="button" method="POST">Logout</Link>
    </div>
</template>
