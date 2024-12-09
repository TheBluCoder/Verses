<script>
import PostFilter from '@/Components/Footer/PostFilter.vue';

export default {
    name: 'PostFilters',
    components: { PostFilter },
    props: {
        condition: Boolean,
    },
};
</script>

<template>
    <div
        v-if="condition"
        class="flex justify-center gap-8 py-2 text-base font-medium uppercase"
    >
        <PostFilter href="/" :condition="$page.url === '/'">Recent</PostFilter>
        <PostFilter href="/top-poems" :condition="$page.url === '/top-poems'">Top poems</PostFilter>

    </div>
</template>

<style scoped></style>
