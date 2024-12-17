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
const isLiked = ref(false);
let likes = ref(props.likesCount);

const toggleLike = (commentId) => {
    isLiked.value = !isLiked.value;
    likes.value += isLiked.value ? 1 : -1;
};
</script>

<template>
    <div class="ml-1 mt-1 flex items-center space-x-4">
        <button
            @click="toggleLike(commentId)"
            class="flex items-center space-x-1 text-xs text-gray-500 hover:text-indigo-600"
        >
            <component
                :is="isLiked ? HeartSolidIcon : HeartIcon"
                class="h-4 w-4"
                :class="{
                    'text-red-500': isLiked,
                }"
            />
            <span v-if="likes > 0">{{ likes }}</span>
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
