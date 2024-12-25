// composables/useToastComposable.js
import { ref } from 'vue';

let toast = null;

export const useToastComposable = () => {
    const isToastLoaded = ref(false);

    const errorConfig = {
        position: 'bottom-center',
        timeout: 5000,
        closeOnClick: true,
        pauseOnFocusLoss: true,
        pauseOnHover: false,
        draggable: true,
        draggablePercent: 0.6,
        showCloseButtonOnHover: false,
        hideProgressBar: false,
        closeButton: 'button',
        icon: true,
        rtl: false,
    };

    const loadToast = async () => {
        if (!toast) {
            const { useToast } = await import(
               'vue-toastification'
            );
            toast = useToast();
            isToastLoaded.value = true;
        }
    };

    const getToast = async () => {
        await loadToast();
        return toast;
    };

    return {
        getToast,
        errorConfig,
        isToastLoaded,
    };
};
