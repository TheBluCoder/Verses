<script setup>
import { Link } from '@inertiajs/vue3';
</script>

<template>
    <Link
        class="hidden items-center rounded-2xl px-6 py-2 md:flex md:space-x-1.5 md:text-base"
        as="button"
    >
        <slot />
        <slot name="icon" />
    </Link>
</template>

<style scoped></style>
