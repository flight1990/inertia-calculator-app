<script setup>

import AuthUser from "../Components/AuthUserComponent.vue";

</script>

<template>
    <div>
        Layout: Guest

        <AuthUser />

        <slot />
    </div>
</template>
