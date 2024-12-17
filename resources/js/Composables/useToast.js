import { useToast as vueToast } from 'vue-toastification';

export function useToast() {
    return {
        success: (message) => vueToast.success(message),
        error: (message) => vueToast.error(message),
        info: (message) => vueToast.info(message),
        warning: (message) => vueToast.warning(message),
    };
}
