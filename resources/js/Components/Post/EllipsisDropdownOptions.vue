<script setup>
import {
    Ban,
    Bookmark,
    Edit,
    DeleteIcon,
    EllipsisIcon,
    UserPlus2,
} from 'lucide-vue-next';
import { inject, ref } from 'vue';
import { directive as clickAway } from 'vue3-click-away';
import { usePage } from '@inertiajs/vue3';

const props = defineProps({
    postId: {
        type: Number,
        required: true,
    },
    postAuthor: {
        type: String,
        required: true,
    },
});
let show = ref(false);

const ellipsisOptions = [
    {
        option: 'Edit',
        icon: Edit,
        id: 1,
        href: `/posts/${props.postId}/edit`,
        method: 'get',
        class: {
            hidden: usePage().props.auth.user.username !== props.postAuthor,
        },
    },
    {
        option: 'Bookmark',
        icon: Bookmark,
        id: 2,
        href: `/posts/${props.postId}/bookmark`,
        method: 'post',
    },
    {
        option: 'Block',
        icon: Ban,
        id: 3,
        href: `/users/${props.postAuthor}/block`,
        method: 'post',
    },
    {
        option: 'follow',
        icon: UserPlus2,
        id: 4,
        href: `/users/${props.postAuthor}/follow`,
        method: 'post',
    },
    {
        option: 'Delete',
        icon: DeleteIcon,
        id: 5,
        href: `/posts/${props.postId}`,
        method: 'delete',
        class: {
            hidden: usePage().props.auth.user.username !== props.postAuthor,
        },
    },
];
</script>

<template>
    <div
        class="relative"
        :class="{ 'flex-shrink-0': show }"
        v-click-away="() => (show = false)"
    >
        <TransitionGroup
            :class="{
                'absolute right-0 z-50 min-w-[100px] divide-y-2 rounded-md border-2 bg-white shadow-xl':
                    show,
            }"
            tag="ul"
            enter-from-class="opacity-20 scale-50 "
            enter-active-class="opacity-100 scale-1.5 transition-all duration-300"
            leave-from-class="opacity-100 scale-100"
            leave-active-class="transition-all duration-300 ease-out absolute"
            leave-to-class="opacity-0 scale-50"
        >
            <li
                v-show="!show"
                class="p-1 text-gray-500 hover:cursor-pointer hover:rounded-full hover:border"
                @click="show = !show"
                :key="1"
            >
                <EllipsisIcon size="16"></EllipsisIcon>
            </li>
            <li
                v-for="option in ellipsisOptions"
                :key="option.id"
                class="p-1 font-sans text-sm text-gray-600 hover:cursor-pointer hover:bg-gray-100"
                v-show="show"
                :class="option?.class"
            >
                <Link
                    :href="option.href"
                    :method="option.method"
                    as="button"
                    class="space-x-2"
                >
                    <component
                        :is="option.icon"
                        class="inline text-blue-500"
                        size="16px"
                    />
                    <span class="align-text-top text-blue-800">{{
                        option.option
                    }}</span>
                </Link>
            </li>
        </TransitionGroup>
    </div>
</template>

<style scoped></style>
