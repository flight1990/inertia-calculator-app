<script setup>

const model = defineModel({default: ''});

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
    <div>
        <label>
            {{ label ?? '' }}
            <select v-model="model">
                <option value="" disabled>Choose an option</option>
                <option class="form-select" :value="item[itemValue]" v-for="item in items" :key="item[itemValue]">
                    {{ item[itemName] }}
                </option>
            </select>
        </label>

        <small v-if="errorMessage">{{ errorMessage }}</small>
    </div>
</template>
