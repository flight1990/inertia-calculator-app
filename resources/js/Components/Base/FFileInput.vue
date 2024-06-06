<script setup>
    import {ref} from "vue";

    const model = defineModel();

    const props = defineProps({
        id: String,
        errorMessage: Array,
        label: String,
        disabled: Boolean,
        showFilesSize: {
            type: Boolean,
            default: true
        },
        multiple: {
            type: Boolean,
            default: true
        }
    });

    const filesSize = ref(0);

    const uploadFilesHandler = (event) => {
        const files = event.target.files;

        filesSize.value = 0;

        for (let i = 0; i < files.length; i++) {
            filesSize.value += files[i].size;
        }

        const filesSizeInMB = filesSize.value / (1024 * 1024);

        filesSize.value = filesSizeInMB.toFixed(4);

        model.value = files;
    }
</script>

<template>
    <div class="">
        <label v-if="label" :for="'file-input-'+id"
            class="block text-sm text-gray-700 font-medium mb-2">
            {{ label }}
        </label>
        <input type="file" :id="'file-input-'+id" :multiple="multiple" @input="uploadFilesHandler" :disabled="disabled"
            class="block w-full border border-gray-200 shadow-sm rounded-lg text-sm
            focus:z-10 focus:border-primary-500 focus:ring-primary-500 focus:outline-none
            disabled:opacity-50 disabled:pointer-events-none disabled:bg-gray-100
            file:bg-gray-50 file:border-0 file:me-4 file:py-3 file:px-4">
        <p v-if="filesSize && showFilesSize" class="mt-2 text-sm text-gray-500">
            Размер: {{ filesSize  }} Mb
        </p>
        <p v-if="errorMessage.length" class="mt-2 text-sm text-red-600">
            {{ errorMessage }}
        </p>
    </div>
</template>
