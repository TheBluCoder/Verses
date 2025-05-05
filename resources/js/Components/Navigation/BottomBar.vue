<script setup>
import { getBottomBarNavItems } from '@/Constants/Navigation.js';
import { useConfirmDialog } from '@/Composables/useConfirmDialog.js';
import ConfirmDialog from '@/Components/Modal/ConfirmDialog.vue';

const { intended, displayConfirmDialog, showConfirmDialog } =
    useConfirmDialog();

const handleCreatePost = () => {
    console.log('Opening create post form');
};
</script>

<template>
    <div
        class="fixed bottom-0 left-0 right-0 z-50 border-t border-gray-100 bg-white md:hidden"
    >
        <nav class="mx-auto max-w-md px-4">
            <ul class="flex h-16 items-center justify-around">
                <li v-for="item in getBottomBarNavItems($page.props.auth)" :key="item.name">
                    <button
                        type="button"
                        class="flex flex-col items-center p-2 text-gray-700 hover:text-indigo-600"
                        @click.prevent="showConfirmDialog(item.path)"
                    >
                        <component :is="item.icon" class="h-6 w-6" />
                        <span class="mt-1 text-xs">{{ item.name }}</span>
                    </button>
                </li>
            </ul>
        </nav>
    </div>
    <ConfirmDialog
        v-model:toggled="displayConfirmDialog"
        v-if="displayConfirmDialog"
        :intended="intended"
    />
</template>
