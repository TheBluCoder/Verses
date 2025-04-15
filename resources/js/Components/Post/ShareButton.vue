<script setup>
import JSShare from 'js-share';

const props = defineProps({
    type: { type: String, required: true },
    url: { type: String, required: true },
    title: { type: String, required: true },
});

const sharePoem = (e) => {
    return JSShare.go(e.currentTarget);
};
</script>

<template>
    <li
        class="group p-1 transition-all duration-300 hover:bg-orange-300 hover:text-purple-600"
    >
        <noscript>
            <a
                v-if="type === 'twitter'"
                :href="`https://twitter.com/intent/tweet?text=${encodeURIComponent(title)}&url=${encodeURIComponent(url)}`"
                target="_blank"
                rel="noopener noreferrer"
                aria-label="Share on Twitter"
            >
                <i class="fa-brands fa-x-twitter"></i>
                <span class="hidden lg:block">Twitter</span>
            </a>
            <a
                v-else-if="type === 'whatsapp'"
                :href="`https://api.whatsapp.com/send?text=${encodeURIComponent(title)}&url=${encodeURIComponent(url)}`"
                target="_blank"
                rel="noopener noreferrer"
                aria-label="Share on Whatsapp"
            >
                <i class="fa-brands fa-whatsapp mr-2"></i>
                <span class="hidden lg:block">Whatsapp</span>
            </a>
            <a
                v-else-if="type === 'pinterest'"
                :href="`https://pinterest.com/pin/create/button/?url=${encodeURIComponent(title)}&description=${encodeURIComponent(url)}`"
                target="_blank"
                rel="noopener noreferrer"
                aria-label="Share on Pinterest"
            >
                <i class="fa-brands fa-pinterest-p mr-2"></i>
                <span class="hidden lg:block">Pinterest</span>
            </a>
        </noscript>
        <button
            v-if="typeof JSShare !== 'undefined'"
            @click="sharePoem"
            :data-type="type"
            :data-url="url"
            :data-title="title"
            class="flex items-center gap-x-2 lg:w-full lg:px-3 lg:py-1"
        >
            <i
                :class="{
                    'fa-brands fa-x-twitter': type === 'twitter',
                    'fa-brands fa-whatsapp': type === 'whatsapp',
                    'fa-brands fa-pinterest-p': type === 'pinterest',
                }"
            ></i>
            <span class="hidden justify-start capitalize lg:block">{{
                type
            }}</span>
        </button>
    </li>
</template>
