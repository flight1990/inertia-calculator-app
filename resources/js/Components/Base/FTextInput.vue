<script setup>

const model = defineModel();

const props = defineProps({
    id: String,
    label: String,
    placeholder: String,
    disabled: Boolean,
    type: {
        type: String,
        default: 'text'
    },
    errorMessage: [Array, String],
});

</script>

<template>
    <div class="">
        <label v-if="label" :for="id" 
            class="block text-sm text-gray-700 font-medium mb-2">
            {{ label }}
        </label>
        <input v-model="model" :type="type" :id="id" :placeholder="placeholder" :disabled="disabled" :aria-describedby="'hs-input-'+id+'-helper-text'"
            class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-primary-500 focus:ring-primary-500 disabled:opacity-50 disabled:pointer-events-none disabled:bg-gray-100">
        <p v-if="errorMessage" class="mt-2 text-sm text-red-600" :id="'hs-input-'+id+'-helper-text'">
            {{ errorMessage }}
        </p>
    </div>
</template>
