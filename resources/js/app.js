import './bootstrap';
import '../css/app.css';
import { createApp, h } from 'vue';
import {createInertiaApp, router} from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';

const appName = import.meta.env.VITE_APP_NAME || 'Laravel';

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
    setup({ el, App, props, plugin }) {
        return createApp({ render: () => h(App, props) })
            .use(plugin)
            .mount(el);
    },
    progress: {
        color: '#4B5563',
    },
});

router.on('navigate', (event) => {
    console.log(`Navigated to ${event.detail.page.url}`)

    setTimeout(() => {
        window.HSStaticMethods.autoInit();

        console.log('ssss')
    }, 100)


    console.log('zzz')
})

