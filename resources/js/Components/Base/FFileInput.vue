<script setup>

import {ref} from "vue";

const model = defineModel();

const props = defineProps({
    errorMessage: Array,
    label: String,
    disables: Boolean,
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

    model.value = files;
}

</script>

<template>
    <div>
        <label>
            {{ label ?? '' }}
            <input type="file" :multiple="multiple" @input="uploadFilesHandler">
        </label>

        <small v-if="filesSize && showFilesSize">Size: {{ filesSize }} Kb</small>
        <small v-if="errorMessage.length">{{ errorMessage }}</small>
    </div>
</template>
