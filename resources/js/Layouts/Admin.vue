<script setup>

import AuthUser from "../Components/AuthUserComponent.vue";

</script>

<template>
    <div>
        Layout: Admin

        <AuthUser />

        <slot />
    </div>
</template>
