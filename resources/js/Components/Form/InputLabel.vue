<script setup>
defineProps({
    value: {
        type: String,
    },
});
</script>

<template>

    <label class="mb-2 block text-sm text-gray-800 ">
        <span v-if="value">{{ value }}</span>
        <span v-else><slot /></span>
    </label>
</template>
