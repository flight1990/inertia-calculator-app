<script setup lang="ts">
    import { 
        PopoverRoot, 
        PopoverTrigger,
        PopoverPortal, 
        PopoverContent, 

        PopoverClose, 
    } from 'radix-vue'

    const props = defineProps({
        side: {
            type: String,
            default: 'top',
        },
        width: {
            type: Number,
            default: 260,
        }
    });
</script>

<template>
    <PopoverRoot>
        <PopoverTrigger>
            <slot name="trigger">
                <button>Open Dialog</button>
            </slot>
        </PopoverTrigger>
        <PopoverPortal>
            <PopoverContent 
                :side="side"
                :side-offset="10"
                :style="{ 'max-width': width + 'px' }"
                class="p-4 rounded-xl bg-white border shadow-md w-full data-[state=open]:data-[side=top]:animate-slideDownAndFade data-[state=open]:data-[side=right]:animate-slideLeftAndFade data-[state=open]:data-[side=bottom]:animate-slideUpAndFade data-[state=open]:data-[side=left]:animate-slideRightAndFade">
                <slot name="body"></slot>
            </PopoverContent>
        </PopoverPortal>
    </PopoverRoot>
</template>