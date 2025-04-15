<script setup>
import { ref } from 'vue';
import { BookmarkIcon, FileEditIcon, NotebookPenIcon } from 'lucide-vue-next';
import TabButton from './TabButton.vue';
import TabContent from './TabContent.vue';

const activeTab = ref('drafts');
const props = defineProps({
    drafts: Number,
    bookmarks: Number,
});
</script>

<template>
    <div>
        <!-- Tab Headers -->
        <div class="flex justify-around gap-1 border-b px-2 py-2">
            <TabButton
                :icon="NotebookPenIcon"
                label="Posts"
                :count="bookmarks"
                :isActive="activeTab === 'Posts'"
                @click="activeTab = 'Posts'"
            />
            <TabButton
                :icon="FileEditIcon"
                label="Drafts"
                :count="drafts"
                :isActive="activeTab === 'drafts'"
                @click="activeTab = 'drafts'"
            />
            <TabButton
                :icon="BookmarkIcon"
                label="Bookmarks"
                :count="bookmarks"
                :isActive="activeTab === 'bookmarks'"
                @click="activeTab = 'bookmarks'"
            />
        </div>

        <!-- Tab Content -->
        <TabContent :activeTab="activeTab" />
    </div>
</template>
