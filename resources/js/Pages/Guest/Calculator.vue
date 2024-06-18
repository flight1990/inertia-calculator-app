<script setup>
    import { Head, useForm, usePage } from "@inertiajs/vue3";
    import {computed, onMounted, ref, watch} from "vue";
    import {useLocalStorage} from "@/Composables/useLocalStorage.js";
    import Layout from "@/Layouts/Guest/Guest.vue";
    import BreadcrumbsComponent from "@/Components/Guest/Breadcrumbs/BreadcrumbsComponent.vue";
    import SupportComponent from "@/Components/Guest/Support/SupportComponent.vue";
    import AdComponent from "@/Components/Guest/Ad/AdComponent.vue";
    import CategoryComponent from "@/Components/Guest/Category/CategoryComponent.vue";
    import SaveCalculationsComponent from "@/Components/Guest/Calculations/SaveCalculationsComponent.vue";
    import HistoryCalculationsComponent from "@/Components/Guest/Calculations/HistoryCalculationsComponent.vue";
    import ShareCalculationsComponent from "@/Components/Guest/Calculations/ShareCalculationsComponent.vue";
    import RPopover from "@/Components/Base/RPopover.vue";

    const {getItem} = useLocalStorage();

    const historyOpenHandler = () => {
        console.log(getItem(`history_percent`));
    }

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






                    <div class="mb-10 border p-4 bg-white rounded-lg hidden">
                        <div>
                            <form>
                                

                             



                                <div class="mt-4 first:mt-0">
                                    <label class="text-gray-600">
                                        Что вычислить
                                    </label>
                                    <div class="relative mt-2 max-w-md text-gray-700">
                                        <select 
                                            name="age" 
                                            id="age"
                                            class="w-full py-2 px-4 bg-transparent outline-none border focus:border-black shadow-sm rounded-lg">
                                            <option value="1" selected="selected">Найти процент от числа</option>
                                            <option value="2">Сколько процентов составляет число от числа</option>
                                            <option value="3">Прибавить процент к числу</option>
                                            <option value="4">Вычесть процент из числа</option>
                                            <option value="5">На сколько процентов одно число больше другого</option>
                                            <option value="6">На сколько процентов одно число меньше другого</option>
                                            <option value="7">Найти 100 процентов</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="mt-4">
                                    <label class="text-gray-600">
                                        Значения
                                    </label>
                                    <div class="flex items-center flex-wrap gap-x-4">
                                        <div>
                                            <div class="relative mt-2 max-w-md text-gray-700">
                                                <input 
                                                    type="text" 
                                                    placeholder="0.00" 
                                                    class="w-full py-2 pl-4 pr-10 appearance-none bg-transparent outline-none border focus:border-black shadow-sm rounded-lg" />
                                                <span class="h-6 text-gray-700 absolute right-3 inset-y-0 my-auto select-none">
                                                    см.
                                                </span>
                                            </div>
                                        </div>

                                        <div class="flex-none relative mt-2 max-w-md text-gray-700">some text</div>

                                        <div>
                                            
                                            <div class="relative mt-2 max-w-md text-gray-700">
                                                <input 
                                                    type="text" 
                                                    placeholder="0.00" 
                                                    class="w-full py-2 pl-4 pr-10 !appearance-none bg-transparent outline-none border focus:border-black shadow-sm rounded-lg" />
                                                <span class="h-6 text-gray-700 absolute right-3 inset-y-0 my-auto select-none">
                                                    см.
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-4 first:mt-0">
                                    <label class="text-gray-600">
                                        Округлять до
                                    </label>
                                    <div class="relative mt-2 max-w-md text-gray-700">
                                        <select 
                                            name="age" 
                                            id="age"
                                            class="w-full py-2 px-4 bg-transparent outline-none border focus:border-black shadow-sm rounded-lg">
                                            <option value="0">0</option>
                                            <option value="1">1</option>
                                            <option value="2" selected="">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="mt-4 first:mt-0">
                                    <button
                                        class="px-4 py-2 text-sm text-white duration-150 bg-cyan-600 rounded-md hover:bg-cyan-700 active:shadow-lg">
                                        Расчитать
                                    </button>
                                </div>

                                
                                <div class="mt-4 first:mt-0">
                                    <label class="text-gray-600">
                                        Вариант расчета
                                    </label>
                                    <div class="relative mt-2 max-w-md text-gray-700">
                                        <select 
                                            name="age" 
                                            id="age"
                                            class="w-full py-2 px-4 bg-transparent outline-none border focus:border-black shadow-sm rounded-lg">
                                            <option value="1" data-autofocus="credit_sum" selected="selected">Расчет ежемесячного платежа</option>
                                            <option value="2" data-autofocus="credit_sum">Расчет срока кредита</option>
                                            <option value="3" data-autofocus="period">Расчет максимальной суммы кредита</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="mt-4 first:mt-0">
                                    <label class="text-gray-600">
                                        Сумма кредита, в выбранной валюте
                                    </label>
                                    <div class="relative mt-2 max-w-md text-gray-700">
                                        <input type="number" placeholder="0.00" class="w-full pl-4 pr-16 py-2 appearance-none bg-transparent outline-none border focus:border-black shadow-sm rounded-lg" />
                                        <div class="absolute inset-y-0 right-3 flex items-center">
                                            <select class="text-sm bg-transparent outline-none px-1 rounded-lg h-full">
                                                <option>BYN</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-4 first:mt-0">
                                    <label class="text-gray-600">
                                        Срок кредита
                                    </label>
                                    <div class="relative mt-2 max-w-md text-gray-700">
                                        <input type="number" placeholder="0.00" class="w-full pl-4 pr-24 py-2 appearance-none bg-transparent outline-none border focus:border-black shadow-sm rounded-lg" />
                                        <div class="absolute inset-y-0 right-3 flex items-center">
                                            <select class="text-sm bg-transparent outline-none px-1 rounded-lg h-full">
                                                <option value="Y" selected="">лет</option>
									            <option value="M">месяцев</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-4 first:mt-0">
                                    <label class="text-gray-600">
                                        Ежемесячный платеж
                                    </label>
                                    <div class="relative mt-2 max-w-md text-gray-700">
                                        <input 
                                            type="number" 
                                            placeholder="0.00" 
                                            class="w-full py-2 pl-4 pr-12 appearance-none bg-transparent outline-none border focus:border-black shadow-sm rounded-lg" />
                                        <span class="h-6 text-gray-700 absolute right-3 inset-y-0 my-auto select-none">
                                            BYN
                                        </span>
                                    </div>
                                </div>

                                <div class="mt-4 first:mt-0">
                                    <label class="text-gray-600">
                                        Процентная ставка, %
                                    </label>
                                    <div class="relative mt-2 max-w-md text-gray-700">
                                        <input 
                                            type="number" 
                                            placeholder="0.00" 
                                            class="w-full py-2 pl-4 pr-8 appearance-none bg-transparent outline-none border focus:border-black shadow-sm rounded-lg" />
                                        <span class="h-6 text-gray-700 absolute right-3 inset-y-0 my-auto select-none">
                                            %
                                        </span>
                                    </div>
                                </div>

                                <div class="mt-4 first:mt-0">
                                    <label class="text-gray-600">Тип ежемесячных платежей</label>
                                    <div class="flex max-w-md gap-x-2 mt-2">
                                        <div class="w-full flex items-center ps-4 border border-gray-200 shadow-sm rounded-lg">
                                            <input id="bordered-radio-1" type="radio" value="" name="bordered-radio" class="w-4 h-4 text-black bg-gray-100 border-gray-300 focus:ring-black">
                                            <label for="bordered-radio-1" class="w-full py-2 ms-2 text-gray-700">Аннуитетные</label>
                                        </div>
                                        <div class="w-full flex items-center ps-4 border border-gray-200 shadow-sm rounded-lg">
                                            <input checked id="bordered-radio-2" type="radio" value="" name="bordered-radio" class="w-4 h-4 text-black bg-gray-100 border-gray-300 focus:ring-black">
                                            <label for="bordered-radio-2" class="w-full py-2 ms-2 text-gray-700">Дифференцированные</label>
                                        </div>
                                    </div>
                                </div>

                                
                                <div class="mt-4 first:mt-0">
                                    <button
                                        class="px-4 py-2 text-sm text-white duration-150 bg-cyan-600 rounded-md hover:bg-cyan-700 active:shadow-lg">
                                        Расчитать
                                    </button>
                                </div>

                            </form>
                        </div>
                        <div>
                            <!-- response -->
                        </div>
                    </div>







                    <section id="calculator">

                        <div class="no-tailwind" id="calculator-container">

                        </div>

                        <div class="flex flex-col sm:flex-row sm:items-end justify-end flex-wrap gap-y-2 gap-x-6 mt-2">
                            <HistoryCalculationsComponent
                                @opened="historyOpenHandler"
                            />

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
