<template>
    <div id="container">
        <navegacio></navegacio>
        <dades></dades>
        <pagina></pagina>

        <div>
            <notaComuna></notaComuna>
            <expedients></expedients>
        </div>
    </div>
</template>
<script>
import notaComuna from "./notaComuna.vue";
import expedients from "./expedients.vue";
import navegacio from "./navegacio.vue";
import pagina from "./pagina.vue";
import dades from "./dades.vue";
export default {
    name: "cartaApp",
    components: {
        notaComuna,
        expedients,
        navegacio,
        pagina,
        dades,
    },
};
</script>
<style lang="scss" scoped>
@import "../../css/variables.scss";

body {
    background-color: $light-blue;
}

#container {
    min-height: 100vh;
    padding: $components-gap;

    display: grid;
    grid-template-columns: 60% 1fr;
    grid-template-rows: clamp(55px, 12.5%, 100px) 1fr;
    grid-column-gap: $components-gap;
    grid-row-gap: $components-gap;
}
</style>
