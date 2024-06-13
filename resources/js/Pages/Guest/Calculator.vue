<script setup>
    import { Head, useForm, usePage } from "@inertiajs/vue3";
    import { computed, onMounted } from "vue";

    import Layout from "@/Layouts/Guest/Guest.vue";

    import BreadcrumbsComponent from "@/Components/Guest/Breadcrumbs/BreadcrumbsComponent.vue";
    import SupportComponent from "@/Components/Guest/Support/SupportComponent.vue";
    import AdComponent from "@/Components/Guest/Ad/AdComponent.vue";
    import CategoryComponent from "@/Components/Guest/Category/CategoryComponent.vue";
    import SaveCalculationsComponent from "@/Components/Guest/Calculations/SaveCalculationsComponent.vue";
    import HistoryCalculationsComponent from "@/Components/Guest/Calculations/HistoryCalculationsComponent.vue";
    import ShareCalculationsComponent from "@/Components/Guest/Calculations/ShareCalculationsComponent.vue";
    import RPopover from "@/Components/Base/RPopover.vue";

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
                        <div id="calculator-container" class="w-full h-96 bg-white rounded-lg border  shadow-sm">

                        </div>
                        <div class="flex flex-col sm:flex-row sm:items-end justify-end flex-wrap gap-y-2 gap-x-6 mt-2">

                            <HistoryCalculationsComponent />

                            <SaveCalculationsComponent />

                            <ShareCalculationsComponent />

                            <SupportComponent
                                modal-title="Сообщить об ошибке"
                                :title="'Error message of '+calculator.name"
                                subject="Error message"
                                :send-url="true"
                            />

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
                                <div v-else class="flex items-center">
                                    <RPopover :width="320">
                                        <template v-slot:trigger>
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
                                        </template>
                                        <template v-slot:body>
                                            <div class="text-sm text-gray-500">
                                                Для добавления калькуляторов в избранное необходимо
                                                авторизоваться
                                                или
                                                зарегистрироваться!
                                            </div>
                                        </template>
                                    </RPopover>
                                </div>
                            </div>
                        </div>
                    </section>

                    <AdComponent class="mt-10" link="/" img-src="/ad2.gif" />

                    <section id="description">
                        <article class="mt-10" v-html="calculator.description"></article>
                    </section>
                </main>

                <aside class="lg:w-[300px] flex-none space-y-10">

                    <AdComponent link="/" img-src="/ad1.gif" />

                    <CategoryComponent :category="category" :calculator-id="calculator.id" />

                    <section>
                        <div class="rounded-lg border bg-white shadow-sm">
                            <div class="border-b px-4 py-2">
                                <h4 class="font-semibold text-gray-700 flex items-center gap-3.5">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="w-5 h-5 flex-none text-primary-500">
                                        <path d="M15.2 3a2 2 0 0 1 1.4.6l3.8 3.8a2 2 0 0 1 .6 1.4V19a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2z" />
                                        <path d="M17 21v-7a1 1 0 0 0-1-1H8a1 1 0 0 0-1 1v7" />
                                        <path d="M7 3v4a1 1 0 0 0 1 1h7" />
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
