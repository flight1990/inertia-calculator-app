<script setup>

import Layout from "@/Layouts/Admin/Admin.vue";
import {Head, useForm} from "@inertiajs/vue3";
import FTextInput from "@/Components/Base/FTextInput.vue";
import FTextArea from "@/Components/Base/FTextArea.vue";

defineOptions({
    layout: Layout
})

const props = defineProps({
    settings: Object
})

const form = useForm({
    ...props.settings.data
})

const updateSettings = () => {
    form.patch(`/admin/settings`);
}

</script>

<template>
    <Head>
        <title>Настройки сайта</title>
    </Head>

    <div v-for="(setting, index) in settings.data" :key="setting.key">
        <FTextArea
            v-if="setting.key === 'hero_description' || setting.key === 'ads_code'"
            :label="setting.name"
            v-model="form[index].value"
        />

        <FTextInput
            v-else
            :label="setting.name"
            v-model="form[index].value"
        />
    </div>

    <button @click.prevent="updateSettings" :disabled="form.processing">Сохранить</button>
</template>
