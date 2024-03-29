import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/js/app.js',
                'resources/js/artiste.js',
                'resources/js/musique.js',
                'resources/js/groupe.js',
                'resources/js/addInfoMusique.js',
                'resources/js/addInfoAlbum.js',
                'resources/js/addInfoArtiste.js',
                'resources/js/addInfoGroupe.js'
            ],
            refresh: true,
        }),
    ],
});
