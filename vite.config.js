import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';

export default defineConfig({
    plugins: [
        laravel({
            input: 'resources/js/app.js',
            ssr: 'resources/js/ssr.js',
            refresh: true,
        }),
        vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
            },
        }),
    ],
    rollupOptions: {
        external: ['lodash', 'vue', 'radix-vue', 'vue-clipboard3'],
    },
    ssr: {
        noExternal: ['vue', 'radix-vue', 'lodash', 'vue-clipboard3']
    }
});
