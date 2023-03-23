<template>
    <div id="notaComuna">
        <div v-on:click="isNotaOpen = !isNotaOpen">
            <p>Nota comuna</p>
            <img src="/broggi_112/public/assets/icons/arrowDownWhite.svg" />
        </div>
        <textarea name="" id="" cols="30" rows="10"></textarea>
    </div>
</template>
<script>
export default {
    name: "notaComuna",
    data: function () {
        return {
            isNotaOpen: true,
        };
    },
    methods: {},
    watch: {
        isNotaOpen: function () {
            let arrow = this.$el.children[0].children[1];

            if (this.isNotaOpen) {
                let prev_height = this.$el.getAttribute("data-prev-height");

                this.$el.style.height = `${prev_height}px`;
                arrow.style.transform = "rotate(0deg)";
                this.$el.style.flex = "1";
            } else {
                // Altura con decimales
                let prev_height = this.$el.getBoundingClientRect().height;

                this.$el.setAttribute("data-prev-height", prev_height);

                this.$el.style.height = "45px";
                arrow.style.transform = "rotate(90deg)";
                this.$el.style.flex = "none";
            }
        },
    },
};
</script>
<style lang="scss" scoped>
@import "../../css/variables.scss";

#notaComuna {
    width: 100%;
    height: calc(50% - $components-gap / 2);

    flex: 1;

    overflow: hidden;

    display: flex;
    align-items: center;
    justify-content: flex-start;
    flex-direction: column;

    border-radius: $components-border-radius;

    background-color: $danger;

    transition: height 0.2s ease-in-out 0s;

    div {
        width: 100%;
        min-height: calc(45px + $components-border-width);

        display: flex;
        justify-content: space-between;
        align-items: center;

        color: #fff;
        font-weight: 500;

        cursor: pointer;

        p {
            margin-left: 25px;
            margin-bottom: 0;
        }

        img {
            transition: transform 0.1s ease-in-out;
            padding: 15px;
            margin-right: 10px;

            &:hover {
                transform: scale(1.2);
            }
        }
    }

    textarea {
        flex: 1;
        width: calc(100% - $components-border-width * 2);
        border: none;
        border-radius: calc(
            $components-border-radius - $components-border-width
        );
        transform: translateY(-$components-border-width);
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
