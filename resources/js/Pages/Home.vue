<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import Poems from '@/Components/Poems.vue';
let props = defineProps({ poems: { type: Object } });

defineOptions({ layout: GuestLayout });
</script>

<template>
    <poems :poems="props.poems"></poems>
</template>
