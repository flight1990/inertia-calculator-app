<script setup>
    import CatalogListComponent from "@/Components/Components/Guest/Catalog/CatalogListComponent.vue";

    defineProps({
        items: Array
    });
</script>
<template>
    <section id="catalog" class="py-20">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <CatalogListComponent 
                v-for="item in items"
                :key="item.id"
                :item="item"
            />
        </div>
    </section>
</template>