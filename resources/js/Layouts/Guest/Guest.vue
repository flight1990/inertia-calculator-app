<script setup>
    import HeaderComponent from "@/Components/Guest/Header/HeaderComponent.vue";
    import FooterComponent from "@/Components/Guest/Footer/FooterComponent.vue";

    import {usePage} from "@inertiajs/vue3";
    import {computed, onMounted} from "vue";

    const page = usePage();
    const user = computed(() => page.props.auth.user);
    const menu = computed(() => page.props.menu);

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
