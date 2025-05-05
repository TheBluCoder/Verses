<script setup>
import { computed, inject, ref } from "vue";
import SocialShare from '@/Components/Post/SocialShare.vue';
import { ChatBubbleLeftIcon } from '@heroicons/vue/24/outline';
import { directive as clickAway } from 'vue3-click-away';
import LikeReaction from '@/Components/LikeReaction.vue';
import EllipsisDropdownOptions from '@/Components/Post/EllipsisDropdownOptions.vue';

const props = defineProps({
    post: {
        type: Object,
        required: true,
    },
});

const ShowShareList = ref(false);

const closeSocialShare = () => {
    ShowShareList.value = false;
};
const guest = inject('guest');
</script>

<template>
    <div class="flex items-center space-x-6 px-4 py-3">
        <!-- Like Button -->
        <button
            class="flex items-center space-x-1 text-gray-600 transition-colors duration-500 hover:text-red-600"
        >
            <LikeReaction
                :resource-id="props.post.id"
                :resource-is-liked="props.post.IsLiked"
                :resource-likes-count="props.post.likesCount"
                resource-type="posts"
            />
        </button>

        <!-- Comment Button -->
        <Link
            v-show="!guest"
            :href="`/posts/${post.id}`"
            class="flex items-center space-x-1 text-gray-600 transition-colors duration-500 hover:text-red-600"
        >
            <ChatBubbleLeftIcon class="h-5 w-5 text-red-500" />
            <span class="text-sm">{{
                props.post.commentCount ?? props.post.comments?.length
            }}</span>
        </Link>

        <!-- Social Share Button -->
        <div class="relative flex gap-x-2" v-click-away="closeSocialShare">
            <button
                v-show="!ShowShareList"
                @click="ShowShareList = true"
                class="text-gray-600 transition-colors duration-500 hover:text-red-600"
            >
                <i
                    class="fa fa-arrow-up-from-bracket social-share-icon group-hover:animate-bounce"
                ></i>
            </button>
            <SocialShare :show="ShowShareList" :poem="post" />
        </div>

        <div v-if="!guest">
            <Teleport :to="'#PostTitle' + post.id" defer>
                <EllipsisDropdownOptions
                    :post-author="post.author.username"
                    :post-id="post.id"
                />
            </Teleport>
        </div>
    </div>
</template>

<style scoped>
.social-share-icon {
    color: mediumpurple;
}
</style>
