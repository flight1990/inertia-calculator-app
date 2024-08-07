import './bootstrap';
import '../css/app.css';
import Vue3SocialSharingPlugin from "vue3-social-sharing";
import { createSSRApp, h } from 'vue'
import {createInertiaApp, router} from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';

const appName = import.meta.env.VITE_APP_NAME || 'Laravel';

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
    setup({ el, App, props, plugin }) {
        return createSSRApp({ render: () => h(App, props) })
            .use(plugin)
            .use(Vue3SocialSharingPlugin)
            .mount(el);
    },
    progress: {
        color: '#06b6d4',
    },
});
