<!-- TabButton.vue -->
<script setup>
import { defineProps } from 'vue';

const props = defineProps({
    icon: Function, // Icon component to display
    label: String, // Tab label
    count: Number, // Count to display
    isActive: Boolean, // Whether the tab is active
    onClick: Function, // Click handler
});
</script>

<template>
    <button
        @click="onClick"
        class="flex items-center gap-1 border-b-2 text-sm transition-colors"
        :class="
            isActive
                ? 'border-orange-500 text-orange-500'
                : 'border-transparent'
        "
    >
        <component :is="icon" class="h-3 w-3" />
        <span>{{ label }}</span>
        <span class="text-sm text-purple-600">({{ count }})</span>
    </button>
</template>
