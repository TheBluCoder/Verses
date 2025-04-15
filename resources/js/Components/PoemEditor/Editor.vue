<script setup>
import { EditorContent, useEditor } from '@tiptap/vue-3';
import { StarterKit } from '@tiptap/starter-kit';
import textAlign from '@tiptap/extension-text-align';
import CharacterCount from '@tiptap/extension-character-count';
import { onMounted, onUnmounted } from 'vue';

const props = defineProps({
    characterLimit: {
        type: Number,
        required: true,
    },
    modelValue: {
        type: String,
        default: '',
    },
});

const emit = defineEmits(['update:editor']);

const editor = useEditor({
    editorProps: {
        attributes: {
            class: 'h-[70dvh] focus:outline-none max-h-[80dvh] overflow-auto scrollbar scrollbar-none',
        },
        // handlePaste(view, event) {
        //     const clipboardData = event.clipboardData || window.clipboardData;
        //     const text = clipboardData.getData('text');
        //     view.dispatch(view.state.tr.insertText(text));
        //     return true;
        // },
    },
    content: props.modelValue,
    extensions: [
        StarterKit.configure({
            paragraph: {
                HTMLAttributes: {
                    style: 'margin: 0; line-height: 1.4;',
                },
            },
            keyboardShortcuts: {
                'Mod-a': ({ editor }) => {
                    editor.commands.selectAll();
                    return true;
                },
            },
        }),
        textAlign.configure({
            types: ['heading', 'paragraph'],
        }),
        CharacterCount.configure({
            limit: props.characterLimit,
        }),
    ],
    onUpdate: () => {
        emit('update:editor', editor.value);
    },
});

onMounted(() => {
    if (editor.value) {
        emit('update:editor', editor.value);
    }
});

onUnmounted(() => {
    editor.value?.destroy();
});
</script>

<template>
    <EditorContent
        :editor="editor"
        class="mx-auto max-h-[1000px] min-h-[60dvh] overflow-y-auto rounded-b-lg border-x border-b border-gray-400 px-4 py-2 focus:outline-none"
    />
</template>
