<script setup>
import { usePage } from '@inertiajs/vue3';

let toggled = defineModel('toggled');
defineProps({
    intended: {
        type: String,
        default: usePage().url,
    },
});
const handleSelection = (option) => {
    if (option === true) {
        console.log('');
    }
    toggled.value = !toggled.value;
};
</script>

<template>
    <Teleport to="body">
        <Transition enter-active-class="transform">
            <div
                v-if="toggled"
                id="confirmDialog"
                class="fixed left-0 top-0 flex min-h-screen min-w-[100vw] items-center justify-center"
            >
                <div
                    class="modal z-50 min-h-[12rem] w-1/5 min-w-[20rem] place-content-center rounded-lg border border-orange-700 bg-gray-50 text-center shadow-lg shadow-gray-900"
                >
                    <hr
                        class="w-full border-orange-700 dark:border-orange-700"
                    />
                    <p class="modal mt-8 font-semibold text-gray-900">
                        Do you want to save to draft?
                    </p>
                    <div class="modal mt-7 flex justify-between px-8">
                        <button
                            type="button"
                            class="font-semibold text-green-800"
                        >
                            yes
                        </button>
                        <Link
                            :href="intended"
                            class="text-red-500"
                            @click="handleSelection(false)"
                        >
                            cancel
                        </Link>
                    </div>
                </div>
            </div>
        </Transition>
    </Teleport>
</template>

<style scoped>
#confirmDialog {
    background-color: dimgray;
    opacity: 0.7;
}
</style>
