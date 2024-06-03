<script setup>

import Layout from "@/Layouts/Admin.vue";
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
        <title>{{ faq ? 'Edit' : 'Create' }} FAQ</title>
    </Head>

    <form @submit.prevent="saveFaq">
        <FTextInput
            label="Question"
            v-model="form.question"
            :error-message="form.errors.question"
        />

        <FTextArea
            label="Answer"
            v-model="form.answer"
            :error-message="form.errors.answer"
        />

        <button type="submit">{{ faq ? 'Update' : 'Create' }}</button>
    </form>

    <Link href="/admin/faq">Return to index</Link>
</template>
