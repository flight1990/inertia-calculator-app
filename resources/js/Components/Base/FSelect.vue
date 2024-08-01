<script setup>

const model = defineModel({default: null});

const props = defineProps({
    errorMessage: [Array, String],
    label: String,
    disables: Boolean,
    itemName: {
        type: String,
        default: 'name'
    },
    itemValue: {
        type: String,
        default: 'id'
    },
    items: {
        type: Array,
        default: () => []
    }
});

</script>

<template>
    <!-- <div>
        <label>
            {{ label ?? '' }}
            <select v-model="model">
                <option value="" disabled>Choose an option</option>
                <option class="form-select" :value="item[itemValue]" v-for="item in items" :key="item[itemValue]">
                    {{ item[itemName] }}
                </option>
            </select>
        </label>
    </div> -->
    <div class="">
        <label v-if="label" :for="label"
            class="block text-sm text-gray-700 font-medium mb-2">
            {{ label }}
        </label>
        <select v-model="model" :id="label"
            class="form-select py-3 px-4 pe-9 block w-full border-gray-200 rounded-lg text-sm focus:border-primary-500 focus:ring-primary-500 disabled:opacity-50 disabled:pointer-events-none">
            <option value="">Выбрать</option>
            <option class="form-select" :value="item[itemValue]" v-for="item in items" :key="item[itemValue]">
                {{ item[itemName] }}
            </option>
        </select>
        <p v-if="errorMessage" class="mt-2 text-sm text-red-600">
            {{ errorMessage }}
        </p>
    </div>
</template>
