<script setup>
import { ref } from 'vue';
import {
    HomeIcon,
    BookOpenIcon,
    PlusCircleIcon,
    InformationCircleIcon,
} from '@heroicons/vue/24/outline';

const navItems = [
    { name: 'Home', icon: HomeIcon, path: '/' },
    { name: 'Explore', icon: BookOpenIcon, path: '/explore' },
    { name: 'create', icon: PlusCircleIcon, path: '/posts/create' },
    { name: 'About', icon: InformationCircleIcon, path: '/about' },
];

const handleCreatePost = () => {
    console.log('Opening create post form');
};
</script>

<template>
    <!-- Mobile Bottom Navigation -->
    <div
        class="fixed bottom-0 left-0 right-0 z-50 border-t border-gray-100 bg-white md:hidden"
    >
        <nav class="mx-auto max-w-md px-4">
            <ul class="flex h-16 items-center justify-around">
                <li v-for="item in navItems" :key="item.name">
                    <a
                        :href="item.path"
                        class="flex flex-col items-center p-2 text-gray-700 hover:text-indigo-600"
                    >
                        <component :is="item.icon" class="h-6 w-6" />
                        <span class="mt-1 text-xs">{{ item.name }}</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</template>
