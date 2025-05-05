<script setup>
import { computed, inject } from 'vue';
import { usePage } from '@inertiajs/vue3';
import { getSideBarNavItems, getUserProfile } from '@/Constants/Navigation.js';
import { Link } from '@inertiajs/vue3';
import { LogInIcon, LogOutIcon } from 'lucide-vue-next';
import CreatePostSideBarButtons from '@/Components/Navigation/CreatePostSideBarButtons.vue';

const guest = inject('guest');

const userProfile = computed(() => getUserProfile(usePage().props.auth));
</script>

<template>
    <div
        class="group fixed left-0 top-0 z-50 hidden h-full w-14 flex-col justify-between bg-white shadow-lg transition-all duration-300 md:flex md:hover:w-14 lg:hover:w-64"
    >
        <nav class="py-8">
            <ul>
                <li
                    v-for="item in getSideBarNavItems($page.props.auth)"
                    :key="item.name"
                >
                    <component
                        :is="
                            $page.url === '/posts/create'
                                ? CreatePostSideBarButtons
                                : Link
                        "
                        class="flex w-full items-center overflow-hidden whitespace-nowrap px-4 py-4 text-gray-700 transition-colors duration-200 hover:bg-indigo-50 hover:text-indigo-600"
                        :class="{
                            'bg-indigo-200': $page.component === item.name,
                        }"
                        :href="item.path"
                    >
                        <component :is="item.icon" class="h-6 w-6 shrink-0" />
                        <span
                            class="ml-4 opacity-0 transition-opacity duration-300 group-hover:opacity-100"
                        >
                            {{ item.name }}
                        </span>
                    </component>
                </li>
            </ul>
        </nav>

        <div class="border-t border-gray-100 p-4">
            <div
                v-if="!guest"
                class="mb-4 flex items-center space-x-4 overflow-hidden whitespace-nowrap"
            >
                <img
                    :src="userProfile.avatar"
                    :alt="userProfile.name"
                    class="h-6 w-6 shrink-0 rounded-full"
                />
                <span
                    class="text-sm font-medium text-gray-700 opacity-0 transition-opacity duration-300 group-hover:opacity-100"
                >
                    {{ userProfile.name }}
                </span>
            </div>

            <Link
                :href="guest ? '/login' : 'logout'"
                :method="guest ? 'GET' : 'POST'"
                :as="guest ? 'link' : 'button'"
                v-if="!guest"
                class="mb-4 flex cursor-pointer items-center space-x-4 overflow-hidden whitespace-nowrap"
                :class="{ 'text-red-500': !guest }"
            >
                <component
                    :is="guest ? LogInIcon : LogOutIcon"
                    :alt="userProfile.name"
                    class="h-4 w-6 shrink-0 text-gray-500"
                />
                <span
                    class="hidden text-sm opacity-0 transition-opacity duration-300 group-hover:opacity-100 lg:block"
                >
                    {{ guest ? 'Sign in' : 'Sign out' }}
                </span>
            </Link>
        </div>
    </div>
</template>
