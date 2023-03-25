<template>
    <div id="pagina">La pagina</div>
</template>
<script>
export default {
    name: "pagina",
};
</script>
<style lang="scss" scoped>
@import "../../css/variables.scss";

#pagina {
    background-color: #fff;

    border: $components-border-width solid $primary;
    border-radius: $components-border-radius;

    grid-area: 2 / 1 / 4 / 2;
}
</style>
