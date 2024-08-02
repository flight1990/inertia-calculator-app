<script setup>
    import { Link, usePage } from "@inertiajs/vue3";
    import { computed } from "vue";

    import LogoComponent from "@/Components/Guest/Logo/LogoComponent.vue";
    import SupportComponent from "@/Components/Guest/Support/SupportComponent.vue";

    const tg_link = computed(() => usePage().props.site_settings.tg_link);
    const inst_link = computed(() => usePage().props.site_settings.inst_link);
</script>

<template>
    <footer class="border-t border-gray-200">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="my-6">
                <div class="flex items-center justify-center">
                    <LogoComponent />
                </div>
                <nav class="mt-6">
                    <div class="flex items-center justify-center flex-wrap gap-x-6">

                        <SupportComponent
                            title="Обратиться в поддержку"
                            subject="Обратиться в поддержку"
                        />
                        <a class="inline-block rounded-lg px-3 py-2 text-sm text-gray-700 hover:bg-gray-100"
                            href="#">
                            Политика конфиденциальности
                        </a>
                        <a class="inline-block rounded-lg px-3 py-2 text-sm text-gray-700 hover:bg-gray-100"
                            href="#">
                            Пользовательское соглашение
                        </a>
                        <Link class="inline-block rounded-lg px-3 py-2 text-sm text-gray-700 hover:bg-gray-100"
                            href="/faq">
                            Часто задаваемые вопросы (FAQ)
                        </Link>
                    </div>
                </nav>
            </div>
            <div
                class="flex flex-col items-center pt-0 pb-4 md:py-4 md:flex-row-reverse md:justify-between">
                <div class="flex items-center gap-x-4">
                    <a v-if="tg_link" :href="tg_link" target="_blank"
                        class="p-2 font-semibold text-gray-700 bg-white rounded-lg hover:bg-gray-100 active:bg-gray-200 flex items-center gap-x-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="m8.25 12.648 8.428 7.416a.75.75 0 0 0 1.228-.394L21.43 4.276a.75.75 0 0 0-1.003-.862L3.12 10.211c-.693.272-.6 1.284.132 1.434l4.997 1.003Z">
                            </path>
                            <path d="M8.25 12.645 21.01 3.43"></path>
                            <path d="m12.46 16.352-2.926 2.925a.75.75 0 0 1-1.284-.525v-6.104"></path>
                        </svg>
                    </a>
                    <a v-if="inst_link" :href="inst_link" target="_blank"
                        class="p-2 font-semibold text-gray-700 bg-white rounded-lg hover:bg-gray-100 active:bg-gray-200 flex items-center gap-x-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="w-5 h-5">
                            <rect width="20" height="20" x="2" y="2" rx="5" ry="5" />
                            <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z" />
                            <line x1="17.5" x2="17.51" y1="6.5" y2="6.5" />
                        </svg>
                    </a>
                </div>
                <div class="text-center md:text-left">
                    <p class="mt-6 text-xs text-gray-500 md:mt-0">
                        {{ new Date().getFullYear()==2024 ? new Date().getFullYear() : '2024-'+new Date().getFullYear() }}
                        © calcutor.ru
                    </p>
                    <p class="text-xs text-gray-400">
                        При использовании материалов сайта необходима ссылка на источник.
                    </p>
                </div>
            </div>
        </div>
    </footer>
</template>
