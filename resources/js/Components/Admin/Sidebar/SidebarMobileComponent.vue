<script setup>
    import MenuComponent from "@/Components/Admin/Menu/MenuComponent.vue";

    import ROfcanvas from "@/Components/Base/ROfcanvas.vue";
    import {DialogClose} from 'radix-vue';
</script>
<template>
    <ROfcanvas title="Меню" :width="320" side="left">
        <template v-slot:trigger>
            <button @click="openDrawerHandler" type="button" class="flex justify-center items-center size-9 text-sm font-semibold rounded-lg border border-transparent text-gray-800 hover:bg-gray-100 active:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none">
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="24"
                        height="24"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        class="flex-shrink-0 size-5"
                    >
                        <line
                            x1="3"
                            x2="21"
                            y1="6"
                            y2="6"
                        />
                        <line
                            x1="3"
                            x2="21"
                            y1="12"
                            y2="12"
                        />
                        <line
                            x1="3"
                            x2="21"
                            y1="18"
                            y2="18"
                        />
                    </svg>
                </button>
        </template>
        <template v-slot:body>
            <MenuComponent />
        </template>
    </ROfcanvas>
</template>