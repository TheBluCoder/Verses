import { usePage } from '@inertiajs/vue3';
import { ref } from 'vue';

export const useConfirmDialog = () => {
    const intended = ref(usePage().url); // Tracks the intended URL
    const displayConfirmDialog = ref(false); // Tracks whether the dialog is shown

    const showConfirmDialog = (intendedUrl) => {
        intended.value = intendedUrl;
        displayConfirmDialog.value = true;
    };

    return {
        intended,
        displayConfirmDialog,
        showConfirmDialog,
    };
};
