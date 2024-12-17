<script setup>
import PoemEditor from '@/Components/PoemEditor/PoemEditor.vue';
import Preview from '@/Components/PoemEditor/Preview.vue';
import createPostLayout from '@/Layouts/CreatePostLayout.vue';
import DefaultLayout from '@/Layouts/DefaultLayout.vue';

defineOptions({
    layout: DefaultLayout,
});
</script>

<template>
    <div><PoemEditor /></div>
</template>

<style scoped></style>
