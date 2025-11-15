// packages
import { createInertiaApp } from '@inertiajs/vue3';
import createServer from '@inertiajs/vue3/server';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { i18nVue } from 'laravel-vue-i18n';
import { createSSRApp, DefineComponent, h } from 'vue';
import { renderToString } from 'vue/server-renderer';

const appName = import.meta.env.VITE_APP_NAME || 'Vertebrae';

createServer(
    (page) =>
        createInertiaApp({
            page,
            render: renderToString,
            title: (title) => (title ? `${title} - ${appName}` : appName),
            resolve: (name) =>
                resolvePageComponent(`./pages/${name}.vue`, import.meta.glob<DefineComponent>('./pages/**/*.vue')),
            setup: ({ App, props, plugin }) =>
                createSSRApp({
                    render: () => h(App, props),
                })
                    .use(i18nVue, {
                        resolve: (lang) => {
                            const langs = import.meta.glob('../../lang/*.json', { eager: true });
                            return langs[`../../lang/${lang}.json`].default;
                        },
                    })
                    .use(plugin),
        }),
    { cluster: true },
);
