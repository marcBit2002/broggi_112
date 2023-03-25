<template>
    <div id="notaComuna">
        <div>
            <p>Nota comuna</p>
            <!-- <img src="/broggi_112/public/assets/icons/arrowDownWhite.svg" /> -->
        </div>
        <textarea></textarea>
    </div>
</template>
<script>
export default {
    name: "notaComuna",
    data: function () {
        return {};
    },
    methods: {},
    watch: {},
};
</script>
<style lang="scss" scoped>
@import "../../css/variables.scss";

#notaComuna {
    grid-area: 2 / 2 / 3 / 3;

    height: 100%;

    border-radius: $components-border-radius;

    background-color: $danger;

    div {
        width: 100%;
        min-height: calc(45px + $components-border-width);

        display: flex;
        justify-content: space-between;
        align-items: center;

        color: #fff;
        font-weight: 500;

        p {
            margin-left: 25px;
            margin-bottom: 0;
        }
    }

    textarea {
        height: calc(100% - 48px);
        width: calc(100% - $components-border-width * 2);

        border: none;
        border-radius: calc(
            $components-border-radius - $components-border-width
        );
        transform: translate(
            $components-border-width,
            -$components-border-width
        );
        padding: 20px;

        border: none;
        overflow: auto;
        outline: none;

        -webkit-box-shadow: none;
        -moz-box-shadow: none;
        box-shadow: none;

        resize: none; /*remove the resize handle on the bottom right*/
    }
}
</style>
