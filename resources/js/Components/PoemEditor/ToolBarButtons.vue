<script setup>

defineProps({
    enabled: Boolean,
});
</script>

<template>
    <button
        :class="{
            'bg-indigo-100': enabled,
        }"
        class="rounded-md p-1 transition-colors duration-300 hover:bg-gray-200"
    >
        <slot />
    </button>
</template>

<style scoped></style>
