<template>
    <div id="container">
        <div class='users'><usersChart/></div>
        <div class='incidents'><incidentsChart/></div>
    </div>
</template>
<script>
import usersChart from "./charts/usersTypeUsers.vue";
import incidentsChart from "./charts/incidentsTypeChart.vue";

export default {
    name: "charts",
    components: {
        usersChart,
        incidentsChart
    },
};
</script>
<style lang="scss" scoped>
@import "../../css/variables.scss";

body {
    background-color: $light-blue;
}

#container {
    height: 90vh;
    width: 90vw;

    display: flex;
}
.users, .incidents {
    width: 700px;
    height: 500px;

    border: 2px solid $primary;
    border-radius: 15px;

    padding: 1rem;
    margin: 10px;
}
</style>