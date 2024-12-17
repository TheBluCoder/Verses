<script setup>
import { EditorContent, useEditor } from '@tiptap/vue-3';
import { StarterKit } from '@tiptap/starter-kit';
import textAlign from '@tiptap/extension-text-align';
import CharacterCount from '@tiptap/extension-character-count';

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
import PrimaryButton from '@/Components/forms/PrimaryButton.vue';

const characterLimit = 1000;
const editor = useEditor({
    editorProps: {
        attributes: {
            class: 'border-b border-x border-gray-900 rounded-b-lg py-2 px-4 prose min-h-80 max-h-80 overflow-y-auto lg:prose xl:prose-xl mx-auto focus:outline-none ',
        },
        // transformPastedText(text) {
        //     return text.toUpperCase();
        // },
    },

    content: '<p>I’m running Tiptap with Vue.js. 🎉</p>',
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
            limit: characterLimit, // sets a thousand character limit
        }),
    ],
});
</script>
<template>
    <Head title="Create Poem"></Head>

    <div class="container mx-auto my-8 max-w-4xl">
        <section
            id="editor-menu"
            v-if="editor"
            class="flex flex-wrap items-center justify-between gap-x-4 rounded-t-lg border-l border-r border-t border-gray-800 px-4 py-2"
        >
            <div class="flex flex-wrap items-center gap-x-4">
                <button
                    @click="editor.chain().focus().toggleBold().run()"
                    :disabled="!editor.can().chain().focus().toggleBold().run()"
                    :class="{ 'bg-indigo-100': editor.isActive('bold') }"
                    class="rounded-md p-1 text-sm hover:bg-gray-200"
                >
                    <BoldIcon class="m-auto w-3/4" />
                </button>

                <button
                    class="rounded-md p-1 text-sm hover:bg-gray-200"
                    @click="editor.chain().focus().toggleItalic().run()"
                    :disabled="
                        !editor.can().chain().focus().toggleItalic().run()
                    "
                    :class="{ 'bg-indigo-100': editor.isActive('italic') }"
                >
                    <ItalicIcon class="m-auto w-3/4" />
                </button>

                <button
                    class="rounded-md p-1 text-sm hover:bg-gray-200"
                    @click="editor.chain().focus().toggleStrike().run()"
                    :disabled="
                        !editor.can().chain().focus().toggleStrike().run()
                    "
                    :class="{ 'bg-indigo-100': editor.isActive('strike') }"
                >
                    <StrikethroughIcon class="m-auto w-3/4" />
                </button>
                <button
                    class="rounded-md p-1 text-sm hover:bg-gray-200"
                    @click="editor.chain().focus().setTextAlign('left').run()"
                    :class="{
                        'bg-indigo-100': editor.isActive({ textAlign: 'left' }),
                    }"
                >
                    <AlignLeftIcon class="m-auto w-3/4" />
                </button>

                <button
                    class="rounded-md p-1 text-sm hover:bg-gray-200"
                    @click="editor.chain().focus().setTextAlign('center').run()"
                    :class="{
                        'bg-indigo-100': editor.isActive({
                            textAlign: 'center',
                        }),
                    }"
                >
                    <AlignCenterIcon class="m-auto w-3/4" />
                </button>
                <button
                    class="rounded-md p-1 text-sm hover:bg-gray-200"
                    @click="editor.chain().focus().setTextAlign('right').run()"
                    :class="{
                        'bg-indigo-100': editor.isActive({
                            textAlign: 'right',
                        }),
                    }"
                >
                    <AlignRightIcon class="m-auto w-3/4" />
                </button>
                <button
                    class="rounded-md p-1 text-sm hover:bg-gray-200"
                    @click="
                        editor.chain().focus().setTextAlign('justify').run()
                    "
                    :class="{
                        'bg-indigo-100': editor.isActive({
                            textAlign: 'justify',
                        }),
                    }"
                >
                    <AlignJustifyIcon />
                </button>
                <div class="flex items-center gap-x-4">
                    <button
                        class="cursor-pointer rounded-md p-1 text-sm hover:bg-gray-200"
                        @click="editor.chain().focus().undo().run()"
                        :disabled="!editor.can().undo()"
                        :class="{ 'text-gray-400': !editor.can().undo() }"
                    >
                        <RedoDotIcon class="m-auto w-3/4" />
                    </button>
                    <button
                        class="cursor-pointer rounded-md p-1 text-sm hover:bg-gray-200"
                        @click="editor.chain().focus().redo().run()"
                        :disabled="!editor.can().redo()"
                        :class="{ 'text-gray-400': !editor.can().redo() }"
                    >
                        <UndoDotIcon class="m-auto w-3/4" />
                    </button>
                </div>
            </div>
        </section>
        <form class="w-full focus:border-none">
            <input
                class="min-w-1/2 w-full border-b-0 border-gray-800 p-4 font-serif text-xl capitalize lg:text-2xl"
                placeholder="Poem Title . . ."
            />
        </form>
        <EditorContent :editor="editor"></EditorContent>
    </div>
    <div
        v-if="editor"
        :class="{
            'text-xs': true,
            'text-gray-500': editor.storage.characterCount.characters() < 700,
            'text-orange-600': editor.storage.characterCount.characters() < 900,
            'text-red-500':
                editor.storage.characterCount.characters() === characterLimit,
        }"
    >
        {{ editor.storage.characterCount.characters() + '/' + characterLimit }}
        chars
    </div>
    <div class="w-full border"></div>

    <teleport defer to="#editor-menu">
        <div class="flex-wrap items-center gap-x-4">
            <PrimaryButton>Publish</PrimaryButton>
        </div>
    </teleport>
</template>
<style scoped>
input:focus,
textarea:focus {
    outline: none !important; /* Force removal */
    box-shadow: none !important; /* Remove any shadows */
    border-color: black;
}
</style>
