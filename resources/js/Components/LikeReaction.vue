<script setup>
import { HeartIcon as HeartSolidIcon } from '@heroicons/vue/24/solid/index.js';
import { HeartIcon } from '@heroicons/vue/24/outline/index.js';
import { ref } from 'vue';
import { useForm } from '@inertiajs/vue3';

const props = defineProps({
    resourceIsLiked: { type: Boolean, required: true },
    resourceId: { type: Number, required: true },
    resourceLikesCount: { type: Number, required: true },
    resourceType: { type: String, required: true },
});

const resourceIsLiked = ref(props.resourceIsLiked);

const numOfLikes = ref(props.resourceLikesCount);

const likeForm = useForm({
    id: props.resourceId,
});
const formOptions = {
    preserveScroll: true,
    showProgress: false,
};
const likeSubmit = (resourceId) => {
    if (resourceIsLiked.value) {
        likeForm.delete(
            `/${props.resourceType}/${props.resourceId}/like`,
            formOptions,
        );
        numOfLikes.value--;
    } else {
        likeForm.post(`/${props.resourceType}/${resourceId}/like`, formOptions);
        numOfLikes.value++;
    }
    resourceIsLiked.value = !resourceIsLiked.value;
};
</script>

<template>
    <button
        type="button"
        @click.prevent="likeSubmit"
        :disabled="likeForm.processing"
    >
        <component
            :is="resourceIsLiked ? HeartSolidIcon : HeartIcon"
            class="h-5 w-5 text-red-500"
        />
    </button>
    <span v-show="numOfLikes > 0" class="text-sm">{{ numOfLikes }}</span>
</template>

<style scoped></style>
