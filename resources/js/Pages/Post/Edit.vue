<script setup>
import PoemEditor from '@/Components/PoemEditor/PoemEditor.vue';
import CreatePostLayout from '@/Layouts/CreatePostLayout.vue';
import { useToastComposable } from '@/Composables/useToast.js';

defineOptions({
    layout: CreatePostLayout,
});

const props = defineProps({
    post: {
        type: Object,
        required: true,

        validator: (value) => {
            return 'title' in value && 'content' in value;
        },
    },
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

        form.patch(`/posts/${props.post.id}`, {
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
    <div>
        <PoemEditor :initial-content="post" @submit-form="submit(...$event)" />
    </div>
</template>

<style scoped></style>
