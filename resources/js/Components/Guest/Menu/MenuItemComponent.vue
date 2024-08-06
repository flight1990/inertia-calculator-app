<script setup>
    import { Link } from "@inertiajs/vue3";
    import { DialogClose } from 'radix-vue';
    import { AccordionRoot, AccordionItem, AccordionTrigger, AccordionContent } from 'radix-vue';
    import MenuItemComponent from "@/Components/Guest/Menu/MenuItemComponent.vue";

    const props = defineProps({
        menu: Array
    })

</script>
<template>
    <template v-for="item in menu" :key="item.id">

        <AccordionItem v-if="item.children.length" :value="item.id">
            
            <div v-if="item.url" class="flex items-center justify-between gap-2">
 
                <div v-if="item.isActive" class="w-full text-start flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-700 rounded-lg hover:bg-gray-100 data-[state=open]:bg-gray-100 select-none">
                    {{ item.name }}
                </div>

                <DialogClose v-else as-child>
                    <Link class="w-full text-start flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-700 rounded-lg hover:bg-gray-100 data-[state=open]:bg-gray-100"
                        :href="item.url">
                        {{ item.name }}
                    </Link>
                </DialogClose>

                <AccordionTrigger class="py-2.5 px-2.5 text-sm text-gray-700 rounded-lg hover:bg-gray-100 data-[state=open]:bg-gray-100 group">
                    <svg class="group-data-[state=open]:rotate-180 ms-auto block size-4 text-gray-600 group-hover:text-gray-500 transition"
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path d="m6 9 6 6 6-6" />
                    </svg>
                </AccordionTrigger>
            </div>

            <template v-else>
                <AccordionTrigger
                class="w-full group text-start flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-700 rounded-lg hover:bg-gray-100 data-[state=open]:bg-gray-100">
                <div class="flex items-center gap-x-3.5">
                    <div v-html="item.icon"></div>
                    {{ item.name }}
                </div>
                <svg class="group-data-[state=open]:rotate-180 ms-auto block size-4 text-gray-600 group-hover:text-gray-500 transition"
                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round">
                    <path d="m6 9 6 6 6-6" />
                </svg>
            </AccordionTrigger>
            
            </template>


            <AccordionContent
                class="data-[state=open]:animate-slideDown data-[state=closed]:animate-slideUp overflow-hidden pt-1.5 pl-4">
                <MenuItemComponent :menu="item.children" />
            </AccordionContent>

            
            
        </AccordionItem>


        <div v-else-if="item.isActive" class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-700 rounded-lg hover:bg-gray-100 select-none">
            {{ item.name }}
        </div>

        <DialogClose as-child v-else-if="item.url">
            <Link v-if="!item.isActive"
                class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-700 rounded-lg hover:bg-gray-100"
                :href="item.url">
                {{ item.name }}
            </Link>
        </DialogClose>
        




    </template>
</template>