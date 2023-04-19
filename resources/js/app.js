import "./bootstrap";
import * as bootstrap from "bootstrap";
import { createApp } from "vue";

import cartaApp from "./components/cartaApp.vue";
import charts from "./components/graph.vue";
import estatExpedient from "./components/estatExpedient.vue";

createApp(cartaApp).mount("#cartaApp");
createApp(charts).mount("#charts");
createApp(estatExpedient).mount("#estatExpedient");

const popoverTriggerList = document.querySelectorAll(
    '[data-bs-toggle="popover"]'
);
const popoverList = [...popoverTriggerList].map(
    (popoverTriggerEl) => new bootstrap.Popover(popoverTriggerEl)
);
