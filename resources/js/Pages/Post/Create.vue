<script setup>
import PoemEditor from '@/Components/PoemEditor/PoemEditor.vue';
import DefaultLayout from '@/Layouts/DefaultLayout.vue';
import PrimaryButton from '@/Components/forms/PrimaryButton.vue';

defineOptions({
    layout: DefaultLayout,
});
</script>

<template>
    <div><PoemEditor /></div>

</template>

<style scoped></style>
