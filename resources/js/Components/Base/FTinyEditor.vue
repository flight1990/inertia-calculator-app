<script setup>

import Editor from "@tinymce/tinymce-vue";

const baseUrl = import.meta.env.VITE_APP_URL;
const model = defineModel({default: null});

const props = defineProps({
    errorMessage: [Array, String],
});

const filePickerCallback = (cb, value, meta) => {
    const input = document.createElement('input');

    input.setAttribute('type', 'file');
    input.setAttribute('accept', '.txt, application/pdf');

    input.onchange = function () {
        let file = this.files[0];
        let reader = new FileReader();
        let fd = new FormData();

        fd.append("file", file);

        let filename = "";

        let xhr = new XMLHttpRequest();
        xhr.open("POST", "/admin/upload/file", false);

        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                let response = JSON.parse(xhr.responseText);
                filename = response.location;
            }
        };

        xhr.send(fd);

        reader.onload = function (e) {
            cb(filename, {title: file.name, text: file.name});
        };

        reader.readAsDataURL(file);
    }
    input.click();
}

</script>

<template>
    <Editor
        api-key="xcnykoky7wz5aq4opt33o6n7eng7x7vjjt8qnmfpirm62ovi"
        :init="{
            language: 'ru',
            language_url: '/langs/ru.js',
            height: 500,
            menubar:false,
            branding: false,
            automatic_uploads: true,
            images_upload_url : '/admin/upload/image',
            file_picker_callback: filePickerCallback,
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
