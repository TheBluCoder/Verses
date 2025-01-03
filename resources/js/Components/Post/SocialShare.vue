<script setup>
import ShareButton from './ShareButton.vue';
import CopyLinkButton from './CopyLinkButton.vue';

let props = defineProps({
    poem: { type: Object, required: true },
    show: { type: Boolean, default: true },
});

const linkUrl = new URL(`/posts/${props.poem.id}`, window.location.href);
</script>

<template>
    <Transition
        enter-from-class="opacity-20 scale-50 "
        enter-active-class="opacity-100 scale-1.5 transition-all duration-300"
        leave-from-class="opacity-100 scale-100"
        leave-active-class="transition-all duration-300 ease-out"
        leave-to-class="opacity-0 scale-50"
    >
        <ul
            v-show="show"
            class="z-50 flex divide-x rounded-lg border border-red-300 bg-white shadow-2xl lg:absolute lg:-translate-y-5 lg:flex-col lg:divide-x-0 lg:divide-y"
        >
            <ShareButton
                type="twitter"
                :url="linkUrl.toString()"
                :title="poem.title + '\n'"
            />
            <ShareButton
                type="whatsapp"
                :url="linkUrl.toString()"
                :title="poem.title + '\n'"
            />
            <ShareButton
                type="pinterest"
                :url="linkUrl.toString()"
                :title="poem.title + '\n'"
            />
            <CopyLinkButton :url="linkUrl.toString()" />
        </ul>
    </Transition>
</template>

<style scoped></style>
