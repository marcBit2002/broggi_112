<template>
    <div id="pagina">
        <h1 id="title">Identificació</h1>
        <div id="navigation_buttons">
            <button type="button" class="btn btn-outline-secondary">
                Descartar carta
            </button>
            <button type="button" class="btn btn-outline-primary m-3">
                Anterior
            </button>
            <button type="button" class="btn btn-danger m-3">Següent</button>
        </div>
    </div>
</template>
<script>
export default {
    name: "pagina",
};
</script>
<style lang="scss" scoped>
@import "../../css/variables.scss";

#pagina {
    grid-area: 2 / 1 / 4 / 2;

    display: flex;
    align-items: flex-start;
    justify-content: flex-start;
    flex-direction: column;

    border: $components-border-width solid $primary;
    border-radius: $components-border-radius;

    padding: 2rem;

    background-color: #fff;
}

#title {
    color: $primary;

    &::before {
        content: url("/broggi_112/public/assets/icons/arrowTitle.svg");
        margin-right: 8px;
    }
}

#navigation_buttons {
    margin-top: auto;
    width: 100%;

    display: flex;
    align-items: center;
    justify-content: flex-end;

    button {
        &:first-child {
            margin-right: auto;
        }
    }
}
</style>
