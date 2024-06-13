<script setup>

    import { defineModel } from "vue";

    const props = defineProps({
        title: String,
        width: {
            type: Number,
            default: 650,
        }
    });

    const ofcanvas = defineModel('ofcanvas', { default: false });

    const emit = defineEmits(['ofcanvas:opened', 'ofcanvas:closed']);

    const openOfcanvas = () => {
        ofcanvas.value = true;
        emit('ofcanvas:opened');
        document.querySelector('body').classList.add('overflow-hidden');
    }

    const closeOfcanvas = () => {
        ofcanvas.value = false;
        emit('ofcanvas:closed');
        document.querySelector('body').classList.remove('overflow-hidden');
    }

</script>

<template>
    <slot name="button" :openOfcanvas="openOfcanvas">
        <button @click.prevent="openOfcanvas">Open Ofcanvas</button>
    </slot>

    <teleport to="body" v-if="ofcanvas">
        <div class="animate-backdropIn fixed inset-0 bg-black/50 backdrop-blur-sm z-[20]" @click.self="closeOfcanvas"></div>
        <div class="animate-ofcanvasIn fixed top-0 right-0 h-screen w-full max-w-[360px] bg-white border-l focus:outline-none flex flex-col z-[30]">
            <slot name="title">
                <div class="flex-none h-16 flex justify-between items-center px-4 border-b">
                    <h2 class="text-xl font-semibold text-gray-700">
                        {{ title }}
                    </h2>
                    <button @click.prevent="closeOfcanvas" type="button"
                        class="flex justify-center items-center size-9 text-sm font-semibold rounded-lg border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none">
                        <span class="sr-only">Close</span>
                        <svg class="flex-shrink-0 size-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path d="M18 6 6 18"></path>
                            <path d="m6 6 12 12"></path>
                        </svg>
                    </button>
                </div>
            </slot>
            <div
                class="p-4 overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300">
                <slot name="default" :closeOfcanvas="closeOfcanvas"></slot>
            </div>
        </div>
    </teleport>
</template>
