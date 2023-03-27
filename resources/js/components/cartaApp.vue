<template>
    <div id="container">
        <navegacio
            @tab="(i) => (this.activeTab = i)"
            :tab="this.activeTab"
        ></navegacio>
        <dades></dades>
        <pagina
            @tab="(i) => (this.activeTab += i)"
            :tab="this.activeTab"
        ></pagina>
        <notaComuna></notaComuna>
        <expedients></expedients>
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
    data: function () {
        return {
            activeTab: 1,
        };
    },
};
</script>
<style lang="scss" scoped>
@import "../../css/variables.scss";

body {
    background-color: $light-blue;
}

#container {
    height: 100vh;
    padding: $components-gap;

    display: grid;
    grid-template-columns: 1fr clamp(300px, 40%, 450px);
    grid-template-rows: clamp(55px, 12.5%, 100px) 0.9fr 1.1fr;
    grid-column-gap: $components-gap;
    grid-row-gap: $components-gap;
}
</style>
