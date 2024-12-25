<script setup>
import GuestLayout from '@/Layouts/DefaultLayout.vue';
import Post from '@/Components/Post/Post.vue';
import CommentSection from '@/Components/Comments/CommentSection.vue';
import { provide } from 'vue';
defineOptions({ layout: GuestLayout });
var props = defineProps({
    post: {
        type: Object,
        required: true,
    },
});

provide('postId', props.post.id);
</script>

<template>
    <Post :post="props.post"></Post>
    <CommentSection :comments="post.comments"></CommentSection>
</template>

<style scoped></style>
