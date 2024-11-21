<script setup>
import TextInput from '@/Components/forms/TextInput.vue';
import { ref, computed } from 'vue';
import hidePasswordSvg from '@/Components/forms/HidePasswordSvg.vue';
import showPasswordSvg from '@/Components/forms/ShowPasswordSvg.vue';

let props = defineProps({
    disabled: { type: Boolean, required: false },
});
let viewPassword = ref(false);
let type = computed(() => (viewPassword.value ? 'text' : 'password'));
let model = defineModel({
    type: String,
    required: true,
});

// const password = inject('form.password');
</script>

<template>
    <TextInput
        v-model="model"
        :type="type"
        id="password"
        name="password"
        placeholder="Enter password..."
    >
        <button
            class="mb-4"
            type="button"
            @click="viewPassword = !viewPassword"
        >
            <component
                v-if="!props.disabled"
                :is="viewPassword ? hidePasswordSvg : showPasswordSvg"
            ></component>
        </button>
    </TextInput>
</template>

<style scoped></style>
