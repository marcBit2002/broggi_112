<template>
    <div id="navegacio">
        <div style="z-index: 40">
            <p>IDENTIFICACIÓ</p>
        </div>
        <img src="../../icons/arrowHead.svg" style="z-index: 35" />
        <div class="selected" style="z-index: 30">
            <p>LOCALITZACIÓ</p>
        </div>
        <img src="../../icons/arrowHeadFill.svg" style="z-index: 25" />
        <div style="z-index: 20">
            <p>TIPIFICACIÓ</p>
        </div>
        <img src="../../icons/arrowHead.svg" style="z-index: 15" />
        <div style="z-index: 10">
            <p>DESPATX</p>
        </div>
    </div>
</template>
<script>
export default {
    name: "navegacio",
};
</script>
<style lang="scss" scoped>
@import "../../css/variables.scss";

#navegacio {
    background-color: #fff;

    border: $components-border-width solid $primary;
    border-radius: $components-border-radius;

    display: grid;
    place-items: center;
    grid-template-columns: 1fr 0.15fr 1fr 0.15fr 1fr 0.15fr 1fr;
    grid-template-rows: 100%;
    grid-column-gap: 0px;
    grid-row-gap: 0px;

    overflow: hidden;

    img {
        height: 100px;
        position: relative;
        justify-self: flex-start;
    }

    div {
        height: 100%;
        width: 100%;

        display: flex;
        justify-content: center;
        align-items: center;

        background-color: #fff;

        &:first-child p {
            transform: translateX(7%);
        }

        p {
            margin-bottom: 0;
            font-weight: 400;
            font-size: 1.1rem;
        }
    }
}

.selected {
    background-color: $primary !important;

    position: relative;

    &::before {
        content: "";
        position: absolute;
        left: -50px;
        height: 100%;
        width: 50px;

        background-color: $primary;
    }

    p {
        color: #fff;
        font-weight: 500 !important;
        font-size: 1.4rem !important;
    }
}

@media (max-width: 950px) {
    #navegacio {
        div {
            p {
                transform: translateX(5px);
            }
            &:last-child p {
                transform: translateX(0px);
            }
        }
    }
}
</style>
