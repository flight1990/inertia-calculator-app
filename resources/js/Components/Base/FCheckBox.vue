<script setup>

    const props = defineProps({
        id: String,
        label: String,
        disables: Boolean,
        errorMessage: [Array, String],
    });

    const model = defineModel({ default: false });

</script>

<template>    
    <div class="relative flex items-start">
        <div class="flex items-center h-5 ">
            <input v-model="model" :id="id" type="checkbox" :aria-describedby="id+'-error'"
                class="form-checkbox border-gray-200 rounded text-primary-600 focus:ring-primary-500 disabled:opacity-50 disabled:pointer-events-none" >
        </div>
        <label v-if="label || errorMessage" :for="id" class="ms-3">
            <span v-if="label" class="block text-sm font-semibold text-gray-800">
                {{ label }}
            </span>
            <span v-if="errorMessage" :id="id+'-error'" class="block text-sm text-red-600">
                {{ errorMessage }}
            </span>
        </label>
  </div>
</template>