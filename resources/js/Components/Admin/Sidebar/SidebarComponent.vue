<script setup>
    import LogoComponent from "@/Components/Admin/Logo/LogoComponent.vue";
    import MenuComponent from "@/Components/Admin/Menu/MenuComponent.vue";
</script>
<template>
    <div class="-translate-x-full transition-all duration-300 transform w-[240px] hidden fixed inset-y-0 start-0 z-[60] bg-white border-e border-gray-200 lg:block lg:translate-x-0 lg:end-auto lg:bottom-0">
        <div class="px-4 pt-4">
            <LogoComponent/>
        </div>
        <nav class="p-6 w-full flex flex-col flex-wrap">
            <MenuComponent />
        </nav>
    </div>
</template>