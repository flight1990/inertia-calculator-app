<script setup>

import Editor from "@tinymce/tinymce-vue";

const baseUrl = import.meta.env.VITE_APP_URL;

const model = defineModel({default: null});

const props = defineProps({
    errorMessage: [Array, String],
});

const filePickerCallback = (cb, value, meta) => {

}

</script>

<template>
    <Editor
        api-key="xcnykoky7wz5aq4opt33o6n7eng7x7vjjt8qnmfpirm62ovi"
        :init="{
            height: 500,
            menubar:false,
            branding: false,
            automatic_uploads: true,
            file_picker_types: 'file',
            relative_urls : false,
            document_base_url: baseUrl,
            plugins: ['wordcount', 'link', 'code', 'fullscreen', 'table', 'lists', 'image'],
            toolbar: ['link image | bold italic underline blockquote | bullist numlist | align | formatselect | table | code fullscreen']
        }"
        v-model="model"
    />

    <p v-if="errorMessage" class="mt-2 text-sm text-red-600">
        {{ errorMessage }}
    </p>
</template>
