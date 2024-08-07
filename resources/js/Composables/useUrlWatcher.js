import { ref, onMounted, onBeforeUnmount } from 'vue';

export function useUrlWatcher() {

    const url = ref(typeof window !== 'undefined' ? window.location.href : '');

    const updateUrl = () => {
        if (typeof window !== 'undefined') {
            url.value = window.location.href;
        }
    };

    const patchHistoryMethod = (methodName) => {
        if (typeof window !== 'undefined') {
            const originalMethod = history[methodName];
            history[methodName] = function (...args) {
                const [state, title, url] = args;
                try {
                    const result = originalMethod.apply(history, args);
                    updateUrl();
                    return result;
                } catch (error) {
                    throw error;
                }
            };
        }
    };

    const handlePopstateEvent = () => {
        updateUrl();
    };

    onMounted(() => {
        if (typeof window !== 'undefined') {
            patchHistoryMethod('pushState');
            patchHistoryMethod('replaceState');
            window.addEventListener('popstate', handlePopstateEvent);
        }
    });

    onBeforeUnmount(() => {
        if (typeof window !== 'undefined') {
            window.removeEventListener('popstate', handlePopstateEvent);
        }
    });

    return { url };
}
