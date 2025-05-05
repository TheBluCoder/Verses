<script setup>
import { ref } from 'vue';

import TabContent from './TabContent.vue';
import TabHeader from '@/Components/Profile/TabHeader.vue';

const activeTab = ref('drafts');
const props = defineProps({
    draftsCount: Number,
    bookmarksCount: Number,
    postsCount: Number,
});
</script>

<template>
    <div>
        <!-- Tab Headers -->
        <TabHeader
            :draftsCount="draftsCount"
            :bookmarksCount="bookmarksCount"
            :postsCount="postsCount"
            @activeTab="activeTab = $event"
        />
        <!-- Tab Content -->
        <TabContent :activeTab="activeTab" />
    </div>
</template>
