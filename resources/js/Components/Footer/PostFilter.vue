<script>
export default {
    name: 'PostFilter',

    props: {
        condition: {
            type: Boolean,
            required: true,
        },
    },

    inheritAttrs: false,
};
</script>

<template>
    <div>
        <Link
            v-bind="$attrs"
            class="block cursor-pointer uppercase text-purple-700"
            ><slot
        /></Link>
        <div
            class="transition-all duration-500"
            :class="{
                'w-0': !condition,
                'h-1 w-full rounded-lg border bg-orange-400':
                    condition,
            }"
        ></div>
    </div>
</template>

<style scoped></style>
