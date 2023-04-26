<template>
    <div id="container">
        <navegacio
            @tab="(i) => (this.activeTab = i)"
            :tab="this.activeTab"
        ></navegacio>
        <dades
            @timer="(time) => (this.timer = time)"
            @date="(date) => (this.date = date)"
            :expedient="expedient"
            :codi="codi"
            :resetTimer="resetTimer"
        ></dades>
        <pagina
            @tab="(i) => (this.activeTab += i)"
            :tab="this.activeTab"
            :notaContent="this.notaContent"
            :tipusIncidents="this.tipusIncidents"
            :allIncidents="this.allIncidents"
            :codi="this.codi"
            :expedient="this.expedient"
            :duration="this.timer"
            :date="this.date"
            :isAssociated="this.isAssociated"
            :apiLoading="this.apiLoading"
            @telefon="(tel) => (this.telefon = tel)"
            @municipi="(name) => (this.municipi = name)"
            @incidentTipos="(incident) => (this.incidentTipos = incident)"
            @reset-timer="() => (this.resetTimer = 0)"
        ></pagina>
        <notaComuna
            @notaContent="(content) => (this.notaContent = content)"
        ></notaComuna>
        <expedients
            @expedient="(num) => (this.expedient = num)"
            @isAssociated="(value) => (this.isAssociated = value)"
            :allIncidents="this.allIncidents"
            :allMunicipis="this.allMunicipis"
            :expedientId="expedient"
            :telefon="this.telefon"
            :municipi="this.municipi"
            :incidentTipos="this.incidentTipos"
        ></expedients>
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
            notaContent: "",
            allIncidents: null,
            allMunicipis: null,
            telefon: null,
            municipi: null,
            incidentTipos: null,
            timer: null,
            date: null,
            isAssociated: false,
            apiLoading: 0,
            resetTimer: Number,
        };
    },
    watch: {
        apiLoading() {
            console.log(this.apiLoading);
        },
    },
    methods: {
        newCartaId() {
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

                    console.log("cartes loaded");
                    this.apiLoading++;
                })
                .catch((error) => {
                    this.codi = "NOT FOUND";
                    this.apiLoading = 500;
                });
        },
        newExpedientId() {
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

                    console.log("expedients loaded");
                    this.apiLoading++;
                })
                .catch((error) => {
                    this.expedient = "NOT FOUND";
                    this.apiLoading = 500;
                });
        },
        loadTipusIncidents() {
            axios
                .get("tipusincident")
                .then((response) => {
                    this.tipusIncidents = response.data;

                    console.log("tipos incident loaded");
                    this.apiLoading++;
                })
                .catch((error) => {
                    this.tipusIncidents = "NOT FOUND";
                    this.apiLoading = 500;
                });
        },
        getIncidents() {
            axios
                .get("incident")
                .then((response) => {
                    this.allIncidents = response.data;

                    console.log("incidents loaded");
                    this.apiLoading++;
                })
                .catch((err) => {
                    console.error("Error" + err);
                    this.apiLoading = 500;
                });
        },
        getMunicipis() {
            axios
                .get("municipi")
                .then((response) => {
                    this.allMunicipis = response.data;

                    console.log("municipis loaded");
                    this.apiLoading++;
                })
                .catch((err) => {
                    console.error("Error" + err);
                    this.apiLoading = 500;
                });
        },
    },
    mounted() {
        this.newCartaId();
        this.newExpedientId();
        this.loadTipusIncidents();
        this.getIncidents();
        this.getMunicipis();
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
