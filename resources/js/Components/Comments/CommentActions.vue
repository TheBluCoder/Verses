<script setup lang="ts">
import { ChatBubbleLeftIcon } from '@heroicons/vue/24/outline';
import LikeReaction from '@/Components/LikeReaction.vue';

const props = defineProps({
    commentId: {
        type: Number,
        required: true,
    },
    likesCount: {
        type: Number,
        default: 0,
    },
    commentIsLiked: {
        type: Boolean,
        default: false,
    },
});

// const emit = defineEmits(['reply']);
</script>

<template>
    <div class="ml-1 mt-1 flex items-center space-x-4">
        <LikeReaction
            :resource-likes-count="likesCount"
            :resource-id="commentId"
            :resource-is-liked="commentIsLiked"
            resource-type="comments"
        />

        <button
            @click="$emit('reply')"
            class="flex items-center space-x-1 text-xs text-gray-500 hover:text-indigo-600"
        >
            <ChatBubbleLeftIcon class="h-4 w-4" />
            <span>Reply</span>
        </button>
    </div>
</template>
