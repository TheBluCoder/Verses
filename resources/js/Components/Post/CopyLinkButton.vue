<script setup>
import { ClipboardDocumentListIcon } from '@heroicons/vue/24/outline/index.js';
import { ref } from 'vue';
import FlashModal from '@/Components/Modal/FlashModal.vue';

const props = defineProps({
    url: { type: String, required: true },
});

const showFlashModal = ref(false);

const copyToClipboard = () => {
    navigator.clipboard.writeText(props.url).then(() => {
        showFlashModal.value = true;
    });
    setTimeout(() => (showFlashModal.value = false), 3000);
};
</script>

<template>
    <li
        class="group transition-all duration-300 hover:bg-orange-300 hover:text-purple-600"
    >
        <button
            type="button"
            @click="copyToClipboard"
            class="flex items-center gap-x-2 lg:px-3 lg:py-1"
        >
            <ClipboardDocumentListIcon class="mr-2 h-5 w-5" />
            <span class="hidden lg:block">Copy</span>
        </button>
        <FlashModal :condition="showFlashModal" message="Copied to clipboard" />
    </li>
</template>
