export function useLocalStorage() {
    const saveItem = (key, value) => {
        localStorage.setItem(key, JSON.stringify(value));
    }

    const getItem = (key) => {
        return JSON.parse(localStorage.getItem(key)) || null;
    }
    const removeItem = (key) => {
        localStorage.removeItem(key);
    }

    return {
        saveItem,
        getItem,
        removeItem
    };
}
