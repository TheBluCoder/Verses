<script setup lang="ts">
// import { ref } from 'vue';
import CommentContent from './CommentContent.vue';
import CommentActions from './CommentActions.vue';
import CommentForm from './CommentForm.vue';
import { useReplyStore } from '@/Composables/useReplyStore';
import { computed } from 'vue';

const props = defineProps({
    comment: {
        type: Object,
        required: true,
    },
    commentableType: {
        type: String,
        default: 'comment',
    },
});
let hasReplies = props.comment.replies && props.comment.replies.length > 0;

const emit = defineEmits(['add-comment']);

const replyStore = useReplyStore();

const sortedReplies = computed(() => {
    return hasReplies
        ? [...props.comment.replies].sort((a, b) => -(a.id - b.id))
        : [];
});

const submitReply = (content, parentId) => {
    emit('add-comment', { content, parentId });
    replyStore.replyingTo = null;
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
                    :comment-is-liked="comment.isLiked"
                    @reply="replyStore.handleReply(comment.id)"
                />

                <!-- Reply Form -->
                <div v-if="replyStore.replyingTo === comment.id" class="mt-3">
                    <CommentForm
                        placeholder="Write a reply..."
                        class="ml-6"
                        :commentable-type="commentableType"
                        :commentable-id="comment.id"
                    />
                </div>

                <!-- Nested Replies -->
                <div v-if="hasReplies" class="ml-6 mt-3 space-y-3">
                    <Comment
                        v-for="reply in sortedReplies"
                        :key="reply.id"
                        :comment="reply"
                    />
                </div>
            </div>
        </div>
    </div>
</template>
