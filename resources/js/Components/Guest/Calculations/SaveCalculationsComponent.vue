<script setup>
import {useForm, usePage} from '@inertiajs/vue3';
import FTextInput from "@/Components/Base/FTextInput.vue";
import RDialog from "@/Components/Base/RDialog.vue";
import {DialogClose} from 'radix-vue';
import {computed, ref} from "vue";
import {useUrlWatcher} from "@/Composables/useUrlWatcher.js";

const {id} = defineProps({
    id: Number
})

const {url} = useUrlWatcher();
const user = computed(() => usePage().props.auth.user);

const input = computed(() => new URLSearchParams(new URL(url.value).search).get('input'));
const title = computed(() => decodeURIComponent(JSON.parse(atob(input.value)).title));

const open = ref(false);

const form = useForm({
    title: null,
    calculator_id: null,
    input: null
});

const onOpen = () => {
    form.title = title.value
    form.calculator_id = id
    form.input = input.value
    form.clearErrors()
}

function handleClick() {
    form.post('/calculators', {
        preserveScroll: true,
        preserveState: true,
        onSuccess: () => {
            open.value = false
        }, onError: () => {

        }
    })
}
</script>
<template>
    <RDialog title="Сохранить расчет" :width="420" v-if="user && input" v-model="open">
        <template v-slot:trigger>
            <button @click="onOpen" type="button"
                    class="flex items-center text-sm gap-2 text-gray-500 hover:text-gray-800">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                     class="h-4 w-4">
                    <path
                        d="M15.2 3a2 2 0 0 1 1.4.6l3.8 3.8a2 2 0 0 1 .6 1.4V19a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2z"/>
                    <path d="M17 21v-7a1 1 0 0 0-1-1H8a1 1 0 0 0-1 1v7"/>
                    <path d="M7 3v4a1 1 0 0 0 1 1h7"/>
                </svg>
                Сохранить расчет
            </button>
        </template>
        <template v-slot:body>
            <form class="space-y-4">
                <FTextInput v-model="form.title" label="Название расчета" id="title"
                            :error-message="form.errors.title"/>
            </form>
        </template>
        <template v-slot:footer>
            <button @click.prevent="handleClick" :disabled="form.processing"
                    class="py-2 px-3 font-semibold text-sm text-white bg-primary-500 rounded-lg hover:bg-primary-600 active:bg-primary-700 disabled:opacity-50 disabled:pointer-events-none flex items-center justify-center gap-x-2">
                Сохранить
            </button>
        </template>
    </RDialog>
</template>
