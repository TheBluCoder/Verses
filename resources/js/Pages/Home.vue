<script setup>
import GuestLayout from '@/Layouts/DefaultLayout.vue';
import Poems from '@/Components/Post/Poems.vue';
let props = defineProps({ poems: { type: Object } });

defineOptions({ layout: GuestLayout });
</script>

<template>
    <poems :poems="props.poems"></poems>
</template>
