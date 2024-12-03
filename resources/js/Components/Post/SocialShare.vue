<script setup>
import { ClipboardDocumentListIcon } from '@heroicons/vue/24/outline/index.js';
import { defineAsyncComponent, ref } from 'vue';
import JSShare from 'js-share';

let props = defineProps({
    poem: { type: Object, required: true },
    show: { type: Boolean, default: true },
});

const flashModal = defineAsyncComponent(() => import('../flashModal.vue'));
let showFlashModal = ref(false);

const linkUrl = () => {
    return new URL(`/poem/${props.poem.id}`, window.location.href);
};

const copyToClipboard = () => {
    navigator.clipboard.writeText(linkUrl().toString()).then(() => {
        showFlashModal.value = true;
    });
    setTimeout(() => (showFlashModal.value = false), 3000);
};

let sharePoem = (e) => {
    return JSShare.go(e.currentTarget);
};
</script>

<template>
    <Transition
        enter-from-class="opacity-20 scale-50 "
        enter-active-class="opacity-100 scale-1.5 transition-all duration-200"
        leave-to-class="opacity-0 scale-50 duration-200 transition-all"
    >
        <ul
            v-show="show"
            class="flex divide-x divide-gray-400 rounded-lg border border-gray-400"
        >
            <li class="px-2">
                <noscript>
                    <a
                        :href="`https://twitter.com/intent/tweet?text=${encodeURIComponent(poem.title)}&url=${encodeURIComponent(linkUrl)}`"
                        target="_blank"
                        rel="noopener noreferrer"
                        aria-label="Share on Twitter"
                    >
                        <i class="fa-brands fa-x-twitter"></i>
                    </a>
                </noscript>
                <button
                    v-if="typeof JSShare !== 'undefined'"
                    type="button"
                    @click="sharePoem"
                    data-type="twitter"
                    :data-url="linkUrl"
                    :data-title="poem.title"
                >
                    <i class="fa-brands fa-x-twitter"></i>
                </button>
            </li>

            <li class="px-2">
                <noscript>
                    <a
                        :href="`https://api.whatsapp.com/send?text=${encodeURIComponent(poem.title)}&url=${encodeURIComponent(linkUrl)}`"
                        target="_blank"
                        rel="noopener noreferrer"
                        aria-label="Share on Twitter"
                    >
                        <i class="fa-brands fa-whatsapp"></i>
                    </a>
                </noscript>
                <button
                    type="button"
                    @click="sharePoem"
                    class="btn btn-default social_share"
                    data-type="whatsapp"
                    :data-url="linkUrl"
                    :data-title="poem.title"
                >
                    <i class="fa-brands fa-whatsapp"></i>
                </button>
            </li>
            <li class="px-2">
                <noscript>
                    <a
                        :href="`https://pinterest.com/pin/create/button/?url=${encodeURIComponent(poem.title)}&description=${encodeURIComponent(linkUrl)}`"
                        target="_blank"
                        rel="noopener noreferrer"
                        aria-label="Share on Twitter"
                    >
                        <i class="fa-brands fa-pinterest-p"></i>
                    </a>
                </noscript>
                <button
                    @click="sharePoem"
                    class="btn btn-default social_share"
                    data-type="pinterest"
                    :data-url="linkUrl"
                    :data-title="poem.title"
                >
                    <i class="fa-brands fa-pinterest-p"></i>
                </button>
            </li>
            <li class="px-2">
                <button type="button" @click="copyToClipboard">
                    <ClipboardDocumentListIcon class="h-5 w-5" />
                </button>
            </li>
            <flash-modal
                :condition="showFlashModal"
                message="Copied to clipboard"
            />
        </ul>
    </Transition>
</template>

<style scoped></style>
