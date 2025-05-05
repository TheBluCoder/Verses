<script setup lang="ts">
import dayjs from 'dayjs';
import relativeTime from 'dayjs/plugin/relativeTime';

dayjs.extend(relativeTime);

defineProps({
    author: {
        type: Object,
        required: true,
    },
    content: {
        type: String,
        required: true,
    },
    postedOn: {
        type: String,
        required: true,
    },
});
</script>

<template>
    <div class="rounded-lg bg-gray-50 p-3">
        <div class="flex items-center justify-between">
            <h4 class="text-sm font-medium">{{ author.username }}</h4>
            <span class="text-xs text-gray-500">
        {{ dayjs(postedOn).fromNow() }}
      </span>
        </div>
        <p class="mt-1 text-sm text-gray-800">{{ content }}</p>
    </div>
</template>
