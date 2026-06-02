import { createApp, h } from "vue";
import { createInertiaApp, Link } from "@inertiajs/vue3";
import { ZiggyVue } from "../../vendor/tightenco/ziggy";
import DefaultLayout from "./layouts/DefaultLayout.vue";

createInertiaApp({
    resolve: (name) => {
        const pages = import.meta.glob("./pages/**/*.vue", { eager: true });
        const page = pages[`./pages/${name}.vue`].default;
        page.layout = page.layout === undefined ? DefaultLayout : page.layout;
        return page;
    },
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(ZiggyVue)
            .component("Link", Link)
            .mount(el);
    },
    progress: {
        // cor da barra que aparece no topo da tela durante a transição
        color: "#4B5563",
        // Se mostra o spinner de loading tradicional
        showSpinner: true,
    },
});
