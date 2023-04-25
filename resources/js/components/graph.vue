<template>
    <div id="container">
        <div class='cartes'><cartesIncidentsChart/></div>
        <!-- <div class='cartesExp'><cartesExpedients/></div> -->
    </div>
</template>
<script>
import cartesIncidentsChart from "./charts/cartesIncidents.vue";
import cartesExpedients from "./charts/cartesExpedients.vue"

export default {
    name: "charts",
    components: {
        cartesIncidentsChart,
        cartesExpedients
    },
};
</script>
<style lang="scss" scoped>
@import "../../css/variables.scss";

#container {
    height: 90vh;
    width: 90vw;

    display: flex;
    justify-content: center;
    align-items: center;
}
.cartes, .cartesExp {
    width: 700px;
    height: 500px;

    border: 2px solid $primary;
    border-radius: 15px;

    padding: 1rem;
    margin: 10px;

    background-color: $light-blue;
}
</style>