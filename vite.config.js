import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css', 
                'resources/js/app.js',
                'resources/js/dropdown-actions.js',
                'resources/css/dropdown-actions.css',
                'resources/css/crud.css',
            ],
            refresh: true,
            publicDirectory: 'public',
            buildDirectory: 'build'
        }),
    ],
});