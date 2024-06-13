<script setup>
    import LogoComponent from "@/Components/Components/Guest/LogoComponent.vue";
    import SearchComponent from "@/Components/Components/Guest/Search/SearchComponent.vue";
    import MenuComponent from "@/Components/Components/Guest/Menu/MenuComponent.vue";
    import UserDropdownButtonComponent from "@/Components/Components/Guest/User/UserDropdownButtonComponent.vue";
</script>
<template>
    <header class="h-16 border-b">
        <div class="h-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="h-full flex items-center justify-between gap-x-10">
                <LogoComponent />
                <div class="flex items-center gap-x-2 sm:gap-x-6">
                    <SearchComponent />
                    <UserDropdownButtonComponent />
                    <div class="sm:border-l sm:pl-6">
                        <MenuComponent />
                    </div>
                </div>
            </div>
        </div>
    </header>
</template>