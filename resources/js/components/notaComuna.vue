<template>
    <div id="notaComuna">
        <div>
            <p>Nota comuna</p>
        </div>
        <textarea
            placeholder="Nom, cognom de l'interlocutor, relació amb l'incident, descripció dels fets..."
            v-model="notaContent"
            @input="sendContent(notaContent)"
        ></textarea>
    </div>
</template>
<script>
export default {
    name: "notaComuna",
    data: function () {
        return {
            notaContent: "",
        };
    },
    methods: {
        sendContent(content) {
            this.$emit("notaContent", content);
        },
    },
};
</script>
<style lang="scss" scoped>
@import "../../css/variables.scss";

*::-webkit-scrollbar-thumb {
    background-color: $danger;
}

#notaComuna {
    grid-area: 2 / 2 / 3 / 3;

    height: 100%;

    border-radius: $components-border-radius;

    background-color: $danger;

    position: relative;

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

        // text-indent: 1.5rem;
        line-height: 1.4rem;
        font-weight: 400;
        font-size: 1.15rem;

        border: none;
        overflow: auto;
        outline: none;

        -webkit-box-shadow: none;
        -moz-box-shadow: none;
        box-shadow: none;

        resize: none; /*remove the resize handle on the bottom right*/

        &::placeholder {
            /* Chrome, Firefox, Opera, Safari 10.1+ */
            color: rgba($color: $dark, $alpha: 0.6);
        }

        &:-ms-input-placeholder {
            /* Internet Explorer 10-11 */
            color: rgba($color: $dark, $alpha: 0.6);
        }

        &::-ms-input-placeholder {
            /* Microsoft Edge */
            color: rgba($color: $dark, $alpha: 0.6);
        }
    }
}

#notaArrow {
    position: absolute;
    top: 70px;
    left: 30px;
    z-index: 1;
}
</style>
