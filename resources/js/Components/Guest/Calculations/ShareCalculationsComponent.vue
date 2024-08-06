<script setup>
    import { Link, useForm } from '@inertiajs/vue3';
    import FTextInput from "@/Components/Base/FTextInput.vue";
    import RDialog from "@/Components/Base/RDialog.vue";
    import {useUrlWatcher} from "@/Composables/useUrlWatcher.js";

    import { SwitchRoot, SwitchThumb } from 'radix-vue'
    import { ref } from 'vue'

    const switchState = ref(false)

    const {url} = useUrlWatcher();

    const form = useForm({
        title: ''
    });

    const copyText = () => {
        alert("Copied text " + url.value);
    }

</script>
<template>
    <RDialog title="Поделиться" :width="420">
        <template v-slot:trigger>
            <button type="button" class="flex items-center text-sm gap-2 text-gray-500 hover:text-gray-800">
                <svg class="h-4" fill="none" stroke="currentColor" stroke-linecap="round"
                    stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path d="M6 15a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"></path>
                    <path d="M16.5 21.75a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"></path>
                    <path d="M16.5 8.25a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"></path>
                    <path d="M13.978 6.871 8.52 10.377"></path>
                    <path d="m8.521 13.621 5.457 3.506"></path>
                </svg>
                Поделиться
            </button>
        </template>
        <template v-slot:body>
            <div class="flex items-center gap-2">
                <FTextInput v-model="url" class="w-full" />
                <button type="button" @click="copyText"
                    class="py-3 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none">
                    Копировать
                </button>
            </div>
            <div class="flex gap-2 items-center mt-2">
                <SwitchRoot
                    id="airplane-mode"
                    v-model:checked="switchState"
                    class="w-[34px] h-[18px] focus-within:!outline-none focus-within:outline-black flex bg-black/30 shadow-sm rounded-full relative data-[state=checked]:bg-primary-500 cursor-default"
                >
                    <SwitchThumb
                        class="block w-[14px] h-[14px] my-auto bg-white shadow-sm rounded-full transition-transform duration-100 translate-x-0.5 will-change-transform data-[state=checked]:translate-x-[18px]"
                    />
                </SwitchRoot>
                <label class="text-[15px] leading-none pr-[15px] select-none" for="airplane-mode">
                    {{ switchState ? 'Поделиться расчетом' : 'Не делиться расчетом' }}
                </label>
            </div>
            <div class="flex items-center justify-start mt-6">
                <button type="button" @click="copyText"
                    class="py-2 px-2 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none">
                    <svg class="size-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/></svg>
                </button>
            </div>
            <!-- {{ url }} -->
        </template>

    </RDialog>
</template>
