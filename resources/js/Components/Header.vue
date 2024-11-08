<script setup>
import HeaderButton from '@/Components/HeaderButton.vue';
import Hamburger from '@/Components/Hamburger.vue';
</script>

<template>
    <header class="mb-6 flex items-center justify-between">
        <h1
            class="font-title flex-grow text-center text-xl text-orange-500 md:flex-grow-0 md:text-3xl md:text-neutral-950"
        >
            <slot />
        </h1>
        <div class="f flex items-center gap-4">
            <button class="md:hidden">
                <Hamburger />
            </button>
            <header-button class="bg-purple-700 font-bold text-white" href="#"
                >Get started</header-button
            >
            <header-button
                class="border border-purple-500 font-medium text-purple-500"
                href="/login"
                >Login
            </header-button>
        </div>
    </header>
</template>

<style scoped></style>
