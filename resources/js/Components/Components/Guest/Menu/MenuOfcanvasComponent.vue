<template>
    <div id="hs-overlay-menu"
        class="hs-overlay hs-overlay-open:translate-x-0 hs-overlay-backdrop-open:backdrop-blur-sm hidden translate-x-full fixed top-0 end-0 transition-all duration-300 transform h-full max-w-xs w-full z-[80] bg-white border-s"
        tabindex="-1">
        <div class="h-16 flex justify-between items-center px-4 border-b">
            <h2 class="text-xl font-semibold text-gray-700">
                Меню
            </h2>
            <button type="button"
                class="flex justify-center items-center size-9 text-sm font-semibold rounded-lg border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none"
                data-hs-overlay="#hs-overlay-menu">
                <span class="sr-only">Close</span>
                <svg class="flex-shrink-0 size-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round">
                    <path d="M18 6 6 18"></path>
                    <path d="m6 6 12 12"></path>
                </svg>
            </button>

        </div>
        <div
            class="p-4 h-[calc(100vh-4rem)] !overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300">
            <nav class="hs-accordion-group w-full flex flex-col flex-wrap">
                <ul class="space-y-1.5">
                    <li class="hs-accordion" id="accordion-id-1">
                        <button type="button"
                            class="hs-accordion-toggle hs-accordion-active:bg-gray-100 w-full text-start flex items-center gap-x-3.5 py-2 px-2.5 font-medium text-sm text-gray-700 rounded-lg hover:bg-gray-100">
                            Финансовые калькуляторы
                            <svg class="hs-accordion-active:rotate-180 ms-auto block size-4 text-gray-600 group-hover:text-gray-500 transition"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round">
                                <path d="m6 9 6 6 6-6" />
                            </svg>
                        </button>
                        <div id="accordion-id-1"
                            class="hs-accordion-content w-full overflow-hidden transition-[height] duration-300 hidden">
                            <ul class="pt-2 ps-2">
                                <li>
                                    <a class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-700 rounded-lg hover:bg-gray-100"
                                        href="#">
                                        Кредитный калькулятор
                                    </a>
                                </li>
                                <li>
                                    <a class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-700 rounded-lg hover:bg-gray-100"
                                        href="#">
                                        Ипотечный калькулятор
                                    </a>
                                </li>
                                <li>
                                    <a class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-700 rounded-lg hover:bg-gray-100"
                                        href="#">
                                        Кредитный калькулятор с досрочным погашением
                                    </a>
                                </li>
                                <li>
                                    <a class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-700 rounded-lg hover:bg-gray-100"
                                        href="#">
                                        Калькулятор рефинансирования
                                    </a>
                                </li>
                                <li>
                                    <a class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-700 rounded-lg hover:bg-gray-100"
                                        href="#">
                                        Калькулятор микрозаймов
                                    </a>
                                </li>
                                <li>
                                    <a class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-700 rounded-lg hover:bg-gray-100"
                                        href="#">
                                        Калькулятор инфляции
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="hs-accordion" id="accordion-id-2">
                        <button type="button"
                            class="hs-accordion-toggle hs-accordion-active:bg-gray-100 w-full text-start flex items-center gap-x-3.5 py-2 px-2.5 font-medium text-sm text-gray-700 rounded-lg hover:bg-gray-100">
                            Калькуляторы для инвестиций
                            <svg class="hs-accordion-active:rotate-180 ms-auto block size-4 text-gray-600 group-hover:text-gray-500 transition"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round">
                                <path d="m6 9 6 6 6-6" />
                            </svg>
                        </button>
                        <div id="accordion-id-2"
                            class="hs-accordion-content w-full overflow-hidden transition-[height] duration-300 hidden">
                            <ul class="pt-2 ps-2">
                                <li>
                                    <a class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-700 rounded-lg hover:bg-gray-100"
                                        href="#">
                                        Калькулятор вкладов
                                    </a>
                                </li>
                                <li>
                                    <a class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-700 rounded-lg hover:bg-gray-100"
                                        href="#">
                                        Калькулятор инвестиций
                                    </a>
                                </li>
                                <li>
                                    <a class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-700 rounded-lg hover:bg-gray-100"
                                        href="#">
                                        Калькулятор доходности облигаций
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="hs-accordion" id="accordion-id-3">
                        <button type="button"
                            class="hs-accordion-toggle hs-accordion-active:bg-gray-100 w-full text-start flex items-center gap-x-3.5 py-2 px-2.5 font-medium text-sm text-gray-700 rounded-lg hover:bg-gray-100">
                            Бухгалтерия и налоги
                            <svg class="hs-accordion-active:rotate-180 ms-auto block size-4 text-gray-600 group-hover:text-gray-500 transition"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round">
                                <path d="m6 9 6 6 6-6" />
                            </svg>
                        </button>
                        <div id="accordion-id-3"
                            class="hs-accordion-content w-full overflow-hidden transition-[height] duration-300 hidden">
                            <ul class="pt-2 ps-2">
                                <li>
                                    <a class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-700 rounded-lg hover:bg-gray-100"
                                        href="#">
                                        Калькулятор НДС
                                    </a>
                                </li>
                                <li>
                                    <a class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-700 rounded-lg hover:bg-gray-100"
                                        href="#">
                                        Калькулятор НДФЛ
                                    </a>
                                </li>
                                <li>
                                    <a class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-700 rounded-lg hover:bg-gray-100"
                                        href="#">
                                        Калькулятор пеней
                                    </a>
                                </li>
                                <li>
                                    <a class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-700 rounded-lg hover:bg-gray-100"
                                        href="#">
                                        Калькулятор имущественного вычета
                                    </a>
                                </li>
                                <li>
                                    <a class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-700 rounded-lg hover:bg-gray-100"
                                        href="#">
                                        Калькулятор налога с продажи квартиры
                                    </a>
                                </li>
                                <li>
                                    <a class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-700 rounded-lg hover:bg-gray-100"
                                        href="#">
                                        Калькулятор процентов по займу
                                    </a>
                                </li>
                                <li>
                                    <a class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-700 rounded-lg hover:bg-gray-100"
                                        href="#">
                                        Калькулятор процентов по статье 395 ГК РФ
                                    </a>
                                </li>
                                <li>
                                    <a class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-700 rounded-lg hover:bg-gray-100"
                                        href="#">
                                        Калькулятор неустойки
                                    </a>
                                </li>
                                <li>
                                    <a class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-700 rounded-lg hover:bg-gray-100"
                                        href="#">
                                        Сумма прописью
                                    </a>
                                </li>
                                <li>
                                    <a class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-700 rounded-lg hover:bg-gray-100"
                                        href="#">
                                        Калькулятор стажа
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="hs-accordion" id="accordion-id-4">
                        <button type="button"
                            class="hs-accordion-toggle hs-accordion-active:bg-gray-100 w-full text-start flex items-center gap-x-3.5 py-2 px-2.5 font-medium text-sm text-gray-700 rounded-lg hover:bg-gray-100">
                            Автомобильные калькуляторы
                            <svg class="hs-accordion-active:rotate-180 ms-auto block size-4 text-gray-600 group-hover:text-gray-500 transition"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round">
                                <path d="m6 9 6 6 6-6" />
                            </svg>
                        </button>
                        <div id="accordion-id-4"
                            class="hs-accordion-content w-full overflow-hidden transition-[height] duration-300 hidden">
                            <ul class="pt-2 ps-2">
                                <li>
                                    <a class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-700 rounded-lg hover:bg-gray-100"
                                        href="#">
                                        Калькулятор ОСАГО
                                    </a>
                                </li>
                                <li>
                                    <a class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-700 rounded-lg hover:bg-gray-100"
                                        href="#">
                                        Калькулятор транспортного налога
                                    </a>
                                </li>
                                <li>
                                    <a class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-700 rounded-lg hover:bg-gray-100"
                                        href="#">
                                        Калькулятор автокредита
                                    </a>
                                </li>
                                <li>
                                    <a class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-700 rounded-lg hover:bg-gray-100"
                                        href="#">
                                        Калькулятор растаможки автомобилей
                                    </a>
                                </li>
                                <li>
                                    <a class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-700 rounded-lg hover:bg-gray-100"
                                        href="#">
                                        Калькулятор расхода топлива
                                    </a>
                                </li>
                                <li>
                                    <a class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-700 rounded-lg hover:bg-gray-100"
                                        href="#">
                                        Калькулятор зарядки электромобилей
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <!-- <li class="hs-accordion" id="accordion-id-5">
                        <button type="button"
                            class="hs-accordion-toggle hs-accordion-active:bg-gray-100 w-full text-start flex items-center gap-x-3.5 py-2 px-2.5 font-medium text-sm text-gray-700 rounded-lg hover:bg-gray-100">
                            Калькуляторы для здоровья
                            <svg class="hs-accordion-active:rotate-180 ms-auto block size-4 text-gray-600 group-hover:text-gray-500 transition"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round">
                                <path d="m6 9 6 6 6-6" />
                            </svg>
                        </button>
                        <div id="accordion-id-5"
                            class="hs-accordion-content w-full overflow-hidden transition-[height] duration-300 hidden">
                            <ul class="pt-2 ps-2">
                                <li>
                                    <a class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-700 rounded-lg hover:bg-gray-100"
                                        href="#">
                                        Калькулятор ИМТ
                                    </a>
                                </li>
                                <li>
                                    <a class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-700 rounded-lg hover:bg-gray-100"
                                        href="#">
                                        Калькулятор веса
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li> -->




                    <!-- <li>
                        <a class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-700 rounded-lg hover:bg-gray-100 dark:hover:bg-neutral-700 dark:text-neutral-400 dark:hover:text-neutral-300"
                            href="#">
                            <svg class="size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z" />
                                <path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z" />
                            </svg>
                            Documentation
                        </a>
                    </li> -->
                </ul>
            </nav>





        </div>
    </div>
</template>