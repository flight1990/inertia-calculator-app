<script setup>
    import {Head} from "@inertiajs/vue3";

    import Layout from "@/Layouts/Guest/Guest.vue";

    import BreadcrumbsComponent from "@/Components/Guest/Breadcrumbs/BreadcrumbsComponent.vue";
    import AdComponent from "@/Components/Guest/Ad/AdComponent.vue";

    defineOptions({
        layout: Layout
    });

    const props = defineProps({
        faqs: Object,
        metta_seo: Object
    });

</script>

<template>
    <Head>
        <title>Часто задаваемые вопросы (FAQ)</title>

        <meta name="title" :content="metta_seo.title">
        <meta name="description" :content="metta_seo.description">
        <meta name="keywords" :content="metta_seo.keywords">
        <meta name="robots" :content="(metta_seo.index ? 'index' : 'noindex')+','+ (metta_seo.follow ? 'follow' : 'nofollow')">
    </Head>

    <section class="pt-8 pb-20">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <BreadcrumbsComponent title="Часто задаваемые вопросы (FAQ)" />
            <div class="mt-2">
                <h2 class="text-2xl font-medium tracking-tight text-gray-700">
                    Часто задаваемые вопросы (FAQ)
                </h2>
            </div>
            <div class="flex flex-col lg:flex-row gap-10 mt-4">
                <main class="flex-1">

                    <section id="faq" class="space-y-8">
                        <div v-for="item in faqs.data" :key="item.id">
                            <h3 class="text-xl font-semibold text-gray-700">
                               {{ item.question }}
                            </h3>
                            <p v-html="item.answer" class="mt-2 text-base text-gray-500"></p>
                        </div>
                    </section>

                    <AdComponent
                        class="mt-10"
                        link="/"
                        img-src="/ad2.gif"
                    />
                </main>
                <aside class="lg:w-[300px] flex-none space-y-10">
                    <AdComponent
                        link="/"
                        img-src="/ad1.gif"
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

