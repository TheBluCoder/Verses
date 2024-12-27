<script setup>
import { computed } from 'vue';
import {
    HomeIcon,
    UserCircleIcon,
    MagnifyingGlassIcon,
    InformationCircleIcon,
    ArrowRightEndOnRectangleIcon,
} from '@heroicons/vue/24/outline';
import { usePage } from '@inertiajs/vue3';

const isLoggedIn = computed(() => usePage().props.auth.user ?? false); // This would normally come from your auth state

const navItems = [
    { name: 'Home', icon: HomeIcon, path: '/' },
    { name: 'Explore', icon: MagnifyingGlassIcon, path: '/explore' },
    { name: 'Account Settings', icon: UserCircleIcon, path: '/settings' },
    { name: 'About', icon: InformationCircleIcon, path: '/about' },
];

const userProfile = {
    name: usePage().props.auth.user?.username,
    avatar: usePage().props.auth.user?.profilePic,
};
</script>

<template>
    <div
        class="group fixed left-0 top-0 z-50 hidden h-full w-14 flex-col justify-between bg-white shadow-lg transition-all duration-300 md:flex md:hover:w-14 lg:hover:w-64"
    >
        <!-- Navigation Items -->
        <nav class="py-8">
            <ul class="space-y-2">
                <li v-for="item in navItems" :key="item.name">
                    <Link
                        :href="item.path"
                        class="flex items-center overflow-hidden whitespace-nowrap px-4 py-3 text-gray-700 transition-colors duration-200 hover:bg-indigo-50 hover:text-indigo-600"
                        :class="{
                            'bg-indigo-200': $page.component === item.name,
                        }"
                    >
                        <component :is="item.icon" class="h-6 w-6 shrink-0" />
                        <span
                            class="ml-4 opacity-0 transition-opacity duration-300 group-hover:opacity-100"
                        >
                            {{ item.name }}
                        </span>
                    </Link>
                </li>
            </ul>
        </nav>

        <!-- User Section -->
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

            <Link
                :method="isLoggedIn ? 'POST' : 'GET'"
                :as="isLoggedIn ? 'button' : 'link'"
                :href="isLoggedIn ? '/logout' : '/login'"
                class="flex cursor-pointer items-center overflow-hidden whitespace-nowrap rounded-lg px-2 py-3 text-gray-700 transition-colors duration-200 hover:bg-indigo-50 hover:text-indigo-600"
            >
                <ArrowRightEndOnRectangleIcon class="h-6 w-6 shrink-0" />
                <span
                    class="ml-4 opacity-0 transition-opacity duration-300 group-hover:opacity-100"
                >
                    {{ isLoggedIn ? 'Sign Out' : 'Sign In' }}
                </span>
            </Link>
        </div>
    </div>
</template>
