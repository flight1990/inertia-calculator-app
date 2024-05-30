<script setup>

import AuthUser from "@/Components/AuthUserComponent.vue";
import MenuList from "@/Components/Navigation/AdminMenuListComponent.vue";
import {usePage} from "@inertiajs/vue3";
import {computed} from "vue";

const page = usePage();
const user = computed(() => page.props.auth.user);
const menu = computed(() => page.props.menu);

</script>

<template>
    <nav>
        <MenuList
            :menu="menu.data"
        />
    </nav>

    <main>
        <AuthUser
            :user="user"
        />

        <slot/>
    </main>
</template>
