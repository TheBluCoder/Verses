<script setup>
import { usePage } from '@inertiajs/vue3';
import Reactions from '@/Components/Post/Reactions.vue';
import dayjs from 'dayjs';
import relativeTime from 'dayjs/plugin/relativeTime';

dayjs.extend(relativeTime);

defineProps({ poem: { type: Object, required: true } });
</script>

<template>
    <div class="mb-14 border-b pb-2">
        <section>
            <!--            Post content -->
            <div>
                <h2
                    class="text-2xl font-semibold text-neutral-950"
                    v-text="poem?.title"
                ></h2>
                <pre
                    class="li mt-4 w-full text-wrap font-sans text-lg font-light leading-relaxed text-neutral-700"
                    :class="{ 'line-clamp-5': usePage().component === 'Home' }"
                    v-html="poem.content"
                ></pre>

                <div v-if="usePage().component === 'Home'">
                    <Link
                        :href="`/poems/${poem.id}`"
                        class="mt-4 inline-block font-medium text-purple-700"
                        >Read more</Link
                    >
                </div>
            </div>

            <!--            Author section -->
            <div class="flex items-center justify-between">
                <div class="flex gap-4 text-center">
                    <div class="my-2 rounded-full">
                        <img
                            :src="poem?.author?.profilePic"
                            alt="Random Image"
                            class="rounded-full"
                        />
                    </div>
                    <div class="self-center text-start">
                        <p class="capitalize">
                            {{ poem?.author?.username }}
                        </p>
                        <p class="text-start text-sm capitalize text-gray-500">
                            {{ dayjs(poem.published).fromNow() }}
                        </p>
                    </div>
                </div>

                <!--      Reactions section (likes, comment , share)    -->
                <div>
                    <Reactions :poem="poem"></Reactions>
                </div>
            </div>
        </section>
    </div>
</template>

<style scoped></style>
