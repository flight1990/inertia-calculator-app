<script setup>
    import { Head, useForm, usePage } from "@inertiajs/vue3";
    import { computed } from "vue";

    import Layout from "@/Layouts/Guest/Guest.vue";

    import BreadcrumbsComponent from "@/Components/Guest/Breadcrumbs/BreadcrumbsComponent.vue";
    import SupportComponent from "@/Components/Guest/Support/SupportComponent.vue";
    import AdComponent from "@/Components/Guest/Ad/AdComponent.vue";
    import CategoryComponent from "@/Components/Guest/Category/CategoryComponent.vue";

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

</script>
<template>
    <Head>
        <title>{{ calculator.name }}</title>
        <meta name="description" :content="metta_seo.description">
        <meta name="keywords" :content="metta_seo.keywords">
        <meta name="title" :content="metta_seo.title">
    </Head>

    <section class="pt-8 pb-20">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <BreadcrumbsComponent :title="calculator.name" :category="category.name" />
            <div class="mt-2">
                <h2 class="text-2xl font-medium tracking-tight text-gray-700">
                    {{ calculator.name }}
                </h2>
            </div>
            <div class="flex flex-col lg:flex-row gap-10 mt-4">
                <main class="flex-1">

                    <section id="calculator">
                        <div class="w-full h-96 bg-white rounded-lg border  shadow-sm">

                        </div>
                        <div class="flex flex-col sm:flex-row items-end justify-end gap-y-2 gap-x-6 mt-2">
                            <button type="button" class="flex items-center text-sm gap-2 text-gray-500 hover:text-gray-800" data-hs-overlay="#hs-support-modal">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="h-4 w-4">
                                    <path d="M22 10.5V6a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2v12c0 1.1.9 2 2 2h12.5" />
                                    <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7" />
                                    <path d="M20 14v4" />
                                    <path d="M20 22v.01" />
                                </svg>
                                Сообщить об ошибке
                            </button>
                            <SupportComponent 
                                modal-title="Сообщить об ошибке"
                                title="Error message"
                                subject="Error message"
                                :send-url="true"
                            />
                            <!-- <a class="flex items-center text-sm gap-2 text-gray-500 hover:text-gray-800" href="#">
                                <svg class="h-4" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M6 15a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"></path>
                                    <path d="M16.5 21.75a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"></path>
                                    <path d="M16.5 8.25a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"></path>
                                    <path d="M13.978 6.871 8.52 10.377"></path>
                                    <path d="m8.521 13.621 5.457 3.506"></path>
                                </svg>
                                Поделиться
                            </a> -->
                            <div class="flex items-center">
                                <button v-if="user" @click.prevent="toggleFavorite" :disabled="form.processing"
                                    class="flex items-center text-sm gap-2 text-gray-500 hover:text-gray-800">
                                    <svg class="h-4 w-4" :class=" calculator.is_favorite ? 'text-primary-500' : '' "
                                        :fill=" calculator.is_favorite ? 'currentColor' : 'none' " stroke="currentColor"
                                        stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="m12.412 17.876 4.725 3c.61.385 1.36-.187 1.181-.89l-1.368-5.382a.815.815 0 0 1 .272-.825l4.237-3.534c.553-.46.272-1.388-.45-1.434l-5.531-.357a.779.779 0 0 1-.684-.506L12.73 2.754a.778.778 0 0 0-1.463 0l-2.06 5.194a.778.778 0 0 1-.684.506l-5.532.357c-.722.046-1.003.975-.45 1.434l4.238 3.534a.816.816 0 0 1 .272.825l-1.266 4.988c-.215.844.684 1.528 1.406 1.069l4.397-2.785a.768.768 0 0 1 .825 0v0Z">
                                        </path>
                                    </svg>
                                    {{ calculator.is_favorite ? 'В избранном' : 'В избранное' }}
                                </button>
                                <div v-else class="hs-tooltip [--trigger:click] inline-block">
                                    <div class="hs-tooltip-toggle block text-center">
                                        <button type="button"
                                            class="flex items-center text-sm gap-2 text-gray-500 hover:text-gray-800">
                                            <svg class="h-4 w-4" fill="none" stroke="currentColor"
                                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="m12.412 17.876 4.725 3c.61.385 1.36-.187 1.181-.89l-1.368-5.382a.815.815 0 0 1 .272-.825l4.237-3.534c.553-.46.272-1.388-.45-1.434l-5.531-.357a.779.779 0 0 1-.684-.506L12.73 2.754a.778.778 0 0 0-1.463 0l-2.06 5.194a.778.778 0 0 1-.684.506l-5.532.357c-.722.046-1.003.975-.45 1.434l4.238 3.534a.816.816 0 0 1 .272.825l-1.266 4.988c-.215.844.684 1.528 1.406 1.069l4.397-2.785a.768.768 0 0 1 .825 0v0Z">
                                                </path>
                                            </svg>
                                            В избранное
                                        </button>
                                        <div class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible hidden opacity-0 transition-opacity absolute invisible z-10 max-w-xs w-full bg-white border text-start rounded-xl shadow-md"
                                            role="tooltip">
                                            <div class="px-4 py-2 text-sm text-gray-500">
                                                Для добавления калькуляторов в избранное необходимо зарегистрироваться
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                    <AdComponent 
                        class="mt-10" 
                        link="/"
                        img-src="/ad2.gif"
                    />

                    <section id="description">
                        <article class="mt-10" v-html="calculator.description"></article>
                    </section>
                </main>

                <aside class="lg:w-[300px] flex-none space-y-10">

                    <AdComponent 
                        link="/"
                        img-src="/ad1.gif"
                    />

                    <CategoryComponent 
                        :category="category"
                        :calculator-id="calculator.id"
                    />

                    <section>
                        <div class="rounded-lg border bg-white shadow-sm">
                            <div class="border-b px-4 py-2">
                                <h4 class="font-semibold text-gray-700 flex items-center gap-3.5">
                                    <svg class="w-5 h-5 flex-none text-primary-500" fill="none" stroke="currentColor"
                                        stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M3 4.5A1.5 1.5 0 0 1 4.5 3h12.64L21 6.603V19.5a1.5 1.5 0 0 1-1.5 1.5h-15A1.5 1.5 0 0 1 3 19.5v-15Z">
                                        </path>
                                        <path
                                            d="M12.004 3 12 6.692c0 .17-.224.308-.5.308h-4c-.276 0-.5-.138-.5-.308V3h5.004Z">
                                        </path>
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
                </aside>
            </div>
        </div>
    </section>
</template>