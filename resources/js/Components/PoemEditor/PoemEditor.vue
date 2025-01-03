<script setup>
import { ref } from 'vue';
import Editor from './Editor.vue';
import CharacterCountComponent from './CharacterCount.vue';
import PrimaryButton from '@/Components/forms/PrimaryButton.vue';
import ConfirmDialog from '@/Components/modals/ConfirmDialog.vue';
import { useForm, usePage } from '@inertiajs/vue3';
import Toolbar from '@/Components/PoemEditor/Toolbar.vue';
import { useToastComposable } from '@/Composables/useToast.js';

let show = ref(false);
let errorMsg = 'Post is empty!';
const characterLimit = 4000;
let editor = ref(null);

const { getToast, errorConfig } = useToastComposable();
const form = useForm({
    title: '',
    content: '',
    published: false,
});

const submit = () => {
    if (editor.value.getText().length > 0) {
        form.title = form.title || 'untitled';
        form.content = editor.value.getHTML();
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
    }
};

let intendedUrl = usePage().url;
</script>
<template>
    <Head title="Create Poem"></Head>

    <div class="container my-8">
        <section
            id="editor"
            class="flex items-center justify-between gap-x-4 rounded-t-lg border-l border-r border-t border-gray-400 px-4 py-2"
        >
            <Toolbar v-if="editor" :editor="editor"></Toolbar>

            <div class="items-center md:flex">
                <primary-button @click="submit">Publish</primary-button>
                <primary-button
                    @click="
                        show = true;
                        intendedUrl = '/';
                    "
                    class="hidden md:block"
                    >Discard</primary-button
                >
            </div>
        </section>
        <form class="w-full focus:border-none" @submit.prevent>
            <input
                class="min-w-1/2 w-full border-b-0 border-gray-400 p-4 font-serif text-xl capitalize lg:text-2xl"
                placeholder="Untitled . . ."
                v-model="form.title"
            />
        </form>
        <Editor
            :character-limit="characterLimit"
            @update:editor="editor = $event"
        />
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
            :value="editor ? editor.getText().length : 0"
        ></progress>
    </div>
    <ConfirmDialog v-model:toggled="show" v-if="show" :intended="intendedUrl" />
</template>
<style scoped>
input:focus,
textarea:focus {
    outline: none !important; /* Force removal */
    box-shadow: none !important; /* Remove any shadows */
    border-color: #9ca3af;
}
</style>
