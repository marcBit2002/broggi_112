<template>
    <div id="container">
        <!-- <div class='users'><usersChart/></div>
        <div class='incidents'><incidentsChart/></div> -->
        <div class='cartes'><cartesIncidentsChart/></div>
    </div>
</template>
<script>
import usersChart from "./charts/usersTypeUsers.vue";
import incidentsChart from "./charts/incidentsTypeChart.vue";
import cartesIncidentsChart from "./charts/cartesIncidents.vue";

export default {
    name: "charts",
    components: {
        usersChart,
        incidentsChart,
        cartesIncidentsChart
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
.users, .incidents, .cartes {
    width: 700px;
    height: 500px;

    border: 2px solid $primary;
    border-radius: 15px;

    padding: 1rem;
    margin: 10px;

    background-color: $light-blue;
}
</style>