<script setup>
import Poem from '@/Components/Post/Poem.vue';
import JSShare from 'js-share';
defineProps({ poems: { type: Array, required: true } });
</script>
<template>
    <Poem v-for="poem in poems" :key="poem.id" :poem="poem"></Poem>
</template>

<style scoped></style>
