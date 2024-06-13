<script setup lang="ts">
    import {
        DialogRoot,
        DialogTrigger,
        DialogPortal,
        DialogOverlay,
        DialogContent,
        DialogTitle,
        DialogClose,
    } from 'radix-vue'

    const props = defineProps({
        title: String,
        side: {
            type: String,
            default: 'left',
        },
        width: {
            type: Number,
            default: 360,
        }
    });
</script>

<template>
    <DialogRoot>
        
        <DialogTrigger as="div">
            <slot name="trigger">
                <button>Open Dialog</button>
            </slot>
        </DialogTrigger>

        <DialogPortal>
            <DialogOverlay class="bg-black/50 backdrop-blur-sm data-[state=open]:animate-overlayShow data-[state=closed]:animate-overlayHide fixed inset-0 z-30" />
            <DialogContent 
                :aria-describedby="undefined"
                :style="{ 'max-width': width + 'px' }"
                :class="{
                    'left-0 data-[state=open]:animate-ofcanvasInLeft data-[state=closed]:animate-ofcanvasOutLeft': side=='left', 
                    'right-0 data-[state=open]:animate-ofcanvasInRight data-[state=closed]:animate-ofcanvasOutRight': side=='right'
                }"
                class="bg-white border-l fixed top-0 h-screen w-full focus:outline-none flex flex-col z-[100] ">
                <slot name="header">
                    <div class="flex-none h-16 flex justify-between items-center px-4 border-b">
                        <DialogTitle as="h2" class="text-xl font-semibold text-gray-700">
                            {{ title }}
                        </DialogTitle>
                        <DialogClose 
                            class="flex justify-center items-center size-9 text-sm font-semibold rounded-lg border border-transparent text-gray-800 hover:bg-gray-100 active:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none">
                            <span class="sr-only">Close</span>
                            <svg class="flex-shrink-0 size-5" xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M18 6 6 18"></path>
                                <path d="m6 6 12 12"></path>
                            </svg>
                        </DialogClose>
                    </div>
                </slot>
                
                <div class="flex-1 p-4 overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300">
                    <slot name="body"></slot>
                </div>
                
            </DialogContent>
        </DialogPortal>
    </DialogRoot>
</template>