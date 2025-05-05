<script setup>
import { BookmarkIcon, FileEditIcon, NotebookPenIcon } from 'lucide-vue-next';
import { ref } from 'vue';

import TabButton from '@/Components/Profile/TabButton.vue';
const activeTab = ref('drafts');
const emit = defineEmits(['activeTab']);
const handleTabChange = (tab) => {
    activeTab.value = tab;
    emit('activeTab', activeTab.value);
};
const props = defineProps({
    draftsCount: Number,
    bookmarksCount: Number,
    postsCount: Number,
});
</script>
<template>
    <div class="flex justify-around gap-1 border-b px-2 py-2">
        <TabButton
            :icon="NotebookPenIcon"
            label="Posts"
            :count="bookmarksCount"
            :isActive="activeTab === 'posts'"
            @click="handleTabChange('posts')"
        />
        <TabButton
            :icon="FileEditIcon"
            label="Drafts"
            :count="draftsCount"
            :isActive="activeTab === 'drafts'"
            @click="handleTabChange('drafts')"
        />
        <TabButton
            :icon="BookmarkIcon"
            label="Bookmarks"
            :count="bookmarksCount"
            :isActive="activeTab === 'bookmarks'"
            @click="handleTabChange('bookmarks')"
        />
    </div>
</template>

<style scoped></style>
