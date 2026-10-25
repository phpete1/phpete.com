import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import { google } from 'laravel-vite-plugin/fonts';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
            fonts: [
                google('Geist', {
                    weights: [400, 500, 600],
                }),
                google('Geist Mono', {
                    weights: [400, 500],
                }),
                google('Newsreader', {
                    weights: [400],
                    styles: ['italic'],
                }),
            ],
        }),
        tailwindcss(),
    ],
    build: {
        rolldownOptions: {
            // htmx's source contains a direct eval (for hx-on and js: values), which the bundler warns about on every
            // build. The site uses neither and turns eval off at runtime (resources/js/app.js), so drop just that warning.
            onLog(level, log, handler) {
                if (log.code === 'EVAL' && log.id?.includes('/node_modules/htmx.org/')) return;
                handler(level, log);
            },
        },
    },
    server: {
        watch: {
            ignored: ['**/storage/framework/views/**'],
        },
    },
});
