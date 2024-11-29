import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/admin/js/chart.sample.js', 'resources/admin/js/main.js', 'resources/admin/css/main.css', 'resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
});
