<script setup lang="ts">
import { computed, defineProps, inject } from 'vue';
import Comment from './Comment.vue';
import CommentForm from './CommentForm.vue';

const props = defineProps({
    comments: {
        type: Array,
        required: true,
    },
});

const sortedComments = computed(() => {
    return [...props.comments].sort((a, b) => -(a.id - b.id));
});
</script>

<template>
    <div class="mt-6">
        <!-- New Comment Form -->
        <div class="p-4">
            <CommentForm
                :commentable-id="inject('postId')"
                commentable-type="post"
            />
        </div>

        <!-- Comment List -->
        <div class="space-y-4 p-4">
            <Comment
                v-for="comment in sortedComments"
                :key="comment.id"
                :comment="comment"
                @add-comment="emit('add-comment', $event)"
            />
        </div>
    </div>
</template>
