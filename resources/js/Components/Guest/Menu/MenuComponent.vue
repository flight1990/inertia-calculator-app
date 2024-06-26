<script setup>
    import { Link, usePage } from "@inertiajs/vue3";
    import { computed, onMounted, ref } from "vue";
    import ROfcanvas from "@/Components/Base/ROfcanvas.vue";
    import { DialogClose } from 'radix-vue';
    import { AccordionRoot, AccordionItem, AccordionTrigger, AccordionContent } from 'radix-vue';

    const menu = computed(() => usePage().props.menu.data);
    const favorites = computed(() => usePage().props.auth.favorites);
    const user = computed(() => usePage().props.auth.user);

</script>
<template>
    <ROfcanvas title="Меню" :width="360" side="right">
        <template v-slot:trigger>
            <button
                class="p-2 font-semibold text-sm text-gray-700 bg-white rounded-lg hover:bg-gray-100 active:bg-gray-200 flex items-center gap-x-2">
                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="3" x2="21" y1="6" y2="6" />
                    <line x1="3" x2="21" y1="12" y2="12" />
                    <line x1="3" x2="21" y1="18" y2="18" />
                </svg>
                <span class="hidden sm:block">Меню</span>
            </button>
        </template>
        <template v-slot:body>
            <AccordionRoot class="space-y-1.5" type="single" :collapsible="true">

                <AccordionItem v-if="user && favorites.length" :value="favorites">
                    <AccordionTrigger
                        class="w-full group text-start flex items-center gap-x-3.5 py-2 px-2.5 font-medium text-sm text-gray-700 rounded-lg hover:bg-gray-100 data-[state=open]:bg-gray-100">
                        <div class="flex items-center gap-x-3.5">
                            <svg class="h-5 w-5 text-primary-500" fill="currentColor" stroke="currentColor" stroke-linecap="round"
                                stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="m12.412 17.876 4.725 3c.61.385 1.36-.187 1.181-.89l-1.368-5.382a.815.815 0 0 1 .272-.825l4.237-3.534c.553-.46.272-1.388-.45-1.434l-5.531-.357a.779.779 0 0 1-.684-.506L12.73 2.754a.778.778 0 0 0-1.463 0l-2.06 5.194a.778.778 0 0 1-.684.506l-5.532.357c-.722.046-1.003.975-.45 1.434l4.238 3.534a.816.816 0 0 1 .272.825l-1.266 4.988c-.215.844.684 1.528 1.406 1.069l4.397-2.785a.768.768 0 0 1 .825 0v0Z">
                                </path>
                            </svg>
                            Избранные калькуляторы
                        </div>
                        <svg class="group-data-[state=open]:rotate-180 ms-auto block size-4 text-gray-600 group-hover:text-gray-500 transition"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="m6 9 6 6 6-6" />
                        </svg>
                    </AccordionTrigger>
                    <AccordionContent
                        class="data-[state=open]:animate-slideDown data-[state=closed]:animate-slideUp overflow-hidden">
                        <ul class="pt-2 ps-2">
                            <li v-for="child in favorites" :key="child.id">
                                <DialogClose as-child>
                                    <Link
                                        class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-700 rounded-lg hover:bg-gray-100"
                                        :href="child.slug">
                                    {{ child.name }}
                                    </Link>
                                </DialogClose>
                            </li>
                        </ul>
                    </AccordionContent>
                </AccordionItem>

                <template v-for="item in menu" :key="item.id">
                    <AccordionItem :value="item.nickname">
                        <AccordionTrigger
                            class="w-full group text-start flex items-center gap-x-3.5 py-2 px-2.5 font-medium text-sm text-gray-700 rounded-lg hover:bg-gray-100 data-[state=open]:bg-gray-100">
                            <div class="flex items-center gap-x-3.5">
                                <div v-html="item.icon" class="text-xl group-data-[state=open]:text-primary-500"></div>
                                {{ item.name }}
                            </div>
                            <svg class="group-data-[state=open]:rotate-180 ms-auto block size-4 text-gray-600 group-hover:text-gray-500 transition"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round">
                                <path d="m6 9 6 6 6-6" />
                            </svg>
                        </AccordionTrigger>
                        <AccordionContent
                            class="data-[state=open]:animate-slideDown data-[state=closed]:animate-slideUp overflow-hidden">
                            <ul class="pt-2 ps-2">
                                <li v-for="child in item.children" :key="child.id">
                                    <DialogClose as-child>
                                        <Link
                                            class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-700 rounded-lg hover:bg-gray-100"
                                            :href="child.url">
                                        {{ child.name }}
                                        </Link>
                                    </DialogClose>
                                </li>
                            </ul>
                        </AccordionContent>
                    </AccordionItem>
                </template>

            </AccordionRoot>
        </template>
    </ROfcanvas>

</template>