<template>
    <div
        v-if="editor"
        :class="{
            'text-xs': true,
            'text-gray-500': characters < 700,
            'text-orange-600': characters < 900,
            'text-red-500': characters === characterLimit,
        }"
    >
        {{ characters }} / {{ characterLimit }} chars
    </div>
</template>

<script>
export default {
    props: {
        editor: {
            type: Object,
            required: true,
        },
        characterLimit: {
            type: Number,
            required: true,
        },
    },
    computed: {
        characters() {
            return this.editor
                ? this.editor.storage.characterCount.characters()
                : 0;
        },
    },
};
</script>
