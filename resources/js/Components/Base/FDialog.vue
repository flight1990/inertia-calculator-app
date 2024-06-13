<script setup>

    import { defineModel } from "vue";

    const props = defineProps({
        title: String,
        width: {
            type: Number,
            default: 650,
        }
    });

    const dialog = defineModel('dialog', { default: false });

    const emit = defineEmits(['dialog:opened', 'dialog:closed']);

    const openDialog = () => {
        dialog.value = true;
        emit('dialog:opened');
        document.querySelector('body').classList.add('overflow-hidden');
    }

    const closeDialog = () => {
        dialog.value = false;
        emit('dialog:closed');
        document.querySelector('body').classList.remove('overflow-hidden');
    }

</script>

<template>
    <slot name="button" :openDialog="openDialog">
        <button @click.prevent="openDialog">Open Dialog</button>
    </slot>

  
    <teleport to="body" v-if="dialog">
        <div class="animate-backdropIn fixed inset-0 bg-black/50 backdrop-blur-sm z-[20]" @click.self="closeDialog"></div>
        <div class="animate-dialogIn fixed top-[50%] left-[50%] max-h-[90%] w-[90%] max-w-[480px] translate-x-[-50%] translate-y-[-50%] rounded-xl bg-white border shadow-sm focus:outline-none flex flex-col z-[30]">
            <slot name="title">
                <div class="flex justify-between items-center py-3 px-4 border-b">
                    <h2 class="text-xl font-semibold text-gray-700">
                        {{ title }}
                    </h2>
                    <button @click.prevent="closeDialog" type="button"
                        class="flex justify-center items-center size-9 text-sm font-semibold rounded-lg border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none">
                        <span class="sr-only">Close</span>
                        <svg class="flex-shrink-0 size-5" xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M18 6 6 18"></path>
                            <path d="m6 6 12 12"></path>
                        </svg>
                    </button>
                </div>
            </slot>
            <div
                class="p-4 overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300">
                <slot name="default" :closeDialog="closeDialog"></slot>
            </div>
            <div class="py-3 px-4 border-t flex items-center justify-end gap-x-4">
                <button @click.prevent="closeDialog" type="button"
                    class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none">
                    Отмена
                </button>
                <slot name="actions" :closeDialog="closeDialog"></slot>
            </div>
        </div>
    </teleport>
</template>
