<script setup>
    import { Link } from "@inertiajs/vue3";
    import RDialog from "@/Components/Base/RDialog.vue";
    import draggable from "vuedraggable";

    import Nested from "@/Pages/Admin/Menus/infra/Nested.vue";

    const props = defineProps({
        tasks: Array,
    })

    const rebuildTree = () => {
        axios.post('/admin/menus/rebuild', {menu: props.tasks})
        console.log('rebuild');
    }

</script>

<template>
    <draggable
        class="border rounded-t-xl border-t-0 border-dashed"
        tag="ul"
        :list="tasks"
        :group="{ name: 'g1' }"
        item-key="title"
        handle=".handle"
        animation="500"
        ghost-class="ghost"
        @sort="rebuildTree()"
        >

        <template #item="{element}">
            <li>
                <div class="bg-gray-100 py-2 px-4 rounded-xl border flex items-center justify-between">
                    <div class="flex items-center gap-4">
                        <div class="cursor-grab text-gray-400 active:text-primary-500 active:cursor-grabbing handle">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-grip-vertical"><circle cx="9" cy="12" r="1"/><circle cx="9" cy="5" r="1"/><circle cx="9" cy="19" r="1"/><circle cx="15" cy="12" r="1"/><circle cx="15" cy="5" r="1"/><circle cx="15" cy="19" r="1"/></svg>
                        </div>
                        <div>
                            <h4 class="font-medium"> {{ element.title }} </h4>
                            <div class="text-xs text-gray-500">{{ element.url }}</div>
                        </div>
                    </div>
                    <div class="flex items-center gap-2">
                        <Link :href="`/admin/menus/${element.id}/edit`"
                            class="py-1.5 px-1.5 inline-flex text-sm font-medium rounded-lg border border-amber-200 bg-amber-100 text-amber-800 shadow-sm hover:bg-amber-200 disabled:opacity-50 disabled:pointer-events-none">
                            <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path
                                    d="M21.174 6.812a1 1 0 0 0-3.986-3.987L3.842 16.174a2 2 0 0 0-.5.83l-1.321 4.352a.5.5 0 0 0 .623.622l4.353-1.32a2 2 0 0 0 .83-.497z"/>
                                <path d="m15 5 4 4"/>
                            </svg>
                        </Link>
                        <RDialog title="Внимание!" :width="420">
                            <template v-slot:trigger>
                                <button type="button"
                                        class="py-1.5 px-1.5 inline-flex text-sm font-medium rounded-lg border border-rose-200 bg-rose-100 text-rose-800 shadow-sm hover:bg-rose-200 disabled:opacity-50 disabled:pointer-events-none">
                                    <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                                        height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M3 6h18"/>
                                        <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"/>
                                        <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"/>
                                        <line x1="10" x2="10" y1="11" y2="17"/>
                                        <line x1="14" x2="14" y1="11" y2="17"/>
                                    </svg>
                                </button>
                            </template>
                            <template v-slot:body>
                                Вы действительно хотите удалить <strong>"{{ element.title }}"</strong>?
                            </template>
                            <template v-slot:footer>
                                <Link :href="`/admin/menus/${element.id}`" method="DELETE" as="button"
                                        class="py-2 px-3 inline-flex text-sm font-medium rounded-lg border border-rose-200 bg-rose-100 text-rose-800 shadow-sm hover:bg-rose-200 disabled:opacity-50 disabled:pointer-events-none">
                                    Удалить
                                </Link>
                            </template>
                        </RDialog>
                    </div>
                </div>
                <div class="h-10 "> </div>
                <Nested :tasks="element.children" class="ml-10" />
            </li>
        </template>
    </draggable>
</template>
