<script setup>

import Layout from "@/Layouts/Admin/Admin.vue";
import {Head, Link, useForm} from "@inertiajs/vue3";
import FTextInput from "@/Components/Base/FTextInput.vue";
import FTextArea from "@/Components/Base/FTextArea.vue";
import FCheckBox from "@/Components/Base/FCheckBox.vue";

defineOptions({
    layout: Layout
});

const props = defineProps({
    seo: Object
});

const form = useForm({
    url: props.seo?.url ?? "",
    h1: props.seo?.h1 ?? "",
    title: props.seo?.title ?? "",
    description: props.seo?.description ?? "",
    keywords: props.seo?.keywords ?? "",
    index: props.seo?.index ?? false,
    follow: props.seo?.follow ?? false,
});

const saveSeo = () => {
    props.seo ? form.patch(`/admin/seo/${props.seo.id}`) : form.post('/admin/seo');
}

</script>

<template>
    <Head>
        <title>{{ seo ? 'Редактировать' : 'Создать' }} seo</title>
    </Head>

    <div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden">
        <div class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-b border-gray-200">
            <div>
                <h2 class="text-lg sm:text-xl font-semibold text-gray-800">
                    {{ seo ? 'Редактировать' : 'Создать' }} seo
                </h2>
            </div>
        </div>
        <div class="px-6 py-4 border-b border-gray-200">
            <form class="flex flex-col gap-y-3.5">
                <FTextInput
                    label="URL"
                    v-model="form.url"
                    :error-message="form.errors.url"
                />
                <FTextInput
                    label="H1"
                    v-model="form.h1"
                    :error-message="form.errors.h1"
                />
                <FTextInput
                    label="Title"
                    v-model="form.title"
                    :error-message="form.errors.title"
                />
                <FTextInput
                    label="Description"
                    v-model="form.description"
                    :error-message="form.errors.description"
                />
                <FTextInput
                    label="Keywords"
                    v-model="form.keywords"
                    :error-message="form.errors.keywords"
                />
                <FCheckBox
                    label="Index"
                    v-model="form.index"
                    :error-message="form.errors.index"
                />
                <FCheckBox
                    label="Follow"
                    v-model="form.follow"
                    :error-message="form.errors.follow"
                />
            </form>
        </div>
        <div class="px-6 py-4 flex items-center gap-x-2">
            <button @click.prevent="saveSeo" type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-primary-600 text-white hover:bg-primary-700 disabled:opacity-50 disabled:pointer-events-none">
                Сохранить
            </button>
            <Link href="/admin/seo" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none">
                Отмена
            </Link>
        </div>
    </div>
</template>
