<script setup>
import { onMounted, ref } from 'vue';

const model = defineModel({
    type: String,
    required: true,
});

const input = ref(null);
let props = defineProps({
    id: String,
    name: {
        type: String,
        required: true,
    },
    type: {
        type: String,
        default: 'text',
    },
    placeholder: String,
    autofocus: {
        type: Boolean,
        required: false,
    },
});

onMounted(() => {
    if (input.value.hasAttribute('autofocus')) {
        input.value.focus();
    }
});

defineExpose({ focus: () => input.value.focus() });
</script>

<template>
    <div
        class="relative flex items-center transition-all duration-200 hover:drop-shadow-md"
    >
        <input
            v-model="model"
            ref="input"
            :id="props.id"
            :name="props.name"
            :type="props.type"
            required
            class="w-full rounded-md border border-gray-300 px-4 py-3 text-sm text-gray-800 outline-blue-600"
            :placeholder="props.placeholder"
            :autofocus="autofocus"
        />
        <slot />
    </div>
</template>
