<script setup>
    import { Link, usePage } from "@inertiajs/vue3";
    import { computed, ref } from "vue";

    import LoginComponent from "@/Components/Guest/Auth/LoginComponent.vue";
    import RegisterComponent from "@/Components/Guest/Auth/RegisterComponent.vue";

    import {
        DropdownMenuRoot,
        DropdownMenuTrigger,
        DropdownMenuPortal,
        DropdownMenuContent,
        DropdownMenuItem,
        DropdownMenuSeparator,
    } from 'radix-vue'

    const toggleState = ref(false)

    const page = usePage();
    const user = computed(() => page.props.auth.user);
</script>
<template>
    <DropdownMenuRoot v-model:open="toggleState">
        <DropdownMenuTrigger class="data-[state=open]:bg-gray-100 p-2 font-semibold text-gray-700 bg-white rounded-lg hover:bg-gray-100 focus:outline-none active:bg-gray-200 flex items-center gap-x-2">
            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="12" cy="8" r="5" />
                <path d="M20 21a8 8 0 0 0-16 0" />
            </svg>
        </DropdownMenuTrigger>
        <DropdownMenuPortal>
            <DropdownMenuContent
                :side-offset="10"
                class="mx-2 bg-white border shadow-md rounded-lg p-2 min-w-[240px] z-20 will-change-[opacity,transform] data-[side=top]:animate-slideDownAndFade data-[side=right]:animate-slideLeftAndFade data-[side=bottom]:animate-slideUpAndFade data-[side=left]:animate-slideRightAndFade"
                >
               
                <div class="py-3 px-5 -m-2 mb-2 bg-gray-100 rounded-t-lg">
                    <p class="font-medium text-gray-700 max-w-72 truncate">{{ user.name }}</p>
                    <p class="text-sm text-gray-700 max-w-72 truncate">{{ user.email }}</p>
                </div>
                <DropdownMenuItem as="div" value="LogOut">
                    <Link
                        class="w-full flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-200"
                        href="/logout" as="button" method="POST">
                        <svg class="w-5 h-5 flex-none" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4" />
                            <polyline points="16 17 21 12 16 7" />
                            <line x1="21" x2="9" y1="12" y2="12" />
                        </svg>
                        Выход
                    </Link>
                </DropdownMenuItem>
               
            </DropdownMenuContent>
        </DropdownMenuPortal>
    </DropdownMenuRoot>
</template>