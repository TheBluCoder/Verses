<script setup>
import { ref, provide } from 'vue';
import ProfileHeader from '@/Components/Profile/ProfileHeader.vue';
import ProfileStats from '@/Components/Profile/ProfileStats.vue';
import PageTab from '@/Components/Profile/PageTab.vue';
import DefaultLayout from '@/Layouts/DefaultLayout.vue';

defineOptions({
    layout: DefaultLayout,
});
const props = defineProps({
    user: Object,
    posts: Object,
});
const user = ref({
    displayName: props.user.displayName,
    username: props.user.username,
    bio: 'Weaving words into tapestries of emotion. Poetry editor @LitMag. Published author of "Midnight Musings"',
    followers: 1234,
    following: 567,
    bookmarks: 89,
    drafts: 12,
    joinDate: 'January 2024',
    profileImage: props.user.profilePic,
});
provide('posts', props.posts);
</script>

<template>
    <div class="mx-auto w-full">
        <!-- Profile Section -->
        <div class="border-b bg-white p-6 shadow-lg">
            <ProfileHeader v-bind="user" />
            <ProfileStats
                :followers="user.followers"
                :following="user.following"
                :joinDate="user.joinDate"
            />
        </div>

        <!-- Content Tabs -->
        <div class="bg-white shadow-md">
            <PageTab
                :draftsCount="user.drafts"
                :bookmarksCount="user.bookmarks"
            />
        </div>

        <!-- Sample Poetry Post -->
    </div>
</template>
