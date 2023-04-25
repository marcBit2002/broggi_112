<template>
    <div id="container">
        <div class='cartesIncidents'><cartesIncidentsChart/></div>
        <div class='cartesExp'><cartesExpedients/></div>
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
    height: 92vh;

    display: flex;
    justify-content: center;
    align-items: center;
}
.cartesIncidents, .cartesExp {
    width: 700px;
    height: 500px;

    border: 2px solid $primary;
    border-radius: 15px;

    padding: 1rem;
    margin: 10px;

    background-color: $light-blue;
}
</style>