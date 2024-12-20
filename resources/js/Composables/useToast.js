// composables/useToastComposable.js
import { ref } from 'vue';

let toast = null;

export const useToastComposable = () => {
    const isToastLoaded = ref(false);

    const loadToast = async () => {
        if (!toast) {
            const module = await import('vue-toastification');
            toast = module.useToast();
            isToastLoaded.value = true;
        }
    };

    const showToast = async (message, type = 'success') => {
        await loadToast();
        toast[type](message); // Supports toast.success, toast.error, etc.
    };

    return {
        showToast,
        loadToast,
        isToastLoaded,
    };
};
