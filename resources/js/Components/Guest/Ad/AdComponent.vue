<script setup>
    import {Link} from "@inertiajs/vue3";

    defineProps({
        link: String,
        imgSrc: String
    });
</script>
<template>  
    <section>
        <div class="flex justify-center">
            <Link class="" :href="link">
                <img class="" :src="imgSrc" alt="">
            </Link>
        </div>
    </section>
</template>