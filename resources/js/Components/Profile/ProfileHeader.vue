<script setup>
const props = defineProps({
    displayName: String,
    username: String,
    bio: String,
    profileImage: String,
});
</script>

<template>
    <div class="flex items-start gap-6">
        <!-- Profile Photo -->
        <div class="h-32 w-32 overflow-hidden rounded-full bg-gray-200">
            <img
                :src="props.profileImage"
                :alt="username"
                class="h-full w-full object-cover"
            />
        </div>

        <!-- Profile Info -->
        <div class="flex-1">
            <div class="flex items-start justify-between">
                <div>
                    <h1 class="text-2xl font-bold text-gray-900">{{ props.displayName }}</h1>
                    <p class="text-gray-500">
                        {{ '@' + props.username }}
                    </p>
                </div>
                <button
                    class="rounded-full bg-orange-500 px-4 py-2 text-white transition hover:bg-orange-600"
                >
                    Follow
                </button>
            </div>
            <p class="mt-4 text-gray-700">{{ bio }}</p>
        </div>
    </div>
</template>
