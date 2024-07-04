<script setup>

import Layout from "@/Layouts/Admin/Admin.vue";
import {Head, Link, useForm} from "@inertiajs/vue3";
import FTextInput from "@/Components/Base/FTextInput.vue";
import FTextArea from "@/Components/Base/FTextArea.vue";

defineOptions({
    layout: Layout
});

const props = defineProps({
    faq: Object
});

const form = useForm({
    question: props.faq?.question ?? "",
    answer: props.faq?.answer ?? "",
});

const saveFaq = () => {
    props.faq ? form.patch(`/admin/faq/${props.faq.id}`) : form.post('/admin/faq');
}

</script>

<template>
    <Head>
        <title>{{ faq ? 'Редактировать' : 'Создать' }} FAQ</title>
    </Head>

    <div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden">
        <div class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-b border-gray-200">
            <div>
                <h2 class="text-lg sm:text-xl font-semibold text-gray-800">
                    {{ faq ? 'Редактировать' : 'Создать' }} FAQ
                </h2>
            </div>
        </div>
        <div class="px-6 py-4 border-b border-gray-200">
            <form class="flex flex-col gap-y-3.5">
                <FTextInput
                    label="Вопрос"
                    v-model="form.question"
                    :error-message="form.errors.question"
                />
                <FTextArea
                    label="Ответ"
                    v-model="form.answer"
                    :error-message="form.errors.answer"
                />
            </form>
        </div>
        <div class="px-6 py-4 flex items-center gap-x-2">
            <button @click.prevent="saveFaq" type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-primary-600 text-white hover:bg-primary-700 disabled:opacity-50 disabled:pointer-events-none">
                Сохранить
            </button>
            <Link href="/admin/faq" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none">
                Отмена
            </Link>
        </div>
    </div>
</template>
