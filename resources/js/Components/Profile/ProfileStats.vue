<script setup>
defineProps({
    followers: Number,
    following: Number,
    joinDate: String,
});
import { CalendarDaysIcon } from 'lucide-vue-next';
</script>

<template>
    <div class="mt-2 items-center gap-6 text-sm text-gray-600">
        <div class="gapx-1 my-1 flex items-center gap-1 text-xs text-gray-500">
            <calendar-days-icon size="15" />
            <span>Joined {{ joinDate }}</span>
        </div>
        <div class="flex items-center gap-6">
            <div class="flex items-center gap-1">
                <span class="font-semibold text-gray-900">{{ followers }}</span>
                <span>Followers</span>
            </div>
            <div class="flex items-center gap-1">
                <span class="font-semibold text-gray-900">{{ following }}</span>
                <span>Following</span>
            </div>
        </div>
    </div>
</template>
