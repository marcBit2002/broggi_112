<template>
    <div id="title">
        <p>Expedients</p>
    </div>
    <div id="expedients">
        <div class="expedient" v-for="expedient in expedients">
            <p>
                {{ expedient.codi }}
            </p>
            <p>
                {{ expedient.estat_expedients_id }}
            </p>
            <p class="linkBtn" @click="linkExpedient(expedient.codi)"></p>
        </div>
    </div>
</template>
<script>
export default {
    name: "expedients",
    data: function () {
        return {
            expedients: [],
        };
    },
    methods: {
        getExpedients() {
            const me = this;
            axios
                .get("expedient")
                .then((response) => {
                    me.expedients = response.data.filter(
                        (i) => i.estat_expedients_id !== 4
                    );
                })
                .catch((err) => {
                    console.error("Error" + err);
                });
        },
        linkExpedient(id) {
            this.$emit("expedient", id);
        },
    },
    watch: {},
    beforeMount() {
        this.getExpedients();
    },
    mounted() {
        window.addEventListener("resize", this.getDimensions);
    },
    unmounted() {
        window.removeEventListener("resize", this.getDimensions);
    },
};
</script>
<style lang="scss" scoped>
@import "../../css/variables.scss";

#title {
    grid-area: 3 / 2 / 4 / 3;
    height: 48px;

    border: $components-border-width solid $primary;
    border-bottom: none;
    border-radius: $components-border-radius $components-border-radius 0 0;

    background-color: $primary;

    display: flex;
    justify-content: left;
    align-items: center;

    color: #fff;
    font-weight: 500;

    p {
        margin-left: 25px;
        margin-bottom: 0;
    }
}

#expedients {
    grid-area: 3 / 2 / 4 / 3;

    margin-top: 48px;
    height: calc(100% - 48px);
    width: 100%;

    display: flex;
    align-items: center;
    justify-content: flex-start;
    flex-direction: column;

    border: $components-border-width solid $primary;
    border-top: none;
    border-radius: 0 0 $components-border-radius $components-border-radius;

    background-color: #fff;

    overflow-y: auto;

    div {
        width: 100%;
        min-height: calc(45px + $components-border-width);

        display: flex;
        justify-content: space-between;
        align-items: center;

        scrollbar-width: 1px;

        &:first-child {
            margin-top: 10px;
        }

        color: #fff;
        font-weight: 500;

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

    .expedient {
        width: 95%;

        border-radius: $components-border-radius;
        background-color: rgba($color: $primary, $alpha: 0.15);

        min-height: 80px;
        color: black;

        border: 3px solid $primary;

        margin-bottom: 10px;

        &:hover {
            box-shadow: 0px 0px 5px $danger;
            border: 3px solid $danger;

            .linkBtn {
                background-color: $danger;
            }
        }
        .linkBtn {
            display: grid;
            place-content: center;

            height: 100%;
            aspect-ratio: 1 / 1;
            background-color: $primary;

            border-radius: 0 6px 6px 0;

            background-image: url("../../icons/expedientLink.svg");
            background-repeat: no-repeat;
            background-position: center;
            background-size: 55%;

            transition: background-size 0.1s ease-in-out;

            &:hover {
                background-image: url("../../icons/expedientLinkActive.svg");

                background-color: $danger;
                cursor: pointer;
                background-size: 60%;
            }
        }
    }
}
</style>
