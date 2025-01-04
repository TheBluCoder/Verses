<script setup>
import { ref } from 'vue';
import { Bookmark, FileEdit, NotebookPenIcon } from 'lucide-vue-next';

const activeTab = ref('drafts');
const props = defineProps({
    drafts: Number,
    bookmarks: Number,
});
</script>

<template>
    <div>
        <!-- Tab Headers -->
        <div class="flex justify-around border-b px-1">
            <button
                @click="activeTab = 'Posts'"
                class="flex items-center gap-2 border-b-2 py-2 text-xs transition-colors"
                :class="
                    activeTab === 'Posts'
                        ? 'border-orange-500 text-orange-500'
                        : 'border-transparent'
                "
            >
                <NotebookPenIcon class="h-3 w-3" />
                <span>Posts</span>
                <span class="text-xs text-purple-600">({{ bookmarks }})</span>
            </button>
            <button
                @click="activeTab = 'drafts'"
                class="flex items-center gap-2 border-b-2 px-4 py-2 text-xs transition-colors"
                :class="
                    activeTab === 'drafts'
                        ? 'border-orange-500 text-orange-500'
                        : 'border-transparent'
                "
            >
                <FileEdit class="h-3 w-3" />
                <span>Drafts</span>
                <span class="text-xs text-purple-600">({{ drafts }})</span>
            </button>
            <button
                @click="activeTab = 'bookmarks'"
                class="flex items-center gap-2 border-b-2 px-4 py-2 text-xs transition-colors"
                :class="
                    activeTab === 'bookmarks'
                        ? 'border-orange-500 text-orange-500'
                        : 'border-transparent'
                "
            >
                <Bookmark class="h-3 w-3" />
                <span>Bookmarks</span>
                <span class="text-xs text-purple-600">({{ bookmarks }})</span>
            </button>
        </div>

        <!-- Tab Content -->
        <div class="py-4">
            <div v-if="activeTab === 'drafts'" class="space-y-4">
                <p class="text-gray-600">Your draft poems will appear here</p>
            </div>
            <div v-else class="space-y-4">
                <p class="text-gray-600">
                    Your bookmarked poems will appear here
                </p>
            </div>
        </div>
    </div>
</template>
