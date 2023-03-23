<template>
    <div id="container">
        <navegacio></navegacio>
        <dades></dades>
        <pagina></pagina>

        <div id="right_container">
            <notaComuna></notaComuna>
            <div id="resizer">
                <div id="pill"></div>
            </div>
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
    grid-template-columns: 1fr clamp(300px, 40%, 450px);
    grid-template-rows: clamp(55px, 12.5%, 100px) 1fr;
    grid-column-gap: $components-gap;
    grid-row-gap: $components-gap;
}

#right_container {
    display: flex;
    justify-content: flex-start;
    align-items: center;
    flex-direction: column;
}

#resizer {
    height: $components-gap;
    width: 100%;
    position: relative;

    &:hover {
        // cursor: n-resize;
    }

    #pill {
        width: 75px;
        height: 3px;
        border-radius: 5px;

        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);

        // background-color: $warning;
    }
}
</style>
