<script setup>
import PoemEditor from '@/Components/PoemEditor/PoemEditor.vue';
import DefaultLayout from '@/Layouts/DefaultLayout.vue';
import CreatePostLayout from "@/Layouts/CreatePostLayout.vue";

defineOptions({
    layout: CreatePostLayout,
});

</script>

<template>
    <div><PoemEditor /></div>
</template>

<style scoped></style>
