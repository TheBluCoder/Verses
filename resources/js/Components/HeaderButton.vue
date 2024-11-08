<script setup>
import { Link } from '@inertiajs/vue3';
</script>

<template>
    <Link
        class="hidden rounded-2xl px-6 py-2 text-base md:block md:text-sm"
        as="button"
    >
        <slot />
    </Link>
</template>

<style scoped></style>
