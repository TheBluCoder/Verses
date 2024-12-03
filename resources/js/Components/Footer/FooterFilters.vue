<script>
export default {
    name: 'FooterFilters',
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
        <span class="cursor-pointer border-b-2 text-purple-700">Recent</span>
        <span class="cursor-pointer text-neutral-400 hover:text-neutral-950"
            >Top Poems</span
        >
    </div>
</template>

<style scoped></style>
