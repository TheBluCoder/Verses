<script setup>
import { useAttrs } from 'vue';

let href = useAttrs().href;
</script>
<template>
    <div
        class="cursor-pointer p-2 transition-all duration-300 hover:bg-gray-100 hover:text-base hover:text-purple-600 focus:border-purple-500 active:bg-purple-500 active:text-white/70"
    >
        <Link class="block h-full w-full" :href="href"><slot /></Link>
    </div>
</template>

<style scoped></style>
