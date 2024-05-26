<script setup>

import AuthUser from "../Components/AuthUserComponent.vue";
import MenuList from "../Components/Navigation/GuestMenuListComponent.vue";
import {usePage} from "@inertiajs/vue3";
import {computed} from "vue";

const page = usePage();
const user = computed(() => page.props.auth.user);
const menu = computed(() => page.props.menu);

</script>

<template>
    <div>
        Layout: Guest

        <MenuList
            :menu="menu.data"
        />

        <AuthUser
            :user="user"
        />

        <slot />
    </div>
</template>
