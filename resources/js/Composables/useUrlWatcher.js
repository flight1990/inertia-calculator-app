import {ref, onMounted, onBeforeUnmount} from 'vue';

export function useUrlWatcher() {
    const url = ref(window.location.href);

    const updateUrl = () => {
        url.value = window.location.href;
    };

    const patchHistoryMethod = (methodName) => {
        const originalMethod = history[methodName];
        history[methodName] = function (...args) {
            const [state, title, url] = args;
            console.log(`Patched ${methodName} called with URL: ${url}`);
            try {
                const result = originalMethod.apply(history, args);
                updateUrl();
                return result;
            } catch (error) {
                console.error(`Error in patched ${methodName}:`, error);
                throw error;
            }
        };
    };

    const handlePopstateEvent = () => {
        updateUrl();
    };

    onMounted(() => {
        patchHistoryMethod('pushState');
        patchHistoryMethod('replaceState');
        window.addEventListener('popstate', handlePopstateEvent);
    });

    onBeforeUnmount(() => {
        window.removeEventListener('popstate', handlePopstateEvent);
    });

    return {url};
}
