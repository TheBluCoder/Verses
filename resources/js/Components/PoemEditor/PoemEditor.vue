<script setup>
import { EditorContent, useEditor } from '@tiptap/vue-3';
import { StarterKit } from '@tiptap/starter-kit';
import textAlign from '@tiptap/extension-text-align';
import CharacterCount from '@tiptap/extension-character-count';
import CharacterCountComponent from './CharacterCount.vue';
import PrimaryButton from '@/Components/forms/PrimaryButton.vue';
import ConfirmDialog from '@/Components/modals/ConfirmDialog.vue';
import { useForm, usePage } from "@inertiajs/vue3";
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
            class: 'h-[100dvh] focus:outline-none max-h-[100dvh] overflow-auto scrollbar  scrollbar-none ',
        },
        handlePaste(view, event) {
            const clipboardData = event.clipboardData || window.clipboardData;
            const text = clipboardData.getData('text');

            // Insert sanitized text into the editor
            view.dispatch(view.state.tr.insertText(text));
            return true; // Prevent default paste behavior
        },
    },

    content: '',
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
let intendedUrl = usePage().url;
</script>
<template>
    <Head title="Create Poem"></Head>

    <div class="container my-8">
        <section
            id="editor"
            v-if="editor"
            class="flex items-center justify-between gap-x-4 rounded-t-lg border-l border-r border-t border-gray-400 px-4 py-2"
        >
            <Toolbar :editor="editor"></Toolbar>

            <div class="items-center md:flex">
                <primary-button @click="submit(editor)">Publish</primary-button>
                <primary-button @click="show = true; intendedUrl='/'" class="hidden md:block">Discard</primary-button>
            </div>
        </section>
        <form class="w-full focus:border-none" @submit.prevent>
            <input
                class="min-w-1/2 w-full border-b-0 border-gray-400 p-4 font-serif text-xl capitalize lg:text-2xl"
                placeholder="Untitled . . ."
                v-model="form.title"
            />
        </form>
        <EditorContent
            :editor="editor"
            class="mx-auto max-h-[1000px] min-h-[60dvh] overflow-y-auto rounded-b-lg border-x border-b border-gray-400 px-4 py-2"
        ></EditorContent>
    </div>
    <div class="m-auto w-full">
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
    <ConfirmDialog v-model:toggled="show" v-if="show" :intended="intendedUrl"/>
</template>
<style scoped>
input:focus,
textarea:focus {
    outline: none !important; /* Force removal */
    box-shadow: none !important; /* Remove any shadows */
    border-color: #9ca3af;
}
</style>
