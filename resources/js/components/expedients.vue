<template>
    <div id="expedients">
        <div v-on:click="isExpedientsOpen = !isExpedientsOpen">
            <p>Expedients</p>
            <img src="/broggi_112/public/assets/icons/arrowDownWhite.svg" />
        </div>
        <div class="content"></div>
    </div>
</template>
<script>
export default {
    name: "expedients",
    data: function () {
        return {
            isExpedientsOpen: true,
        };
    },
    methods: {},
    watch: {
        isExpedientsOpen: function () {
            let arrow = this.$el.children[0].children[1];

            if (this.isExpedientsOpen) {
                let prev_height = this.$el.getAttribute("data-prev-height");

                this.$el.style.height = `${prev_height}px`;
                arrow.style.transform = "rotate(0deg)";
                this.$el.style.flex = "1";
            } else {
                // Altura con decimales
                let prev_height = this.$el.getBoundingClientRect().height;

                this.$el.setAttribute("data-prev-height", prev_height);

                this.$el.style.flex = "none";
                this.$el.style.height = "45px";
                arrow.style.transform = "rotate(90deg)";
            }
        },
    },
};
</script>
<style lang="scss" scoped>
@import "../../css/variables.scss";

#expedients {
    width: 100%;
    height: calc(50% - $components-gap / 2);

    flex: 1;

    display: flex;
    align-items: center;
    justify-content: flex-start;
    flex-direction: column;

    border-radius: $components-border-radius;

    background-color: $primary;

    transition: height 0.2s ease-in-out 0s;

    div {
        width: 100%;
        height: 45px;

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

    .content {
        flex: 1;
        width: calc(100% - $components-border-width * 2);
        border: none;
        border-radius: calc(
            $components-border-radius - $components-border-width
        );
        transform: translateY(-$components-border-width);

        background-color: #fff;
    }
}
</style>
