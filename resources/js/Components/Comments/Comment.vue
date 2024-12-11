<script setup lang="ts">
import { ref } from 'vue';
import CommentContent from './CommentContent.vue';
import CommentActions from './CommentActions.vue';
import CommentForm from './CommentForm.vue';

const props = defineProps({
    comment: {
        type: Object,
        required: true,
    },
});
let hasReplies = props.comment.replies && props.comment.replies.length > 0;

const emit = defineEmits(['add-comment']);
const replyingTo = ref(null);

const handleReply = (comment) => {
    replyingTo.value = replyingTo.value === comment.id ? null : comment.id;
};

const submitReply = (content, parentId) => {
    emit('add-comment', { content, parentId });
    replyingTo.value = null;
};
</script>

<template>
    <div class="space-y-4">
        <div class="flex space-x-3">
            <img
                :src="comment?.author?.profilePic"
                :alt="comment?.author?.username"
                class="h-8 w-8 rounded-full"
            />
            <div class="flex-1">
                <CommentContent
                    :author="comment.author"
                    :content="comment.content"
                    :posted-on="comment.postedOn"
                />

                <CommentActions
                    :comment-id="comment.id"
                    :likes-count="comment.likesCount"
                    @reply="handleReply(comment)"
                />

                <!-- Reply Form -->
                <div v-if="replyingTo === comment.id" class="mt-3">
                    <CommentForm
                        placeholder="Write a reply..."
                        @submit="(content) => submitReply(content, comment.id)"
                        class="ml-6"
                    />
                </div>

                <!-- Nested Replies -->
                <div
                    v-if="hasReplies"
                    class="ml-6 mt-3 space-y-3"
                >
                    <Comment
                        v-for="reply in comment.replies"
                        :key="reply.id"
                        :comment="reply"
                    />
                </div>
            </div>
        </div>
    </div>
</template>
