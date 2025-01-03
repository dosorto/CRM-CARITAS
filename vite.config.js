import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js'
            ],
            refresh: {
                paths: [
                    'resources/**/*.blade.php',
                    'resources/js/**/*.js',
                    'resources/css/**/*.css',
                ],
                config: false
            }
        }),
    ],
});