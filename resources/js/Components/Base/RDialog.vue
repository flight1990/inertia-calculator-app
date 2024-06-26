<script setup lang="ts">
    import {
        DialogRoot,
        DialogTrigger,
        DialogPortal,
        DialogOverlay,
        DialogContent,
        DialogTitle,
    } from 'radix-vue'
    import {defineEmits, defineModel} from "vue";

    const props = defineProps({
        title: String,
        width: {
            type: Number,
            default: 480,
        }
    });

    const emit = defineEmits(['update:open']);

    const open = defineModel({default: false});
</script>

<template>
    <DialogRoot v-model:open="open">

        <DialogTrigger as="div">
            <slot name="trigger">
                <button @click="open= true">Open Dialog</button>
            </slot>
        </DialogTrigger>

        <DialogPortal>
            <DialogOverlay class="bg-black/50 backdrop-blur-sm data-[state=open]:animate-overlayShow fixed inset-0 z-30" />
            <DialogContent @openAutoFocus.prevent="emit('update:open')"
                :aria-describedby="undefined"
                :style="{ 'max-width': width + 'px' }"
                class="rounded-xl bg-white border shadow-sm data-[state=open]:animate-contentShow fixed top-[50%] left-[50%] max-h-[85vh] w-[90vw] translate-x-[-50%] translate-y-[-50%] focus:outline-none flex flex-col z-[100]">
                <slot name="header">
                    <div class="flex justify-between items-center py-3 px-4 border-b">
                        <DialogTitle as="h2" class="text-xl font-semibold text-gray-700">
                            {{ title }}
                        </DialogTitle>
                        <div @click="open= false"
                            class="flex justify-center items-center size-9 text-sm font-semibold rounded-lg cursor-pointer border border-transparent text-gray-800 hover:bg-gray-100 active:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none">
                            <span class="sr-only">Close</span>
                            <svg class="flex-shrink-0 size-5" xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M18 6 6 18"></path>
                                <path d="m6 6 12 12"></path>
                            </svg>
                        </div>
                    </div>
                </slot>

                <div class="p-4 overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300">
                    <slot name="body"></slot>
                </div>

                <div class="py-3 px-4 border-t flex items-center justify-end gap-x-4">
                    <button type="button" @click="open= false"
                        class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none">
                        Отмена
                    </button>
                    <slot name="footer"></slot>
                </div>

            </DialogContent>
        </DialogPortal>
    </DialogRoot>
</template>
