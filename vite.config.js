import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'public/scss/sb-admin-2.scss' ,'resources/js/app.js'],
            refresh: true,
        }),
    ],
});
