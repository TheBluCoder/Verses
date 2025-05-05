<script setup>
import PoemEditor from '@/Components/PoemEditor/PoemEditor.vue';
import CreatePostLayout from '@/Layouts/CreatePostLayout.vue';
import { useToastComposable } from '@/Composables/useToast.js';

defineOptions({
    layout: CreatePostLayout,
});
const { getToast, errorConfig } = useToastComposable();
let errorMsg = 'Post is empty!';
const submit = (form, editor) => {
    console.log('form', form);
    console.log('editor', editor);
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
    }
};
</script>

<template>
    <div><PoemEditor @submit-form="submit(...$event)" /></div>
</template>

<style scoped></style>
