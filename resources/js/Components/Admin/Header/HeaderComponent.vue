<script setup>
    import {Link} from "@inertiajs/vue3";

    import LogoComponent from "@/Components/Admin/Logo/LogoComponent.vue";
    import SidebarMobileComponent from "@/Components/Admin/Sidebar/SidebarMobileComponent.vue";
    import UserDropdownButtonComponent from "@/Components/Admin/User/UserDropdownButtonComponent.vue";

</script>
<template>
    <header class="sticky top-0 inset-x-0 flex flex-wrap sm:justify-start sm:flex-nowrap z-[20] w-full bg-white border-b text-sm py-2.5 lg:ps-64">
        <nav class="flex basis-full items-center w-full mx-auto px-4 sm:px-6" aria-label="Global">
            <div class="me-2 lg:hidden">
                <SidebarMobileComponent/>
            </div>
            <div class="me-5 lg:me-0 lg:hidden">
                <!-- Logo -->
                <LogoComponent/>
                <!-- End Logo -->
            </div>
            <div class="w-full flex items-center justify-end ms-auto sm:justify-between sm:gap-x-3 sm:order-3">
                <div class="ms-auto flex flex-row items-center justify-end gap-2">
                    <Link href="/" title="Вернуться на сайт" class="flex justify-center items-center size-9 text-sm font-semibold rounded-lg border border-transparent text-gray-800 hover:bg-gray-100 active:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="24"
                            height="24"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            class="flex-shrink-0 size-4"
                        >
                            <path d="M15 21v-8a1 1 0 0 0-1-1h-4a1 1 0 0 0-1 1v8"/>
                            <path d="M3 10a2 2 0 0 1 .709-1.528l7-5.999a2 2 0 0 1 2.582 0l7 5.999A2 2 0 0 1 21 10v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/>
                        </svg>
                    </Link>
                    <UserDropdownButtonComponent />
                </div>
            </div>
        </nav>
    </header>
</template>
