<template>
    <div
        class="bottom-toolbar flex items-center justify-between gap-4 border-t border-gray-300 bg-gray-100 p-4"
    >
        <!-- Left Buttons -->
        <div class="flex gap-2">
            <button
                class="base-button"
                :class="{ 'cursor-not-allowed opacity-50': isSaving }"
                :disabled="isSaving"
                @click="handleSave"
                aria-label="Save"
            >
                <i-lucide-save v-if="!isSaving" class="mr-2 h-5 w-5" />
                <i-lucide-loader v-else class="mr-2 h-5 w-5 animate-spin" />
                {{ isSaving ? 'Saving...' : 'Save' }}
            </button>
            <button
                class="base-button"
                @click="handleCollaborate"
                aria-label="Collaborate"
            >
                <i-lucide-share2 class="mr-2 h-5 w-5" />
                Collaborate
            </button>
        </div>

        <!-- Publish Button -->
        <button
            class="base-button bg-blue-600 text-white hover:bg-blue-700 focus:ring-blue-300"
            :class="{ 'cursor-not-allowed opacity-50': isPublishing }"
            :disabled="isPublishing"
            @click="handlePublish"
            aria-label="Publish"
        >
            <i-lucide-send v-if="!isPublishing" class="mr-2 h-5 w-5" />
            <i-lucide-loader v-else class="mr-2 h-5 w-5 animate-spin" />
            {{ isPublishing ? 'Publishing...' : 'Publish' }}
        </button>
    </div>
</template>

<script>
export default {
    props: {
        isSaving: {
            type: Boolean,
            default: false,
        },
        isPublishing: {
            type: Boolean,
            default: false,
        },
    },
    emits: ['save', 'collaborate', 'publish'],
    methods: {
        handleSave() {
            this.$emit('save');
        },
        handleCollaborate() {
            this.$emit('collaborate');
        },
        handlePublish() {
            this.$emit('publish');
        },
    },
};
</script>

<style>
.bottom-toolbar {
    background-color: #f9fafb;
}
.base-button {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 0.5rem;
    border: 1px solid #d1d5db;
    border-radius: 0.375rem;
    padding: 0.5rem 1rem;
    font-size: 0.875rem;
    font-weight: 500;
    box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
    background-color: #ffffff;
    color: #111827;
    transition:
        transform 0.2s,
        background-color 0.3s,
        box-shadow 0.3s;
}
.base-button:hover {
    background-color: #f3f4f6;
}
.base-button:focus {
    outline: none;
    box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.5);
}
.base-button:active {
    transform: scale(0.95);
}
.base-button:disabled {
    pointer-events: none;
}
.animate-spin {
    animation: spin 1s linear infinite;
}
@keyframes spin {
    from {
        transform: rotate(0deg);
    }
    to {
        transform: rotate(360deg);
    }
}
</style>
