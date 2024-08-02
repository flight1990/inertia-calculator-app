<script setup>

const {site_settings} = defineProps({
    site_settings: Object
});

</script>

<template>
    <section id="hero" class="overflow-hidden py-8 sm:py-16 lg:pb-32">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="lg:grid lg:grid-cols-12 lg:gap-x-8 lg:gap-y-20">
                <div class="relative z-10 mx-auto max-w-2xl lg:col-span-7 lg:max-w-none lg:pt-6 xl:col-span-6">
                    <h1 class="text-3xl font-medium tracking-tight text-gray-700">
                        {{ site_settings.hero_title }}
                    </h1>
                    <p class="mt-6 text-lg text-gray-500">
                        {{ site_settings.hero_description }}
                    </p>
                </div>
                <div class="relative mt-10 sm:mt-20 lg:col-span-5 lg:row-span-2 lg:mt-0 xl:col-span-6 lg:ml-20">
                    <div class="select-none -mx-4 h-[300px] px-10 [mask-image:linear-gradient(to_bottom,white_60%,transparent)] sm:mx-0 lg:absolute lg:-inset-x-10 lg:-bottom-20 lg:-top-10 lg:h-auto lg:px-8 xl:-bottom-32">
                        <img src="/hero.png" class="select-none" alt="calcutor">
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>
