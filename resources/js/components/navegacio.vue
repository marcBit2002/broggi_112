<template>
    <div id="navegacio">
        <div @click="activeTab = 1" class="selected" style="z-index: 40">
            <p>IDENTIFICACIÓ</p>
        </div>
        <img
            src="/broggi_112/public/assets/icons/arrowHeadFill.svg"
            style="z-index: 35"
        />
        <div @click="activeTab = 2" style="z-index: 30">
            <p>LOCALITZACIÓ</p>
        </div>
        <img
            src="/broggi_112/public/assets/icons/arrowHead.svg"
            style="z-index: 25"
        />
        <div @click="activeTab = 3" style="z-index: 20">
            <p>TIPIFICACIÓ</p>
        </div>
        <img
            src="/broggi_112/public/assets/icons/arrowHead.svg"
            style="z-index: 15"
        />
        <div @click="activeTab = 4" style="z-index: 10">
            <p>DESPATX</p>
        </div>
    </div>
</template>
<script>
export default {
    name: "navegacio",
    data: function () {
        return {
            activeTab: 1,
        };
    },
    methods: {},
    watch: {
        // Cuando cambia el activaTab, se ejecuta ⬇️
        activeTab: function () {
            const tabs = document.querySelectorAll("#navegacio div");
            const arrows = document.querySelectorAll("#navegacio img");

            // Elimina la clase selected de tots els tabs
            tabs.forEach((tab) => {
                tab.classList.remove("selected");
            });

            // Cambia les arrows dels tabs a no actives
            arrows.forEach((arrow) => {
                arrow.setAttribute(
                    "src",
                    "/broggi_112/public/assets/icons/arrowHead.svg"
                );
            });

            // Seteja la clase activa i cambia la arrow activa
            switch (this.activeTab) {
                case 1:
                    tabs[0].classList.add("selected");
                    arrows[0].setAttribute(
                        "src",
                        "/broggi_112/public/assets/icons/arrowHeadFill.svg"
                    );
                    break;
                case 2:
                    tabs[1].classList.add("selected");
                    arrows[1].setAttribute(
                        "src",
                        "/broggi_112/public/assets/icons/arrowHeadFill.svg"
                    );
                    break;
                case 3:
                    tabs[2].classList.add("selected");
                    arrows[2].setAttribute(
                        "src",
                        "/broggi_112/public/assets/icons/arrowHeadFill.svg"
                    );
                    break;
                case 4:
                    tabs[3].classList.add("selected");
                    break;
            }
        },
    },
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
    grid-template-columns: repeat(3, 1fr 0.12fr) 1fr;
    grid-template-rows: 100%;

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
            position: relative;
            line-height: 100%;

            &::after {
                content: "";
                position: absolute;
                width: 6px;
                height: 6px;
                right: -10px;
                bottom: 0;
                border-radius: 50%;
                background-color: red;
            }
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

        &::after {
            right: -15px !important;
            width: 10px !important;
            height: 10px !important;
        }
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
