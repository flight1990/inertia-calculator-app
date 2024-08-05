<script setup>
    import Editor from '@tinymce/tinymce-vue'
    import Layout from "@/Layouts/Admin/Admin.vue";
    import {Head, Link, useForm} from "@inertiajs/vue3";
    import FTextInput from "@/Components/Base/FTextInput.vue";
    import FTinyEditor from "@/Components/Base/FTinyEditor.vue";
    import FSelect from "@/Components/Base/FSelect.vue";
    import FTextArea from "@/Components/Base/FTextArea.vue";
    import FFileInput from "@/Components/Base/FFileInput.vue"

    defineOptions({
        layout: Layout
    });

    const props = defineProps({
        calculator: Object,
        categories: Object
    });

    const form = useForm({
        name: props.calculator?.name ?? "",
        description: props.calculator?.description ?? "",
        category_id: props.calculator?.category_id ?? "",
        ads_code: props.calculator?.ads_code ?? "",
        frontend: null,
        backend: null,
        _method: props.calculator ? 'PATCH' : 'POST'
    });

    const saveCalculator = () => {
        props.calculator
            ? form.post(`/admin/calculators/${props.calculator.id}`, {
                forceFormData: true
            })
            : form.post('/admin/calculators', {
                forceFormData: true
            });
    }

    const filePickerHandler = (cb, value, meta) => {
        const input = document.createElement('input');
        input.setAttribute('type', 'file');
        input.setAttribute('accept', 'image/*');

        input.addEventListener('change', (e) => {
            const file = e.target.files[0];

            const reader = new FileReader();
            reader.addEventListener('load', () => {

                const id = 'blobid' + (new Date()).getTime();
                const blobCache =  tinymce.activeEditor.editorUpload.blobCache;
                const base64 = reader.result.split(',')[1];
                const blobInfo = blobCache.create(id, file, base64);
                blobCache.add(blobInfo);

                cb(blobInfo.blobUri(), { title: file.name });
            });
            reader.readAsDataURL(file);
        });

        input.click();
    }

</script>

<template>

    <Head>
        <title>{{ calculator ? 'Редактировать' : 'Создать' }} калькулятор</title>
    </Head>

    <div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden">
        <div class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-b border-gray-200">
            <div>
                <h2 class="text-lg sm:text-xl font-semibold text-gray-800">
                    {{ calculator ? 'Редактировать' : 'Создать' }} калькулятор
                </h2>
            </div>
        </div>
        <div class="px-6 py-4 border-b border-gray-200">
            <form class="flex flex-col gap-y-3.5">
                <FSelect
                    label="Категория"
                    :items="categories.data"
                    v-model="form.category_id"
                    :error-message="form.errors.category_id"
                />
                <FTextInput
                    label="Имя"
                    v-model="form.name"
                    :error-message="form.errors.name"
                />
                <FFileInput
                    label="PHP"
                    id="PHP"
                    v-model="form.backend"
                    :multiple="false"
                    :error-message="form.errors.backend"
                />
                <FFileInput
                    label="JS"
                    id="JS"
                    v-model="form.frontend"
                    :multiple="false"
                    :error-message="form.errors.frontend"
                />
                <div>
                    <label
                        class="block text-sm text-gray-700 font-medium mb-2">
                        Описание
                    </label>
                    <FTinyEditor
                        v-model="form.description"
                        :error-message="form.errors.description"
                    />
                </div>
                <FTextArea
                    label="Реклама"
                    v-model="form.ads_code"
                    :error-message="form.errors.ads_code"
                />
            </form>
        </div>
        <div class="px-6 py-4 flex items-center gap-x-2">
            <button @click.prevent="saveCalculator" type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-primary-600 text-white hover:bg-primary-700 disabled:opacity-50 disabled:pointer-events-none">
                Сохранить
            </button>
            <Link href="/admin/calculators" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none">
                Отмена
            </Link>
        </div>
    </div>
</template>
