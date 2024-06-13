<script setup>

    import { defineModel } from "vue";

    // const props = defineProps({
    //     title: String,
    //     width: {
    //         type: Number,
    //         default: 650,
    //     }
    // });

    const accordion = defineModel('accordion', { default: false });

    const emit = defineEmits(['accordion:toggle']);

    const toggleAccordion = () => {
        accordion.value = !accordion.value;
        emit('accordion:toggle');
    }
</script>

<template>
    <slot name="button" :toggleAccordion="toggleAccordion">
        <button @click.prevent="toggleAccordion">Open Accordion</button>
    </slot>

  
    <div v-if="accordion">
        <slot name="default" :toggleAccordion="toggleAccordion"></slot>
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Incidunt consectetur ea possimus cupiditate nihil voluptates consequuntur. Facilis nam, cumque minima vel iste assumenda architecto eum, deserunt quam totam officia ducimus!
    </div>
</template>
