<script setup>
import { useForm } from '@inertiajs/vue3';
import { computed } from 'vue';
import { useToastComposable } from '@/Composables/useToast.js';

const props = defineProps({
    placeholder: {
        type: String,
        default: 'Write a comment...',
    },
    commentableId: {
        type: Number,
        required: true,
    },
    commentableType: {
        type: String,
        required: true,
    },
});

const errorMsg = 'An error occured, comment not submitted.';
const commentForm = useForm({
    comment: '',
    commentableId: props.commentableId,
    commentableType: props.commentableType.toLowerCase(),
});

let formIsNotEmpty = computed(() => commentForm.comment.trim().length > 0);
const submitComment = () => {
    if (formIsNotEmpty.value) {
        commentForm.post('/comments', {
            onSuccess: () => {
                commentForm.reset('comment');
            },
            onError: async () => {
                try {
                    let { getToast, errorConfig } = useToastComposable();
                    let toast = await getToast();
                    toast.error(errorMsg, errorConfig);
                } catch {
                    alert(errorMsg);
                }
            },
            preserveScroll: true,
            showProgress: false,
        });
    }
};
</script>

<template>
    <form @submit.prevent="submitComment" class="space-y-2">
        <textarea
            v-model="commentForm.comment"
            :placeholder="placeholder"
            rows="2"
            autocorrect="on"
            class="w-full resize-none rounded-lg border border-gray-200 px-3 py-2 focus:border-transparent focus:ring-2 focus:ring-indigo-400"
        ></textarea>
        <button
            type="submit"
            :disabled="!formIsNotEmpty || commentForm.processing"
            class="rounded-lg bg-indigo-600 px-4 py-2 text-sm text-white hover:bg-indigo-700 disabled:cursor-not-allowed disabled:opacity-50"
        >
            Post
        </button>
    </form>
</template>
