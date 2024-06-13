<script setup>

import {Head, useForm, usePage} from "@inertiajs/vue3";
import Category from "@/Components/Categories/CategoryComponent.vue";
import SendEmailComponent from "@/Components/Mails/SendEmailComponent.vue";

import BreadcrumbsComponent from "@/Components/Components/Guest/Breadcrumbs/BreadcrumbsComponent.vue";
import AdComponent from "@/Components/Components/Guest/Ad/AdComponent.vue";

import Layout from "@/Layouts/Guest.vue";
import {computed, onMounted} from "vue";

const user = computed(() => usePage().props.auth.user);

const props = defineProps({
    calculator: Object,
    category: Object,
    metta_seo: Object
});

defineOptions({
    layout: Layout
})

const form = useForm({});

const addToFavorites = () => {
    form.post(`/favorites/${props.calculator.id}`, {
        preserveScroll: true
    });
}

const removeFromFavorites = () => {
    form.delete(`/favorites/${props.calculator.id}`, {
        preserveScroll: true
    });
}

const toggleFavorite = () => {
    props.calculator.is_favorite ? removeFromFavorites() : addToFavorites();
}

onMounted(() => {
    import(props.calculator.script).then((script) => {
        script.showCalculator(props.calculator.uuid);
    }).catch(err =>
        console.error('Error while loading the JS Module', err)
    );
})

</script>

<template>

    <Head>
        <title>{{ calculator.name }}</title>

        <meta name="description" :content="metta_seo.description">
        <meta name="keywords" :content="metta_seo.keywords">
        <meta name="title" :content="metta_seo.title">
    </Head>


    <section class="pt-10 pb-20">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <BreadcrumbsComponent/>
            <div class="mt-4">
                <h2 class="text-2xl font-medium tracking-tight text-gray-700">
                    {{ calculator.name }}
                </h2>
            </div>
            <div class="flex flex-col lg:flex-row gap-10 mt-10">
                <main class="flex-1">
                    <section id="calculator">
                        <div id="calculator-container" class="w-full h-96 bg-white rounded-lg border  shadow-sm">

                        </div>
                        <div class="flex flex-col sm:flex-row items-end justify-end gap-y-2 gap-x-6 mt-4">
                            <a class="flex items-center text-sm gap-2 text-gray-500 hover:text-gray-800" href="#">
                                <svg class="h-4" fill="none" stroke="currentColor" stroke-linecap="round"
                                     stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="m12.412 17.876 4.725 3c.61.385 1.36-.187 1.181-.89l-1.368-5.382a.815.815 0 0 1 .272-.825l4.237-3.534c.553-.46.272-1.388-.45-1.434l-5.531-.357a.779.779 0 0 1-.684-.506L12.73 2.754a.778.778 0 0 0-1.463 0l-2.06 5.194a.778.778 0 0 1-.684.506l-5.532.357c-.722.046-1.003.975-.45 1.434l4.238 3.534a.816.816 0 0 1 .272.825l-1.266 4.988c-.215.844.684 1.528 1.406 1.069l4.397-2.785a.768.768 0 0 1 .825 0v0Z"></path>
                                </svg>
                                В избранное
                            </a>
                            <a class="flex items-center text-sm gap-2 text-gray-500 hover:text-gray-800" href="#">
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
                            </a>
                        </div>
                    </section>

                    <AdComponent class="mt-10"/>

                    <section id="description">
                        <article class="mt-10" v-html="calculator.description"></article>
                    </section>
                </main>

                <aside class="lg:w-[300px] flex-none space-y-10">
                    <AdComponent/>

                    <section>
                        <div class="rounded-lg border bg-white shadow-sm">
                            <div class="border-b px-4 py-2">
                                <h4 class="font-semibold text-gray-700 flex items-center gap-3.5">
                                    <svg class="w-5 h-5 flex-none text-primary-500" fill="none" stroke="currentColor"
                                         stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                         viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M3 4.5A1.5 1.5 0 0 1 4.5 3h12.64L21 6.603V19.5a1.5 1.5 0 0 1-1.5 1.5h-15A1.5 1.5 0 0 1 3 19.5v-15Z"></path>
                                        <path
                                            d="M12.004 3 12 6.692c0 .17-.224.308-.5.308h-4c-.276 0-.5-.138-.5-.308V3h5.004Z"></path>
                                        <path d="M4.5 3h12.64"></path>
                                        <path d="M7 13h10"></path>
                                        <path d="M7 17h5.004"></path>
                                    </svg>
                                    Сохраненные расчеты
                                </h4>
                            </div>
                            <div class="p-4">
                                <p class="text-sm text-gray-500 mb-4">
                                    Вы можете сохранять ваши расчеты и они будут отображаться здесь.
                                </p>
                                <ul class="space-y-1.5">
                                    <li>
                                        <a class="flex py-2 px-2.5 text-sm text-gray-700 rounded-lg hover:bg-gray-100 focus:bg-gray-200"
                                           href="#">
                                            Имя сохраненного расчета 1
                                        </a>
                                    </li>
                                    <li>
                                        <a class="flex py-2 px-2.5 text-sm text-gray-700 rounded-lg hover:bg-gray-100 focus:bg-gray-200"
                                           href="#">
                                            Другой расчет
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </section>
                    <section>
                        <div class="rounded-lg border bg-white shadow-sm">
                            <div class="border-b px-4 py-2">
                                <h4 class="font-semibold text-gray-700 flex items-center gap-3.5">
                                    <svg class="w-5 h-5 text-primary-500" fill="none" stroke="currentColor"
                                         stroke-linecap="round" stroke-width="2" viewBox="0 0 24 24"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M3.95 2.5c1.419 1.51 2.128 3.47 2.128 5.882C6.078 12 3 14.77 2.484 16.75 2.142 18.07 1.98 19.654 2 21.5"></path>
                                        <path
                                            d="M19.628 2.5C18.209 4.01 17.5 5.97 17.5 8.382c0 3.618 3.078 6.387 3.593 8.368.344 1.32.505 2.904.485 4.75"></path>
                                        <path
                                            d="M3.122 15.418c3.263 2.065 6.225 3.097 8.889 3.097 2.663 0 5.479-1.032 8.449-3.097"></path>
                                        <path fill="currentColor" stroke="none"
                                              d="M12 15.5a1.25 1.25 0 1 0 0-2.5 1.25 1.25 0 0 0 0 2.5Z"></path>
                                    </svg>
                                    Калькуляторы для здоровья
                                </h4>
                            </div>
                            <div class="p-4">
                                <ul class="space-y-1.5">
                                    <li>
                                        <a class="flex py-2 px-2.5 text-sm text-gray-700 rounded-lg hover:bg-gray-100 focus:bg-gray-200"
                                           href="#">
                                            Калькулятор ИМТ
                                        </a>
                                    </li>
                                    <li>
                                        <span
                                            class="flex py-2 px-2.5 text-sm text-gray-700 rounded-lg bg-gray-100 cursor-default select-none">
                                            Калькулятор веса
                                        </span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </section>
                </aside>

            </div>
        </div>
    </section>


    <button @click.prevent="toggleFavorite" :disabled="form.processing" v-if="user">
        Favorite {{ calculator.is_favorite }}
    </button>


    <SendEmailComponent
        title="Error message"
        subject="Error message"
        :send-url="true"
    />

    <Category
        :category="category"
    />
</template>
