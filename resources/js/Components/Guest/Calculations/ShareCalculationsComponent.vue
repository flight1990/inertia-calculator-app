<script setup>
    import { Link, useForm } from '@inertiajs/vue3';
    import FTextInput from "@/Components/Base/FTextInput.vue";
    import RDialog from "@/Components/Base/RDialog.vue";
    import {useUrlWatcher} from "@/Composables/useUrlWatcher.js";

    const {url} = useUrlWatcher();

    const form = useForm({
        title: ''
    });

    function handleClick() {
        alert('hello!')
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
            {{ url }}
        </template>

    </RDialog>
</template>
