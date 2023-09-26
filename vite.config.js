import laravel from "laravel-vite-plugin";
import path from 'path';
import { defineConfig } from "vite";
export default defineConfig({
    resolve: {
        alias: {
            "~bootstrap": path.resolve(__dirname, "node_modules/bootstrap"),
        },
    },

    plugins: [
        laravel({
            input: ["resources/sass/app.scss", "resources/css/app.css", "resources/js/app.js"],
            refresh: true,
        }),
    ],
});
