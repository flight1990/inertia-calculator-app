<script setup>

const props = defineProps({
    errorMessage: [Array, String],
    label: String,
    disables: Boolean,
});

const model = defineModel({default: false});

</script>

<template>
    <div>
        <label>
            {{ label ?? '' }}
            <input type="checkbox" v-model="model">
        </label>

        <small v-if="errorMessage">{{ errorMessage }}</small>
    </div>
</template>
