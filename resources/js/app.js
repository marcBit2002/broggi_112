import "./bootstrap";
import * as bootstrap from "bootstrap";
import { createApp } from "vue";

import cartaApp from "./components/cartaApp.vue";

createApp(cartaApp).mount("#cartaApp");

const popoverTriggerList = document.querySelectorAll(
    '[data-bs-toggle="popover"]'
);
const popoverList = [...popoverTriggerList].map(
    (popoverTriggerEl) => new bootstrap.Popover(popoverTriggerEl)
);
