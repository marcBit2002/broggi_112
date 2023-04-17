<template>
    <div id="container">
        <div class='users'><usersChart/></div>
        <div class='incidents'></div>
    </div>
</template>
<script>
import usersChart from "./charts/usersTypeUsers.vue";
export default {
    name: "charts",
    components: {
        usersChart,
    },
    data: function () {
        return {
            message: 'hola',
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
    height: 90vh;
    width: 90vw;
}

.users, .incidents {
    width: 500px;
    height: 500px;

    border: 2px solid $primary;
    border-radius: 15px;

    padding: 1rem;
}
</style>