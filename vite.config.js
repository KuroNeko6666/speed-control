import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    server: { https: false, cors: false, hmr: false, port: 8001 },
    plugins: [
        laravel({
<<<<<<< Updated upstream
            input: ['resources/css/app.css', 'resources/assets/scss/sb-admin-2.scss' ,'resources/js/app.js'],
=======
            input: ['public/scss/sb-admin-2.scss' ,'resources/css/app.css', 'resources/js/app.js'],
>>>>>>> Stashed changes
            refresh: true,
        }),
    ],
});
