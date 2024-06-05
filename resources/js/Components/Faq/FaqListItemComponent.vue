<script setup>

defineProps({
    item: Object
});

</script>

<template>
    <div>
        <h3>{{ item.question }}</h3>
        <p v-html="item.answer"></p>
    </div>
</template>
