import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import vue from "@vitejs/plugin-vue";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                "resources/css/app.scss",
                "resources/css/menu.scss",
                "resources/js/app.js",
            ],
            refresh: true,
        }),
        vue(),
    ],
    build: {
        rollupOptions: {
            external: [
                "/broggi_112/public/assets/icons/arrowHeadFill.svg",
                "/broggi_112/public/assets/icons/arrowHead.svg",
                "/broggi_112/public/assets/icons/arrowHead.svg",
                "/broggi_112/public/assets/icons/state.svg",
                "/broggi_112/public/assets/icons/arki.svg",
            ],
        },
    },
});
