import { ref, onMounted, onBeforeUnmount } from 'vue';

export function useUrlWatcher() {
    const url = ref(window.location.href);

    const updateUrl = () => {
        url.value = window.location.href;
    };

    const patchHistoryMethod = (methodName) => {
        const originalMethod = history[methodName];
        history[methodName] = function(...args) {
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
        console.log('popstate event triggered');
        updateUrl();
    };

    onMounted(() => {
        console.log('Patching history methods');
        patchHistoryMethod('pushState');
        patchHistoryMethod('replaceState');
        window.addEventListener('popstate', handlePopstateEvent);
    });

    onBeforeUnmount(() => {
        console.log('Removing popstate event listener');
        window.removeEventListener('popstate', handlePopstateEvent);
    });

    return { url };
}
