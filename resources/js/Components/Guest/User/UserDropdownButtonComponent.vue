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
                class="bg-white border shadow-md rounded-lg p-2 min-w-[240px] z-20 will-change-[opacity,transform] data-[side=top]:animate-slideDownAndFade data-[side=right]:animate-slideLeftAndFade data-[side=bottom]:animate-slideUpAndFade data-[side=left]:animate-slideRightAndFade"
                >
                <template v-if="user">
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
                </template>
                <template v-else>
                    <div class="space-y-1.5">
                        <LoginComponent />
                        <RegisterComponent />
                    </div>
                </template>
            </DropdownMenuContent>
        </DropdownMenuPortal>
    </DropdownMenuRoot>












        <!-- <div class="inline-flex hs-dropdown relative">
            <button id="hs-dropdown-user" type="button"
                class="hs-dropdown-toggle p-2 font-semibold text-gray-700 bg-white rounded-lg hover:bg-gray-100 active:bg-gray-200 flex items-center gap-x-2 hs-dropdown-open:bg-gray-100">
                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="12" cy="8" r="5" />
                    <path d="M20 21a8 8 0 0 0-16 0" />
                </svg>
            </button>
            <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden min-w-60 bg-white shadow-md rounded-lg p-2 mt-2 border z-20"
                aria-labelledby="hs-dropdown-user">
                <div v-if="user">
                    <div class="py-3 px-5 -m-2 mb-2 bg-gray-100 rounded-t-lg">
                        <p class="font-medium text-gray-700 max-w-72 truncate">{{ user.name }}</p>
                        <p class="text-sm text-gray-700 max-w-72 truncate">{{ user.email }}</p>
                    </div>
                    <div class="divide-y divide-gray-200 ">
                        <div class="py-2 first:pt-0 last:pb-0">
                            <Link class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-200"
                                href="#">
                                <svg class="w-5 h-5 flex-none" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M3 4.5A1.5 1.5 0 0 1 4.5 3h12.64L21 6.603V19.5a1.5 1.5 0 0 1-1.5 1.5h-15A1.5 1.5 0 0 1 3 19.5v-15Z"></path>
                                    <path d="M12.004 3 12 6.692c0 .17-.224.308-.5.308h-4c-.276 0-.5-.138-.5-.308V3h5.004Z"></path>
                                    <path d="M4.5 3h12.64"></path>
                                    <path d="M7 13h10"></path>
                                    <path d="M7 17h5.004"></path>
                                </svg>
                                Сохраненные расчеты
                            </Link>
                            <Link
                                class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-200"
                                :href="'/favorites'">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                    class="w-5 h-5 flex-none">
                                    <polygon
                                        points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2" />
                                </svg>
                                Избранные калькуляторы
                            </Link>
                        </div> 
                        <div class="py-2 first:pt-0 last:pb-0">
                            <Link
                                class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-200"
                                :href="'/profile'">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                    class="w-5 h-5 flex-none">
                                    <path d="M2 21a8 8 0 0 1 10.434-7.62" />
                                    <circle cx="10" cy="8" r="5" />
                                    <circle cx="18" cy="18" r="3" />
                                    <path d="m19.5 14.3-.4.9" />
                                    <path d="m16.9 20.8-.4.9" />
                                    <path d="m21.7 19.5-.9-.4" />
                                    <path d="m15.2 16.9-.9-.4" />
                                    <path d="m21.7 16.5-.9.4" />
                                    <path d="m15.2 19.1-.9.4" />
                                    <path d="m19.5 21.7-.4-.9" />
                                    <path d="m16.9 15.2-.4-.9" />
                                </svg>
                                Профиль
                            </Link>
                        </div>
                        <div class="py-2 first:pt-0 last:pb-0">
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
                        </div>

                    </div>
                </div>
                <div v-else>
                    <div class="py-2 first:pt-0 last:pb-0">
                        <LoginComponent />
                        <RegisterComponent />
                    </div>
                </div>
            </div>
        </div> -->


</template>