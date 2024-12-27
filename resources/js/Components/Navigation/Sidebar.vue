<script setup>
import { computed } from 'vue';
import { usePage } from '@inertiajs/vue3';
import { navItems, getUserProfile } from '@/Constants/Navigation.js';
import { useConfirmDialog } from '@/Composables/useConfirmDialog.js';
import ConfirmDialog from '@/Components/modals/ConfirmDialog.vue';

const { intended, displayConfirmDialog, showConfirmDialog } =
    useConfirmDialog();

const isLoggedIn = computed(() => usePage().props.auth.user ?? false);
const userProfile = computed(() => getUserProfile(usePage().props.auth));
</script>

<template>
    <div
        class="group fixed left-0 top-0 z-50 hidden h-full w-14 flex-col justify-between bg-white shadow-lg transition-all duration-300 md:flex md:hover:w-14 lg:hover:w-64"
    >
        <nav class="py-8">
            <ul>
                <li v-for="item in navItems" :key="item.name">
                    <button
                        type="button"
                        class="flex w-full items-center overflow-hidden whitespace-nowrap px-4 py-4 text-gray-700 transition-colors duration-200 hover:bg-indigo-50 hover:text-indigo-600"
                        :class="{
                            'bg-indigo-200': $page.component === item.name,
                        }"
                        @click.prevent="showConfirmDialog(item.path)"
                    >
                        <component :is="item.icon" class="h-6 w-6 shrink-0" />
                        <span
                            class="ml-4 opacity-0 transition-opacity duration-300 group-hover:opacity-100"
                        >
                            {{ item.name }}
                        </span>
                    </button>
                </li>
            </ul>
        </nav>

        <div class="border-t border-gray-100 p-4">
            <div
                v-if="isLoggedIn"
                class="mb-4 flex items-center space-x-4 overflow-hidden whitespace-nowrap"
            >
                <img
                    :src="userProfile.avatar"
                    :alt="userProfile.name"
                    class="h-6 w-6 shrink-0 rounded-full"
                />
                <span
                    class="font-medium text-gray-700 opacity-0 transition-opacity duration-300 group-hover:opacity-100"
                >
                    {{ userProfile.name }}
                </span>
            </div>
        </div>
    </div>
    <ConfirmDialog
        v-model:toggled="displayConfirmDialog"
        v-if="displayConfirmDialog"
        :intended="intended"
    />
</template>
