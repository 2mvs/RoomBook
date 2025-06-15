import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({

    // server: {
    //     host: false, // autorise l'accès réseau
    //     hmr: {
    //         host: '', // ← ton IP locale ici
    //     },
    // },
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
});
