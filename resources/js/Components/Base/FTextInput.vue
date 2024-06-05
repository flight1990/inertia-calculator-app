<script setup>

const model = defineModel();

const props = defineProps({
    errorMessage: [Array, String],
    label: String,
    placeholder: String,
    disabled: Boolean,
    type: {
        type: String,
        default: 'text'
    }
});

</script>

<template>
    <!-- <div>
        <label>
            {{ label ?? '' }}
            <input :type="type" v-model="model">
        </label>

        <small v-if="errorMessage">{{ errorMessage }}</small>
    </div> -->

    <div class="">
        <label v-if="label" :for="'input-'+type+'-'+label" 
            class="block text-sm text-gray-700 font-medium mb-2">
            {{ label }}
        </label>
        <input v-model="model" :type="type" :id="'input-'+type+'-'+label" :placeholder="placeholder" :disabled="disabled" :aria-describedby="'hs-input-'+type+'-helper-text'"
            class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-primary-500 focus:ring-primary-500 disabled:opacity-50 disabled:pointer-events-none disabled:bg-gray-100">
        <p v-if="errorMessage" class="mt-2 text-sm text-red-600" :id="'hs-input-'+type+'-helper-text'">
            {{ errorMessage }}
        </p>
    </div>
</template>
