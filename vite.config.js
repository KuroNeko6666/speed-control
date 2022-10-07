import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/assets/scss/sb-admin-2.scss' ,'resources/js/app.js'],
            refresh: true,
        }),
    ],
    server: {
        port: 8001,
        cors: false,
        hmr: false,
        https: false,
    }
});
