<script setup>
import {Link} from "@inertiajs/vue3";
import ROfcanvas from "@/Components/Base/ROfcanvas.vue";
import {DialogClose} from 'radix-vue';
import {useLocalStorage} from "@/Composables/useLocalStorage.js";
import {computed, ref} from "vue";
import {useDateTransformer} from "@/Composables/useDateTransformer.js";

const {getItem} = useLocalStorage();
const props = defineProps(['uuid', 'slug', 'name']);
const emit = defineEmits(['opened']);

const currentUrl = computed(() => window.location.href);
const history = ref([]);

const openDrawerHandler = () => {
    history.value = getItem(`history_${props.uuid}`);
}

</script>
<template>
    <ROfcanvas :title="`История расчетов`" :width="360" side="left">
        <template v-slot:trigger>
            <button @click="openDrawerHandler" type="button"
                    class="flex items-center text-sm gap-2 text-gray-500 hover:text-gray-800">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                     class="h-4 w-4">
                    <path d="M3 12a9 9 0 1 0 9-9 9.75 9.75 0 0 0-6.74 2.74L3 8"/>
                    <path d="M3 3v5h5"/>
                    <path d="M12 7v5l4 2"/>
                </svg>
                История расчетов
            </button>
        </template>
        <template v-slot:body>
           

            <div class="w-full text-start font-medium text-gray-700">
                {{ name }}
            </div>
            <ul class="mt-2">
                <li v-for="item in history">
                    <DialogClose as-child>
                        <Link :href="`/${props.slug}?input=${item.data}`"
                            class="flex flex-col py-2 px-2.5 text-sm text-gray-700 rounded-lg hover:bg-gray-100">
                            <div class="text-gray-500">
                                <small>{{ useDateTransformer(item.date, 'DD.MM.YYYY HH:mm') }}</small>
                            </div>
                            <div> {{ item.name }}</div>
                        </Link>
                    </DialogClose>
                </li>
            </ul>
        </template>
    </ROfcanvas>
</template>
