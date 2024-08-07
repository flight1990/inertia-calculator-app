<script setup>
    const {site_settings} = defineProps({
        site_settings: Object
    });
</script>

<template>
    <section id="hero" class="overflow-hidden">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col lg:flex-row items-center justify-between gap-8">
                <div class="flex-1 lg:py-8">
                    <h1 class="text-3xl font-medium tracking-tight text-gray-700">
                        {{ site_settings.hero_title }}
                    </h1>
                    <p class="mt-6 text-lg text-gray-500">
                        {{ site_settings.hero_description }}
                    </p>
                </div>
                <div class="order-first lg:order-last flex-1 flex items-center justify-center">
                    <img src="/Calculator-bro.png" class="w-1/2 lg:w-full select-none pt-8 lg:p-20" alt="calcutor">
                </div>
            </div>
        </div>
    </section>
</template>
