<script setup>

import {Head} from "@inertiajs/vue3";
import Layout from "@/Layouts/Admin/Admin.vue";
import {reactive, ref} from "vue";

defineOptions({
    layout: Layout
});


const usertotal = ref(0);
const calctotal = ref(0);
const seototal = ref(0);
const categorytotal = ref(0);

const fetchUsers = async () => {
    try {
        const {data} = await axios.get('/api/users');
        usertotal.value = data.meta.total;    
    } catch (e) {

    } 
}
const fetchCalc = async () => {
    try {
        const {data} = await axios.get('/api/calculators');
        calctotal.value = data.meta.total;    
    } catch (e) {

    } 
}
const fetchSeo = async () => {
    try {
        const {data} = await axios.get('/api/seo');
        seototal.value = data.meta.total;    
    } catch (e) {

    } 
}
const fetchCategory = async () => {
    try {
        const {data} = await axios.get('/api/categories');
        categorytotal.value = data.meta.total;    
    } catch (e) {

    } 
}

fetchUsers();
fetchCalc();
fetchSeo();
fetchCategory();

</script>
<template>
    <Head>
        <title>Панель управления</title>
    </Head>

    <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6">

        


        <div class="flex flex-col bg-white border shadow-sm rounded-xl">
            <div class="p-4 md:p-5">
                <div class="flex items-center gap-x-2">
                    <p class="text-xs uppercase tracking-wide text-gray-500">
                        Пользователи
                    </p>
                </div>
                <div class="mt-1 flex items-center gap-x-2">
                    <h3 class="text-xl sm:text-2xl font-medium text-gray-800">
                        {{usertotal}}
                    </h3>
                </div>
            </div>
        </div>
        <div class="flex flex-col bg-white border shadow-sm rounded-xl">
            <div class="p-4 md:p-5">
                <div class="flex items-center gap-x-2">
                    <p class="text-xs uppercase tracking-wide text-gray-500">
                        Калькуляторы
                    </p>
                </div>
                <div class="mt-1 flex items-center gap-x-2">
                    <h3 class="text-xl sm:text-2xl font-medium text-gray-800">
                        {{calctotal}}
                    </h3>
                </div>
            </div>
        </div>
        <div class="flex flex-col bg-white border shadow-sm rounded-xl">
            <div class="p-4 md:p-5">
                <div class="flex items-center gap-x-2">
                    <p class="text-xs uppercase tracking-wide text-gray-500">
                        Faq's
                    </p>
                </div>
                <div class="mt-1 flex items-center gap-x-2">
                    <h3 class="text-xl sm:text-2xl font-medium text-gray-800">
                        {{seototal}}
                    </h3>
                </div>
            </div>
        </div>
        <div class="flex flex-col bg-white border shadow-sm rounded-xl">
            <div class="p-4 md:p-5">
                <div class="flex items-center gap-x-2">
                    <p class="text-xs uppercase tracking-wide text-gray-500">
                        Категории
                    </p>
                </div>
                <div class="mt-1 flex items-center gap-x-2">
                    <h3 class="text-xl sm:text-2xl font-medium text-gray-800">
                        {{categorytotal}}
                    </h3>
                </div>
            </div>
        </div>
    </div>
</template>
