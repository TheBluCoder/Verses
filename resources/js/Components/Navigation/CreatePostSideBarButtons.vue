<script setup>
import ConfirmDialog from '@/Components/Modal/ConfirmDialog.vue';
import { useConfirmDialog } from '@/Composables/useConfirmDialog.js';
const { intended, displayConfirmDialog, showConfirmDialog } =
    useConfirmDialog();

defineOptions({
    inheritAttrs: false,
});
</script>

<template>
    <div>
        <button
            type="button"
            :class="$attrs.class"
            @click.prevent="showConfirmDialog($attrs.href)"
        >
            <slot></slot>
        </button>
        <ConfirmDialog
            v-model:toggled="displayConfirmDialog"
            v-if="displayConfirmDialog"
            :intended="intended"
        />
    </div>
</template>

<style scoped></style>
