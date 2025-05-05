<script setup>
import { usePage } from '@inertiajs/vue3';
import { provide } from 'vue';
import PostActions from '@/Components/Post/PostActions.vue';
import dayjs from 'dayjs';
import utc from 'dayjs-plugin-utc';
import timezone from 'dayjs-timezone-iana-plugin';

import relativeTime from 'dayjs/plugin/relativeTime';

dayjs.extend(relativeTime);
dayjs.extend(utc);
dayjs.extend(timezone);

const userTimezone = Intl.DateTimeFormat().resolvedOptions().timeZone || 'UTC';
console.log(userTimezone);

const props = defineProps({
    post: { type: Object, required: true },
    showCondition: {
        type: Function,
        required: false,
    },
});

const showFull = usePage().component.toLowerCase() === 'post/show';
provide('post', props.post);
</script>

<template>
    <div class="group m-8 border-b pb-2">
        <section>
            <!--            Post content -->
            <div>
                <h2
                    :id="'PostTitle' + post.id"
                    class="flex justify-between font-serif text-xl text-neutral-950 md:text-2xl lg:text-3xl"
                    v-html="post?.title"
                ></h2>
                <pre
                    class="mt-4 line-clamp-[10] w-full text-wrap font-sans text-neutral-700 md:text-lg lg:text-xl"
                    :class="{
                        'line-clamp-none': showFull,
                    }"
                    v-html="post.content"
                ></pre>

                <div v-show="usePage().component.toLowerCase() !== 'post/show'">
                    <Link
                        :href="`/posts/${post.id}`"
                        class="mt-4 inline-block font-medium text-red-500"
                        >Read more</Link
                    >
                </div>
            </div>

            <!--            Author section -->
            <div class="flex items-center justify-between">
                <div class="flex gap-4 text-center">
                    <div class="my-2 rounded-full">
                        <img
                            :src="post?.author?.profilePic"
                            alt="Random Image"
                            class="h-[45px] w-[45px] rounded-full"
                        />
                    </div>
                    <div class="self-center text-start">
                        <p class="capitalize text-purple-700">
                            {{ post?.author?.username }}
                        </p>
                        <p class="text-start text-sm capitalize text-gray-500">
                            {{
                                dayjs
                                    .utc(post.published)
                                    .tz(userTimezone)
                                    .fromNow()
                            }}
                        </p>
                    </div>
                </div>

                <!--      PostActions section (likes, comment , share)    -->
                <div>
                    <PostActions :post="post"></PostActions>
                </div>
            </div>
        </section>
    </div>
</template>

<style scoped></style>
