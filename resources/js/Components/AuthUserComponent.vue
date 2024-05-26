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

        <ul>
            <li>
                <Link href="/profile">Profile</Link>
            </li>
            <li>
                <Link href="/favorites">Favorites</Link>
            </li>
        </ul>

        <Link href="/logout" as="button" method="POST">Logout</Link>
    </div>
</template>
