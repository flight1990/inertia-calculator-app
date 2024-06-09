<script setup>
import HeaderComponent from "@/Components/Components/Guest/Header/HeaderComponent.vue";
import FooterComponent from "@/Components/Components/Guest/Footer/FooterComponent.vue";

</script>
<template>
    <div class="min-h-screen flex flex-col">
        <HeaderComponent/>
        <main class="flex-1 bg-stone-50">
            <slot/>
        </main>
        <FooterComponent/>
    </div>
</template>
