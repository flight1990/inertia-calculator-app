<script setup>

import {defineModel} from "vue";

const props = defineProps({
    title: String,
    width: {
        type: Number,
        default: 650
    }
});

const dialog = defineModel('dialog', {default: false});

const emit = defineEmits(['dialog:opened', 'dialog:closed']);

const openDialog = () => {
    dialog.value = true;
    emit('dialog:opened');
}

const closeDialog = () => {
    dialog.value = false;
    emit('dialog:closed');
}

</script>

<template>
    <slot name="button" :openDialog="openDialog">
        <button @click.prevent="openDialog">Open Dialog</button>
    </slot>

    <div v-if="dialog">
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity z-[50]" >
            <div class="w-full h-full flex items-center justify-center" @click.self="closeDialog">
                <div :class="'max-w-['+width+'px]'" class=" w-full bg-white border rounded-lg z-[99]">
                    <slot name="title">
                        <div class="border-b p-4">
                            {{ title }}
                        </div>
                    </slot>
                    <div class="p-4">
                        <slot name="default" :closeDialog="closeDialog"></slot>
                    </div>
                    <div class="border-t p-4">
                        <button @click.prevent="closeDialog">CLOSE</button>
                        <slot name="actions" :closeDialog="closeDialog"></slot>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
