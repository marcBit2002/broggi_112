import "./bootstrap";
import * as bootstrap from "bootstrap";
import { createApp } from "vue";

import cartaApp from "./components/cartaApp.vue";
import charts from "./components/graph.vue";
import adminCharts from "./components/adminGraphs.vue";
import estatExpedient from "./components/estatExpedient.vue";

createApp(cartaApp).mount("#cartaApp");
createApp(charts).mount("#charts");
createApp(estatExpedient).mount("#estatExpedient");
createApp(cartaApp).mount("#cartaApp");
createApp(adminCharts).mount("#adminCharts");

const popoverTriggerList = document.querySelectorAll(
    '[data-bs-toggle="popover"]'
);
const popoverList = [...popoverTriggerList].map(
    (popoverTriggerEl) => new bootstrap.Popover(popoverTriggerEl)
);
