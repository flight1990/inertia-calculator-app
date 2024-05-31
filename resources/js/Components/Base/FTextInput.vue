<script setup>

const model = defineModel();

const props = defineProps({
    errorMessage: [Array, String],
    label: String,
    disables: Boolean,
    type: {
        type: String,
        default: 'text'
    }
});

</script>

<template>
    <div>
        <label>
            {{ label ?? '' }}
            <input :type="type" v-model="model">
        </label>

        <small v-if="errorMessage">{{ errorMessage }}</small>
    </div>
</template>
