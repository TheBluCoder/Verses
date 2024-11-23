<script setup>
import Poem from '@/Components/Poem.vue';
defineProps({ poems: { type: Array, required: true } });
</script>
<template>
    <Poem v-for="poem in poems" :key="poem.id" :poem="poem"></Poem>
</template>

<style scoped></style>
