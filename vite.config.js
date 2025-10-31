import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js', 'resources/css/card.css', 'resources/css/swiper.css', 'resources/css/hero.css', 'resources/css/meals.css', 'resources/js/loading.js'],
            refresh: true,
        }),
        tailwindcss(),
    ],
});
