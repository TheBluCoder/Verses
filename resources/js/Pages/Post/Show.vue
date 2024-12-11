<script setup>
import GuestLayout from '@/Layouts/DefaultLayout.vue';
import Poem from '@/Components/Post/Poem.vue';
import CommentSection from '@/Components/Comments/CommentList.vue';
defineOptions({ layout: GuestLayout });
var props = defineProps({
    poem: {
        type: Object,
        required: true,
    },
});
</script>

<template>
    <Poem :poem="props.poem"></Poem>
    <CommentSection :comments="poem.comments"></CommentSection>
</template>

<style scoped></style>
