<template>
    <div
        v-if="editor"
        :class="{
            'text-xs': true,
            'text-green-600': characters < greenLimit,
            'text-orange-300':
                characters > greenLimit && characters < orangeLimit,
            'text-orange-600': characters > orangeLimit,
            'text-red-700': characters === redLimit,
        }"
    >
        {{ characters }} / {{ characterLimit }} chars
    </div>
</template>

<script>
export default {
    data() {
        return {
            greenLimit: 0.5 * this.characterLimit,
            orangeLimit: 0.75 * this.characterLimit,
            redLimit: this.characterLimit,
        };
    },
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
