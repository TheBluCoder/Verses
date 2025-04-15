<script setup>
import { ref } from 'vue';
import ProfileHeader from '@/Components/Profile/ProfileHeader.vue';
import ProfileStats from '@/Components/Profile/ProfileStats.vue';
import PageTab from '@/Components/Profile/PageTab.vue';
import DefaultLayout from '@/Layouts/DefaultLayout.vue';

defineOptions({
    layout: DefaultLayout,
});

const user = ref({
    name: 'Sarah Parker',
    username: '@versesbyparker',
    bio: 'Weaving words into tapestries of emotion. Poetry editor @LitMag. Published author of "Midnight Musings"',
    followers: 1234,
    following: 567,
    bookmarks: 89,
    drafts: 12,
    joinDate: 'January 2024',
    profileImage: 'https://placekitten.com/200/200',
});
</script>

<template>
    <div class="mx-auto lg:max-w-4xl">
        <!-- Profile Section -->
        <div class="border-b bg-white p-6 shadow-md">
            <ProfileHeader v-bind="user" />
            <ProfileStats
                :followers="user.followers"
                :following="user.following"
                :joinDate="user.joinDate"
            />
        </div>

        <!-- Content Tabs -->
        <div class="bg-white shadow-md">
            <PageTab :drafts="user.drafts" :bookmarks="user.bookmarks" />
        </div>

        <!-- Sample Poetry Post -->
    </div>
</template>
