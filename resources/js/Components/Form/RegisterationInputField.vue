<script setup>
const props = defineProps({
    id: String,
    label: String,
    modelValue: String,
    type: String,
    error: String,
});

const emit = defineEmits(['update:modelValue']);
</script>

<template>
    <div>
        <label :for="props.id" class="block font-serif text-sm text-gray-700">{{
            label
        }}</label>
        <input
            :id="props.id"
            :type="props.type || 'text'"
            :value="props.modelValue"
            @input="emit('update:modelValue', $event.target.value)"
            class="mt-1 block w-full rounded-lg border border-gray-200 px-4 py-2 font-light text-gray-700 shadow-sm focus:border-transparent focus:outline-none focus:ring-2 focus:ring-indigo-400"
            :class="{ 'border-red-300 focus:ring-red-400': props.error }"
        />
        <p v-if="props.error" class="mt-1 text-sm italic text-red-500">
            {{ props.error }}
        </p>
    </div>
</template>
