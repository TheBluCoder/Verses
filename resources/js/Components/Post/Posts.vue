<script setup>
import Post from '@/Components/Post/Post.vue';
defineProps({ posts: { type: Array, required: true } });
</script>
<template>
    <Post v-for="post in posts" :key="post.id" :post="post"></Post>
</template>

<style scoped></style>
