<script setup>

const model = defineModel();

const props = defineProps({
    errorMessage: [Array, String],
    label: String,
    disables: Boolean,
    rows: {
        type: [Number, String],
        default: 10
    },
    cols: {
        type: [Number, String],
        default: 100
    }
});

</script>

<template>
    <div>
        <label>
            {{ label ?? '' }}
            <textarea :rows="rows" :cols="cols" v-model="model"></textarea>
        </label>

        <small v-if="errorMessage">{{ errorMessage }}</small>
    </div>
</template>
