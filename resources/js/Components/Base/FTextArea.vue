<script setup>

const model = defineModel();

const props = defineProps({
    id: String,
    label: String,
    placeholder: String,
    disables: Boolean,
    rows: {
        type: [Number, String],
        default: 3
    },
    cols: {
        type: [Number, String],
        default: 100
    },
    errorMessage: [Array, String],
});

</script>

<template>
    <div class="">
        <label v-if="label" :for="'textarea-'+id" 
            class="block text-sm text-gray-700 font-medium mb-2">
            {{ label }}
        </label>
        <textarea v-model="model" :id="'textarea-'+id" :rows="rows" :cols="cols" :placeholder="placeholder" :aria-describedby="'hs-textarea-'+id+'-helper-text'"
            class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-primary-500 focus:ring-primary-500 disabled:opacity-50 disabled:pointer-events-none" 
        ></textarea>
        <p v-if="errorMessage" class="mt-2 text-sm text-red-600" :id="'hs-textarea-'+id+'-helper-text'">
            {{ errorMessage }}
        </p>
    </div>
</template>
