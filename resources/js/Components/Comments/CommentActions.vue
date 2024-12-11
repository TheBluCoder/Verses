<script setup lang="ts">
import { ref } from 'vue';
import { HeartIcon, ChatBubbleLeftIcon } from '@heroicons/vue/24/outline';
import { HeartIcon as HeartSolidIcon } from '@heroicons/vue/24/solid';

const props = defineProps({
    commentId: {
        type: [String, Number],
        required: true,
    },
    likesCount: {
        type: Number,
        default: 0,
    },
});

const emit = defineEmits(['reply']);
const likedComments = ref(new Set());

const toggleLike = (commentId) => {
    if (likedComments.value.has(commentId)) {
        likedComments.value.delete(commentId);
    } else {
        likedComments.value.add(commentId);
    }
};
</script>

<template>
    <div class="ml-1 mt-1 flex items-center space-x-4">
        <button
            @click="toggleLike(commentId)"
            class="flex items-center space-x-1 text-xs text-gray-500 hover:text-indigo-600"
        >
            <component
                :is="likedComments.has(commentId) ? HeartSolidIcon : HeartIcon"
                class="h-4 w-4"
                :class="{
          'text-red-500': likedComments.has(commentId),
        }"
            />
            <span v-if="likesCount > 0">{{
                    likesCount + likedComments.has(commentId)
                }}</span>
        </button>

        <button
            @click="$emit('reply')"
            class="flex items-center space-x-1 text-xs text-gray-500 hover:text-indigo-600"
        >
            <ChatBubbleLeftIcon class="h-4 w-4" />
            <span>Reply</span>
        </button>
    </div>
</template>
