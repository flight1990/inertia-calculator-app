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

    <div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden">
        <div class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-b border-gray-200">
            <div>
                <h2 class="text-lg sm:text-xl font-semibold text-gray-800">
                    {{ item ? 'Редактировать' : 'Создать' }} пункт меню {{ form.title ? '"'+form.title+'"' : '' }}
                </h2>
            </div>
        </div>
        <div class="px-6 py-4 border-b border-gray-200">
            <div v-for="(setting, index) in settings.data" :key="setting.key" class="flex flex-col gap-y-3.5">
                <FTextArea class="mb-3.5"
                    v-if="setting.key === 'hero_description' || setting.key === 'ads_code'"
                    :label="setting.name"
                    v-model="form[index].value"
                />
                <FTextInput
                    v-else class="mb-3.5"
                    :label="setting.name"
                    v-model="form[index].value"
                />
            </div>
        </div>
        <div class="px-6 py-4 flex items-center gap-x-2">
            <button @click.prevent="updateSettings" :disabled="form.processing" type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-primary-600 text-white hover:bg-primary-700 disabled:opacity-50 disabled:pointer-events-none">
                Сохранить
            </button>
        </div>
    </div>
</template>
