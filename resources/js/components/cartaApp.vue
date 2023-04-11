<template>
    <div id="container">
        <navegacio
            @tab="(i) => (this.activeTab = i)"
            :tab="this.activeTab"
        ></navegacio>
        <dades :expedient="expedient" :codi="codi"></dades>
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
            codi: "----",
            expedient: "----",
        };
    },
    methods: {
        lastCartaId() {
            axios
                .get("carta")
                .then((response) => {
                    // Ultima carta de la BDD
                    let lastCarta = response.data[response.data.length - 1];

                    // Agafem el codi
                    let codi = lastCarta.codi_trucada;

                    // Eliminem la 'T' i sumem 1
                    codi = Number(codi.substring(1)) + 1;

                    //Afegim 'T' i guardem
                    this.codi = "T" + codi;
                })
                .catch((error) => {
                    this.codi = "NOT FOUND";
                });
        },
        lastExpedientId() {
            axios
                .get("expedient")
                .then((response) => {
                    // Ultima carta de la BDD
                    let lastExpedient = response.data[response.data.length - 1];

                    // Agafem el codi
                    let codi = lastExpedient.codi;

                    // Eliminem la 'E' i sumem 1
                    codi = Number(codi.substring(1)) + 1;

                    //Afegim 'T' i guardem
                    this.expedient = "E" + codi;
                })
                .catch((error) => {
                    this.expedient = "NOT FOUND";
                });
        },
    },
    mounted() {
        this.lastCartaId();
        this.lastExpedientId();
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
