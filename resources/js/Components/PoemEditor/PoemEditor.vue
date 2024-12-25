<script setup>
import { EditorContent, useEditor } from '@tiptap/vue-3';
import { StarterKit } from '@tiptap/starter-kit';
import textAlign from '@tiptap/extension-text-align';
import CharacterCount from '@tiptap/extension-character-count';
import CharacterCountComponent from './CharacterCount.vue';
import PrimaryButton from '@/Components/forms/PrimaryButton.vue';
import ConfirmDialog from '@/Components/modals/ConfirmDialog.vue';
import { useForm } from '@inertiajs/vue3';
import Toolbar from '@/Components/PoemEditor/Toolbar.vue';
import { useToastComposable } from '@/Composables/useToast.js';
import { ref } from 'vue';

let show = ref(false);
let errorMsg = 'Post is empty!';
const characterLimit = 4000;

const { getToast, errorConfig } = useToastComposable();
const form = useForm({
    title: '',
    content: '',
    published: false,
});

const editor = useEditor({
    editorProps: {
        attributes: {
            class: 'border-b border-x border-gray-400 rounded-b-lg py-2 px-4  min-h-[60dvh] max-h-[1000px] overflow-y-auto mx-auto focus:outline-none ',
        },
        handlePaste(view, event) {
            const clipboardData = event.clipboardData || window.clipboardData;
            const text = clipboardData.getData('text');

            // Insert sanitized text into the editor
            view.dispatch(view.state.tr.insertText(text));
            return true; // Prevent default paste behavior
        },
    },

    comment: '',
    extensions: [
        StarterKit.configure({
            paragraph: {
                HTMLAttributes: {
                    style: 'margin: 0; line-height: 1.4;', // Inline styles for custom spacing
                },
            },
        }),
        textAlign.configure({
            types: ['heading', 'paragraph'],
        }),
        CharacterCount.configure({
            limit: characterLimit,
        }),
    ],
});
const submit = (editor) => {
    if (editor.getText().length > 0) {
        form.title = form.title || 'untitled';
        form.content = editor.getHTML();
        form.published = true;

        form.post('/posts', {
            onSuccess: () => {
                console.log('success');
            },
            onError: async () => {
                const toast = await getToast();
                toast(errorMsg, errorConfig);
            },
        });
    } else {
        console.log(typeof editor);
    }
};
</script>
<template>
    <Head title="Create Poem"></Head>

    <div class="container mx-auto my-8 max-w-4xl">
        <section
            id="editor"
            v-if="editor"
            class="flex items-center justify-between gap-x-4 rounded-t-lg border-l border-r border-t border-gray-400 px-4 py-2"
        >
            <Toolbar :editor="editor"></Toolbar>

            <div class="flex items-center">
                <primary-button @click="submit(editor)">Publish</primary-button>
                <primary-button @click="show = true">Discard</primary-button>
            </div>
        </section>
        <form class="w-full focus:border-none" @submit.prevent>
            <input
                class="min-w-1/2 w-full border-b-0 border-gray-400 p-4 font-serif text-xl capitalize lg:text-2xl"
                placeholder="Untitled . . ."
                v-model="form.title"
            />
        </form>
        <EditorContent :editor="editor"></EditorContent>
    </div>
    <div class="m-auto w-full max-w-4xl">
        <character-count-component
            v-if="editor"
            :character-limit="characterLimit"
            :editor="editor"
        />
        <progress
            v-if="editor"
            class="h-1 w-full rounded-lg"
            :max="characterLimit"
            :value="editor.getText().length"
        ></progress>
    </div>
    <ConfirmDialog v-model:toggled="show" v-if="show" />
</template>
<style scoped>
input:focus,
textarea:focus {
    outline: none !important; /* Force removal */
    box-shadow: none !important; /* Remove any shadows */
    border-color: #9ca3af;
}
</style>
