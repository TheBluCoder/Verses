<!-- TabContent.vue -->
<script setup>
import { defineProps } from 'vue';

const props = defineProps({
    activeTab: String, // Current active tab
});
</script>

<template>
    <div class="py-4">
        <div v-if="activeTab === 'drafts'" class="space-y-4">
            <p class="text-gray-600">Your draft poems will appear here</p>
        </div>
        <div v-else-if="activeTab === 'bookmarks'" class="space-y-4">
            <p class="px-2 text-gray-600">
                Your bookmarked poems will appear here
            </p>
        </div>
        <div v-else class="space-y-4">
            <p class="text-gray-600">Your posts will appear here</p>
        </div>
    </div>
</template>
