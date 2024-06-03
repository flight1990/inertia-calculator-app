<script setup>
    import SupportModalComponent from "@/Components/Components/Guest/Support/SupportModalComponent.vue";
</script>
<template>
    <button type="button" class="inline-block rounded-lg px-3 py-2 text-sm text-gray-700 hover:bg-gray-100"
        data-hs-overlay="#hs-support-modal">
        Поддержка
    </button>
    <SupportModalComponent 
        title="Feedbacks"
        subject="Feedback"
    />
</template>