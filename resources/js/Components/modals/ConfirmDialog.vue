<script setup>
let toggled = defineModel('toggled');
const handleSelection = (option) => {
    if (option === true) {
        console.log("")
    }

    toggled.value = !toggled.value;
};
</script>

<template>
    <Teleport to="body">
        <div
            v-if="toggled"
            class="modal fixed left-[40vw] top-[40vh] z-50 grid h-1/4 min-h-[10rem] w-1/4 min-w-[20rem] rounded border border-gray-400 bg-gray-50 text-center shadow-lg shadow-gray-500"
        >
            <div class="w-full border-b border-gray-400"></div>
            <p class="modal mt-8 font-semibold text-gray-700">
                Do you want to save to draft?
            </p>
            <div class="modal flex justify-between px-5">
                <button type="button" class="font-semibold text-green-800">yes</button>
                <button type="button" class="text-red-500" @click ="handleSelection(false)">
                    cancel
                </button>
            </div>
        </div>
    </Teleport>
</template>

<style scoped>
body *:not(.modal):not(.modal *) {
    opacity: 0.9;
}
</style>
