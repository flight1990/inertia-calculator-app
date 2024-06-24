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
    <div class="h-screen min-h-screen flex flex-row overflow-y-hidden">
        <nav class="w-64 flex flex-col border-r">
            <div>HEADER</div>
            <div class="flex-1 overflow-y-auto">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat, adipisci ex repudiandae tempore id, accusamus necessitatibus error, labore a odio illum ipsum maxime quos dolor at vero nobis aperiam molestiae.
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat, adipisci ex repudiandae tempore id, accusamus necessitatibus error, labore a odio illum ipsum maxime quos dolor at vero nobis aperiam molestiae.
            </div>
            <div>FOOTER</div>
        </nav>
        <main class="flex-1 overflow-y-auto px-10 py-6">
            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Deserunt voluptas sequi quam dolores beatae rerum unde minima quis accusantium! Voluptate reiciendis veniam dolorum mollitia, commodi doloribus voluptas soluta veritatis pariatur. 
            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Deserunt voluptas sequi quam dolores beatae rerum unde minima quis accusantium! Voluptate reiciendis veniam dolorum mollitia, commodi doloribus voluptas soluta veritatis pariatur. 
            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Deserunt voluptas sequi quam dolores beatae rerum unde minima quis accusantium! Voluptate reiciendis veniam dolorum mollitia, commodi doloribus voluptas soluta veritatis pariatur. 
        </main>
    </div>


    <!-- <nav>
        <MenuList
            :menu="menu.data"
        />
    </nav>

    <main>
        <AuthUser
            :user="user"
        />

        <slot/>
    </main> -->
</template>
