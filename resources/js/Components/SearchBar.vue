<script setup>
import { ref } from 'vue';
import { MagnifyingGlassIcon } from '@heroicons/vue/24/outline';

const searchQuery = ref('');

const handleSearch = () => {
    // TODO: Implement search functionality
    console.log('Searching for:', searchQuery.value);
};
</script>

<template>
    <div class="mx-auto max-w-2xl">
        <form @submit.prevent="handleSearch" class="relative">
            <div class="relative">
                <MagnifyingGlassIcon
                    class="absolute left-4 top-1/2 h-5 w-5 -translate-y-1/2 transform text-gray-400"
                />
                <input
                    v-model="searchQuery"
                    type="text"
                    placeholder="Search for poems, poets, or topics..."
                    class="w-full rounded-full border border-gray-200 py-3 pl-12 pr-4 text-gray-600 placeholder-gray-400 shadow-sm focus:border-transparent focus:ring-1 focus:ring-orange-500"
                />
            </div>
        </form>
    </div>
</template>
