<script setup>
import {
    BoldIcon,
    ItalicIcon,
    StrikethroughIcon,
    AlignCenterIcon,
    AlignRightIcon,
    AlignLeftIcon,
    AlignJustifyIcon,
    RedoDotIcon,
    UndoDotIcon,
} from 'lucide-vue-next';
import ToolBarButtons from '@/Components/PoemEditor/ToolBarButtons.vue';

defineProps({
    editor: { type: Object, required: true }, // Pass the editor instance as a prop
});
</script>

<template>
    <div class="flex items-center gap-x-4">
        <ToolBarButtons
            @click="editor.chain().focus().toggleBold().run()"
            :disabled="!editor.can().chain().focus().toggleBold().run()"
            :enabled="editor.isActive('bold')"
        >
            <BoldIcon class="w-4" />
        </ToolBarButtons>

        <ToolBarButtons
            @click="editor.chain().focus().toggleItalic().run()"
            :disabled="!editor.can().chain().focus().toggleItalic().run()"
            :enabled="editor.isActive('italic')"
        >
            <ItalicIcon class="w-4" />
        </ToolBarButtons>

        <ToolBarButtons
            @click="editor.chain().focus().toggleStrike().run()"
            :disabled="!editor.can().chain().focus().toggleStrike().run()"
            :enabled="editor.isActive('strike')"
        >
            <StrikethroughIcon class="w-4" />
        </ToolBarButtons>

        <!-- Text Align Buttons -->
        <ToolBarButtons
            @click="editor.chain().focus().setTextAlign('left').run()"
            :enabled="editor.isActive({ textAlign: 'left' })"
        >
            <AlignLeftIcon class="w-4" />
        </ToolBarButtons>

        <ToolBarButtons
            @click="editor.chain().focus().setTextAlign('center').run()"
            :enabled="editor.isActive({ textAlign: 'center' })"
        >
            <AlignCenterIcon class="w-4" />
        </ToolBarButtons>

        <ToolBarButtons
            @click="editor.chain().focus().setTextAlign('right').run()"
            :enabled="editor.isActive({ textAlign: 'right' })"
        >
            <AlignRightIcon class="w-4" />
        </ToolBarButtons>

        <ToolBarButtons
            @click="editor.chain().focus().setTextAlign('justify').run()"
            :enabled="editor.isActive({ textAlign: 'justify' })"
        >
            <AlignJustifyIcon class="w-4" />
        </ToolBarButtons>

        <!-- Undo/Redo -->
        <button
            @click="editor.chain().focus().redo().run()"
            :disabled="!editor.can().redo()"
            :class="{
                'cursor-pointer p-1': true,
                'text-gray-500': !editor.can().redo(),
            }"
        >
            <RedoDotIcon class="w-4" />
        </button>

        <button
            @click="editor.chain().focus().undo().run()"
            :disabled="!editor.can().undo()"
            :class="{
                'cursor-pointer p-1': true,
                'text-gray-500': !editor.can().undo(),
            }"
        >
            <UndoDotIcon class="w-4" />
        </button>
    </div>
</template>
