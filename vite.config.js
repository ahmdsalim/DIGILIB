import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/assets/css/bootstrap.min.css',
                'resources/assets/css/nifty.min.css',
                'resources/assets/css/auth.css',
                'resources/assets/css/landing.css',
                'resources/sass/app.scss',
                'resources/js/app.js',
                'resources/assets/js/alert.js',
            ],
            refresh: true,
        }),
    ],
});
