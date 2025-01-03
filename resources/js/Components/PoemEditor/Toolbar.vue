<script setup>
import {
    formatButtons,
    alignmentButtons,
    historyButtons,
} from '@/Constants/ToolBarConstants.js';
import ToolBarButtons from '@/Components/PoemEditor/ToolBarButtons.vue';

defineProps({
    editor: { type: Object, required: true }, // Pass the editor instance as a prop
});
</script>

<template>
    <div class="flex items-center gap-x-4">
        <!-- Format Buttons -->
        <template
            v-for="(item, index) in formatButtons"
            :key="'format-' + index"
        >
            <ToolBarButtons
                @click="item.action(editor)"
                :disabled="item.isDisabled?.(editor)"
                :enabled="item.isActive?.(editor)"
            >
                <component :is="item.icon" class="w-4" />
            </ToolBarButtons>
        </template>

        <!-- Alignment Buttons -->
        <div
            class="fixed -left-2 bottom-1/2 z-50 mx-1 flex flex-col rounded-full border border-gray-500 bg-white px-2 py-2 shadow-lg md:left-20 md:border-gray-200 md:shadow-lg lg:static lg:block lg:space-x-4 lg:border-none lg:bg-inherit lg:shadow-none"
        >
            <ToolBarButtons
                v-for="(item, index) in alignmentButtons"
                :key="'align-' + index"
                @click="item.action(editor)"
                :enabled="item.isActive?.(editor)"
            >
                <component :is="item.icon" class="w-4" />
            </ToolBarButtons>
        </div>

        <!-- History Buttons -->
        <template
            v-for="(item, index) in historyButtons"
            :key="'history-' + index"
        >
            <button
                @click="item.action(editor)"
                :disabled="item.isDisabled?.(editor)"
                :class="{
                    'cursor-pointer p-1': true,
                    'text-gray-500': item.isDisabled?.(editor),
                }"
            >
                <component :is="item.icon" class="w-4" />
            </button>
        </template>
    </div>
</template>
