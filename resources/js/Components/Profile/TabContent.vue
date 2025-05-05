<!-- TabContent.vue -->
<script setup>
import { defineProps, inject } from 'vue';
import Drafts from '@/Components/Draft/Drafts.vue';
import Posts from '@/Components/Post/Posts.vue';
import BookMarks from '@/Components/BookMark/BookMarks.vue';

const props = defineProps({
    activeTab: String, // Current active tab
});

const posts = inject('posts');
const getComponents = () => {
    switch (props.activeTab.toLowerCase()) {
        case 'posts':
            return { component: Posts, props: { posts: posts } };
        case 'bookmarks':
            return { component: BookMarks, props: {} };
        case 'drafts':
            return { component: Drafts, props: {} };
    }
};
</script>

<template>
    <div class="p-4">
        <component
            :is="getComponents().component"
            v-bind="getComponents().props"
            class="px-3"
        />
    </div>
</template>
