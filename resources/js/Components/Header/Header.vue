<script setup>
import HeaderButton from '@/Components/Header/HeaderButton.vue';
import MenuBar from '@/Components/Header/MenuBar.vue';
import { computed } from 'vue';
import { usePage } from '@inertiajs/vue3';
let guest = computed(() => !usePage().props.auth.user?.username);
</script>

<template>
    <header class="relative mb-6 flex items-center justify-between">
        <div class="ml-10"

        >
            <slot />
        </div>
        <div class="f flex items-center gap-4">
<!--            <div class="md:hidden">-->
<!--                <MenuBar />-->
<!--            </div>-->
            <header-button
                v-if="guest"
                class="bg-purple-700 font-bold text-white transition-colors duration-300 hover:bg-purple-600 hover:text-orange-400 active:bg-white active:text-purple-500"
                href="/create-account"
                >Get started</header-button
            >
            <header-button
                v-if="guest"
                class="border border-purple-500 font-medium text-purple-700 transition-colors duration-300 hover:border-orange-500 active:font-bold active:text-purple-700"
                href="/login"
                >Login
            </header-button>
        </div>
    </header>
</template>

<style scoped></style>
