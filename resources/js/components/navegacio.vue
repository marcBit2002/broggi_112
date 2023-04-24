<template>
    <div id="navegacio">
        <div
            v-on:click="$emit('tab', 1)"
            @mouseover="menuHoverIn(1)"
            @mouseleave="menuHoverOut(1)"
            class="selected"
            style="z-index: 40"
        >
            <p>IDENTIFICACIÓ</p>
        </div>
        <img
            src="/broggi_112/public/assets/icons/arrowHeadFill.svg"
            style="z-index: 35"
        />
        <div
            v-on:click="$emit('tab', 2)"
            @mouseover="menuHoverIn(2)"
            @mouseleave="menuHoverOut(2)"
            style="z-index: 30"
        >
            <p>LOCALITZACIÓ</p>
        </div>
        <img
            src="/broggi_112/public/assets/icons/arrowHead.svg"
            style="z-index: 25"
        />
        <div
            v-on:click="$emit('tab', 3)"
            @mouseover="menuHoverIn(3)"
            @mouseleave="menuHoverOut(3)"
            style="z-index: 20"
        >
            <p>TIPIFICACIÓ</p>
        </div>
        <img
            src="/broggi_112/public/assets/icons/arrowHead.svg"
            style="z-index: 15"
        />
        <div
            v-on:click="$emit('tab', 4)"
            @mouseover="menuHoverIn(4)"
            @mouseleave="menuHoverOut(4)"
            style="z-index: 10"
        >
            <p>DESPATX</p>
        </div>
    </div>
</template>
<script>
export default {
    name: "navegacio",
    props: {
        tab: null,
    },
    data: function () {
        return {
            activeTab: 1,
        };
    },
    methods: {
        menuHoverIn(tabIndex) {
            const tabs = document.querySelectorAll("#navegacio div");
            const arrows = document.querySelectorAll("#navegacio img");

            if (tabIndex != this.tab) {
                switch (tabIndex) {
                    case 1:
                        arrows[0].setAttribute(
                            "src",
                            "/broggi_112/public/assets/icons/arrowHeadHover.svg"
                        );
                        tabs[0].classList.add("hovered");
                        break;
                    case 2:
                        arrows[1].setAttribute(
                            "src",
                            "/broggi_112/public/assets/icons/arrowHeadHover.svg"
                        );
                        tabs[1].classList.add("hovered");
                        break;
                    case 3:
                        arrows[2].setAttribute(
                            "src",
                            "/broggi_112/public/assets/icons/arrowHeadHover.svg"
                        );
                        tabs[2].classList.add("hovered");
                        break;
                    case 4:
                        tabs[3].classList.add("hovered");
                        break;
                }
            }
        },
        menuHoverOut(tabIndex) {
            const tabs = document.querySelectorAll("#navegacio div");
            const arrows = document.querySelectorAll("#navegacio img");

            if (tabIndex != this.tab) {
                switch (tabIndex) {
                    case 1:
                        arrows[0].setAttribute(
                            "src",
                            "/broggi_112/public/assets/icons/arrowHead.svg"
                        );
                        tabs[0].classList.remove("hovered");
                        break;
                    case 2:
                        arrows[1].setAttribute(
                            "src",
                            "/broggi_112/public/assets/icons/arrowHead.svg"
                        );
                        tabs[1].classList.remove("hovered");
                        break;
                    case 3:
                        arrows[2].setAttribute(
                            "src",
                            "/broggi_112/public/assets/icons/arrowHead.svg"
                        );
                        tabs[2].classList.remove("hovered");
                        break;
                    case 4:
                        tabs[3].classList.remove("hovered");
                        break;
                }
            }
        },
    },
    watch: {
        tab() {
            const tabs = document.querySelectorAll("#navegacio div");
            const arrows = document.querySelectorAll("#navegacio img");

            // Elimina la clase selected de tots els tabs
            tabs.forEach((tab) => {
                tab.classList.remove("hovered");
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
            switch (this.tab) {
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
    display: grid;
    place-items: center;
    grid-template-columns: repeat(3, 1fr 0.12fr) 1fr;
    grid-template-rows: 100%;

    border: $components-border-width solid $primary;
    border-radius: $components-border-radius;

    color: $primary;
    background-color: #fff;

    overflow: hidden;

    // Truco para precargar imagenes
    // Al hacer hover, la primera vez tarda en cargar la imagen y hace un efecto visual extraño
    // Precargando la imagen, en el pimer hover como ya esta cargada funciona como debe ser
    &::after {
        position: absolute;
        width: 0;
        height: 0;
        overflow: hidden;
        z-index: -1; // hide images
        content: url("/broggi_112/public/assets/icons/arrowHeadFill.svg")
            url("/broggi_112/public/assets/icons/arrowHeadHover.svg"); // load images
    }

    img {
        height: 100px;
        position: relative;
        justify-self: flex-start;
        user-select: none;
    }

    div {
        height: 100%;
        width: 100%;

        display: flex;
        justify-content: center;
        align-items: center;

        background-color: #fff;

        cursor: pointer;
        font-size: 1rem;

        &:first-child p {
            transform: translateX(7%);
        }

        p {
            margin-bottom: 0;
            font-weight: 500;
            position: relative;
            line-height: 100%;

            &::after {
                content: "";
                position: absolute;
                // width: 6px;
                // height: 6px;
                width: 0px;
                height: 0px;
                right: -10px;
                bottom: 0;
                border-radius: 50%;
                background-color: $warning;
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
        font-size: 1.25em !important;

        // &::after {
        //     right: -15px !important;
        //     width: 10px !important;
        //     height: 10px !important;
        // }
    }
}

.hovered {
    background-color: #cee5ed !important;

    position: relative;

    &::before {
        content: "";
        position: absolute;
        left: -50px;
        height: 100%;
        width: 50px;

        background-color: #cee5ed;
    }

    p {
        font-weight: 500 !important;
        font-size: 1.25em !important;
    }
}

@media (max-width: 1250px) {
    #navegacio {
        div {
            font-size: 0.8rem !important;
        }
    }
}

@media (max-width: 1050px) {
    .selected {
        p {
            font-size: 1em !important;
        }
    }
    .hovered {
        p {
            font-size: 1em !important;
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
