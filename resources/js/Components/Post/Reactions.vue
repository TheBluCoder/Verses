<script setup>
import { computed, ref } from 'vue';
import SocialShare from '@/Components/Post/SocialShare.vue';
import { HeartIcon, ChatBubbleLeftIcon } from '@heroicons/vue/24/outline';
import { HeartIcon as HeartSolidIcon } from '@heroicons/vue/24/solid';
import { usePage } from '@inertiajs/vue3';
import { directive as clickAway } from 'vue3-click-away';
const isLiked = ref(false);
// const showSocialShare = ref(false);

defineProps({
    poem: {
        type: Object,
        required: true,
    },
});
let comment = {
    comments: ['comment1', 'comment2', 'comment3'],
};
let ShowShareList = ref(false);
const closeSocialShare = () => {
    ShowShareList.value = false;
};

const isAuthenticated = computed(() => usePage().props.auth.user);
const toggleLike = () => {
    isLiked.value = !isLiked.value;
};
</script>

<template>
    <!-- Like Button -->
    <div class="flex items-center space-x-6 px-4 py-3">
        <button
            @click="toggleLike"
            class="flex items-center space-x-1 text-gray-600 transition-colors duration-500 hover:text-red-600"
        >
            <component
                :is="isLiked ? HeartSolidIcon : HeartIcon"
                class="h-5 w-5"
                :class="{ 'text-red-500': isLiked }"
            />
            <span v-show="poem.likes_count > 0 || isLiked" class="text-sm">{{
                poem.likes_count + (isLiked ? 1 : 0)
            }}</span>
        </button>

        <!-- Comment button -->
        <Link
            v-show="isAuthenticated"
            :href="`/poems/${poem.id}`"
            class="flex items-center space-x-1 text-gray-600 transition-colors duration-500 hover:text-red-600"
        >
            <ChatBubbleLeftIcon class="h-5 w-5" />
            <span class="text-sm">{{ comment.comments.length }}</span>
        </Link>

        <div class="relative flex gap-x-2" v-click-away="closeSocialShare">
            <!-- Share Button -->
            <button
                v-show="!ShowShareList"
                @click="ShowShareList = !ShowShareList"
                class="text-gray-600 transition-colors duration-500 hover:text-red-600 group-hover:mr-2"
            >
                <i class="fa fa-arrow-up-from-bracket"></i>
            </button>

            <!-- Social Share Menu -->
            <SocialShare
                :show="ShowShareList"
                :poem="poem"
                class=""
            ></SocialShare>
        </div>
    </div>
</template>

<style scoped></style>
