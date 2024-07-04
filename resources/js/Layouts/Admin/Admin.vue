<script setup>
    import HeaderComponent from "@/Components/Admin/Header/HeaderComponent.vue";
    import SidebarComponent from "@/Components/Admin/Sidebar/SidebarComponent.vue";
</script>
<template>

    <HeaderComponent />

    <SidebarComponent />

    <div class="w-full min-h-[calc(100vh-3.55rem)] lg:ps-60 bg-gray-50">
        <div class="p-4 sm:p-6 space-y-4 sm:space-y-6">
            <slot />
        </div>
    </div>

</template>
