<script setup>

import {Link} from "@inertiajs/vue3";

defineProps({
    user: Object
});

</script>

<template>
    <div v-if="user">
        <div>
            <p>{{ user.name }}</p>
            <p><small>{{ user.email }}</small></p>
        </div>

        <Link href="/logout" as="button" method="POST">Logout</Link>
    </div>
</template>