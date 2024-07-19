<script setup>
    import {Link} from "@inertiajs/vue3";
    import ROfcanvas from "@/Components/Base/ROfcanvas.vue";
    import {DialogClose} from 'radix-vue';
    import {usePage} from "@inertiajs/vue3";
    import {computed} from "vue";

    const page = usePage();
    const menu = computed(() => page.props.menu);
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
            <ul class="space-y-1.5">
                <li v-for="item in menu.data" :key="item.id">
                    <DialogClose as-child>
                        <Link :href="item.url" class="w-full flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-neutral-700 rounded-lg hover:bg-gray-100"
                            :class="{'bg-gray-100' : item.isActive}">
                            {{ item.name }}
                        </Link>
                    </DialogClose>
                </li>
            </ul>
        </template>
    </ROfcanvas>
</template>