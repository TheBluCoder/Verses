<script setup>
import { usePage } from '@inertiajs/vue3';
import Reactions from '@/Components/Post/Reactions.vue';

defineProps({ poem: { type: Object, required: true } });
</script>

<template>
    <div class="mb-14 border-b pb-2">
        <section>
            <h2
                class="text-2xl font-semibold text-neutral-950"
                v-text="poem?.title"
            ></h2>
            <pre
                class="li mt-4 w-full text-wrap font-sans text-lg font-light leading-relaxed text-neutral-700"
                :class="{ 'line-clamp-5': usePage().url === '/' }"
                v-html="poem.content"
            ></pre>

            <div v-if="usePage().url === '/'">
                <Link
                    :href="`/poems/${poem.id}`"
                    class="mt-4 inline-block font-medium text-purple-700"
                    >Read more</Link
                >
            </div>

            <div class="flex items-center justify-between">
                <div class="flex gap-4 text-center">
                    <div class="my-2 rounded-full">
                        <img
                            :src="poem.author.profilePic"
                            alt="Random Image"
                            class="rounded-full"
                        />
                    </div>
                    <p class="self-center capitalize">
                        {{ poem.author.username }}
                    </p>
                </div>

                <div>
                    <Reactions :poem="poem"></Reactions>
                </div>
            </div>
        </section>
    </div>
</template>

<style scoped></style>
