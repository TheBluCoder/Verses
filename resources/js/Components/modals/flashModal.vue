<script>
export default {
    name: 'flashModal',

    props: { message: { type: String, required: true }, condition: Boolean },
};
</script>

<template>
    <Teleport to="body">
        <Transition
            enter-active-from="opacity-0 scale-0.5"
            enter-to-class="opacity-100 scale-1"
            leave-to-class="opacity-0 scale-1.5"
        >
            <div
                v-if="condition"
                class="fixed bottom-10 right-1/2 rounded-lg bg-gray-700 p-2 text-sm/relaxed text-green-500"
            >
                <p>{{ message }}</p>
            </div>
        </Transition>
    </Teleport>
</template>

<style scoped></style>
