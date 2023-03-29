<template>
    <div id="pagina">
        <div class="content" v-if="this.tab == 1">
            <h1 id="title">Identificació</h1>

            <div class="row g-3 align-items-center">
                <div class="col-sm-2 text-end">
                    <label for="inputPassword6" class="col-form-label"
                        >Telèfon:</label
                    >
                </div>
                <div class="col-sm-8">
                    <input
                        type="password"
                        id="inputPassword6"
                        class="form-control"
                        aria-describedby="passwordHelpInline"
                    />
                </div>
                <a
                    tabindex="0"
                    class="arki"
                    role="button"
                    data-bs-toggle="popover"
                    data-bs-trigger="focus"
                    data-bs-title="Help Box"
                    data-bs-content="And here's some amazing content. It's very engaging. Right?"
                >
                    <img src="/broggi_112/public/assets/icons/arki.svg" />
                </a>
            </div>
            <div class="row g-3 align-items-center">
                <div class="col-sm-2 text-end">
                    <label for="inputPassword6" class="col-form-label"
                        >Nom:</label
                    >
                </div>
                <div class="col-sm-8">
                    <input
                        type="password"
                        id="inputPassword6"
                        class="form-control"
                        aria-describedby="passwordHelpInline"
                    />
                </div>
                <a
                    tabindex="0"
                    class="arki"
                    role="button"
                    data-bs-toggle="popover"
                    data-bs-trigger="focus"
                    data-bs-title="Help Box"
                    data-bs-content="And here's some amazing content. It's very engaging. Right?"
                >
                    <img src="/broggi_112/public/assets/icons/arki.svg" />
                </a>
            </div>
            <div class="row g-3 align-items-center">
                <div class="col-sm-2 text-end">
                    <label for="inputPassword6" class="col-form-label"
                        >Cognoms:</label
                    >
                </div>
                <div class="col-sm-8">
                    <input
                        type="password"
                        id="inputPassword6"
                        class="form-control"
                        aria-describedby="passwordHelpInline"
                    />
                </div>
                <a
                    tabindex="0"
                    class="arki"
                    role="button"
                    data-bs-toggle="popover"
                    data-bs-trigger="focus"
                    data-bs-title="Help Box"
                    data-bs-content="And here's some amazing content. It's very engaging. Right?"
                >
                    <img src="/broggi_112/public/assets/icons/arki.svg" />
                </a>
            </div>

            <div class="row g-3 align-items-center">
                <div class="col-sm-4 text-start">
                    <label for="antecedents" class="col-form-label"
                        >Antecedents</label
                    >
                </div>
                <a
                    tabindex="0"
                    class="arki"
                    role="button"
                    data-bs-toggle="popover"
                    data-bs-trigger="focus"
                    data-bs-title="Help Box"
                    data-bs-content="And here's some amazing content. It's very engaging. Right?"
                >
                    <img src="/broggi_112/public/assets/icons/arki.svg" />
                </a>
                <textarea
                    class="form-control"
                    id="floatingTextarea"
                    rows="3"
                ></textarea>
            </div>
        </div>
        <div class="content" v-if="this.tab == 2">
            <h1 id="title">Localització</h1>

            <div class="mb-3 row">
                <label for="inputPassword" class="col-sm-4 col-form-label"
                    >Està a Catalunya?</label
                >
                <div class="col-sm-8">
                    <div class="form-check">
                        <input
                            class="form-check-input"
                            type="radio"
                            name="flexRadioDefault"
                            id="flexRadioDefault1"
                            checked
                        />
                        <label class="form-check-label" for="flexRadioDefault1">
                            Si
                        </label>
                    </div>
                    <div class="form-check">
                        <input
                            class="form-check-input"
                            type="radio"
                            name="flexRadioDefault"
                            id="flexRadioDefault2"
                        />
                        <label class="form-check-label" for="flexRadioDefault2">
                            No
                        </label>
                    </div>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="inputPassword" class="col-sm-4 col-form-label"
                    >Tipus localització:</label
                >
                <div class="col">
                    <div class="col row">
                        <div class="form-check col">
                            <input
                                class="form-check-input"
                                type="radio"
                                name="flexRadioDefault"
                                id="flexRadioDefault1"
                                checked
                            />
                            <label
                                class="form-check-label"
                                for="flexRadioDefault1"
                            >
                                Carrer
                            </label>
                        </div>
                        <div class="form-check col">
                            <input
                                class="form-check-input"
                                type="radio"
                                name="flexRadioDefault"
                                id="flexRadioDefault2"
                            />
                            <label
                                class="form-check-label"
                                for="flexRadioDefault2"
                            >
                                Punt Singular
                            </label>
                        </div>
                        <div class="form-check col">
                            <input
                                class="form-check-input"
                                type="radio"
                                name="flexRadioDefault"
                                id="flexRadioDefault2"
                            />
                            <label
                                class="form-check-label"
                                for="flexRadioDefault2"
                            >
                                Carretera
                            </label>
                        </div>
                    </div>
                    <div class="col row">
                        <div class="form-check col">
                            <input
                                class="form-check-input"
                                type="radio"
                                name="flexRadioDefault"
                                id="flexRadioDefault1"
                                checked
                            />
                            <label
                                class="form-check-label"
                                for="flexRadioDefault1"
                            >
                                ENTITAT/Població
                            </label>
                        </div>
                        <div class="form-check col">
                            <input
                                class="form-check-input"
                                type="radio"
                                name="flexRadioDefault"
                                id="flexRadioDefault2"
                            />
                            <label
                                class="form-check-label"
                                for="flexRadioDefault2"
                            >
                                Comarca
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content" v-if="this.tab == 3">
            <h1 id="title">Tipificació</h1>
        </div>
        <div class="content" v-if="this.tab == 4">
            <h1 id="title">Despatx</h1>
        </div>
        <div id="navigation_buttons">
            <button type="button" class="btn btn-outline-secondary">
                Descartar carta
            </button>
            <button
                v-if="this.tab != 1"
                type="button"
                class="btn btn-outline-primary me-3"
                v-on:click="$emit('tab', -1)"
            >
                Anterior
            </button>
            <button
                v-if="this.tab < 4"
                type="button"
                class="btn btn-danger"
                v-on:click="$emit('tab', 1)"
            >
                Següent
            </button>
            <button
                v-else
                type="button"
                class="btn btn-danger"
                v-on:click="this.insertCarta()"
            >
                Finalitzar
            </button>
        </div>
    </div>
</template>
<script>
import "../bootstrap";
import * as bootstrap from "bootstrap";

export default {
    name: "pagina",
    props: {
        tab: null,
    },
    watch: {
        tab() {},
    },
    methods: {
        insertCarta() {
            alert("CARTA DONE!");
        },
        removePopovers() {
            const popovers = document.querySelectorAll(".popover");
            popovers.forEach((popover) => {
                popover.remove();
            });
        },
    },
    updated() {
        this.removePopovers();

        const popoverTriggerList = document.querySelectorAll(
            '[data-bs-toggle="popover"]'
        );

        const popoverList = [...popoverTriggerList].map(
            (popoverTriggerEl) => new bootstrap.Popover(popoverTriggerEl)
        );
    },
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

    padding: 1.6rem;
    background-color: #fff;
}

#title {
    color: $primary;
    margin-bottom: 3rem;

    &::before {
        content: url("/broggi_112/public/assets/icons/arrowTitle.svg");
        margin-right: 8px;
    }
}

#navigation_buttons {
    margin-top: auto;
    width: 100%;

    display: flex;

    button {
        &:first-child {
            margin-right: auto;
        }
    }
}

.arki {
    width: 18px;
    height: 18px;
    margin-left: 5px;
    margin-bottom: 2px;
    cursor: pointer;
    user-select: none;

    img {
        width: 18px;
        height: 18px;
    }
}

// #region PAGINA
.content {
    width: 100%;
    color: $dark;

    font-size: 1.25rem;
    font-weight: 500;

    .input_group {
        display: flex;
        align-items: center;
        justify-content: start;

        margin-bottom: 2rem;

        .nom-input {
            margin-right: 2rem;
            width: 125px;
            text-align: right;
        }

        input {
            border: $components-border-width solid $primary;
            border-radius: $components-border-radius;
        }

        a {
            width: 18px;
            height: 18px;
            margin-left: 5px;
            margin-bottom: 2px;
            cursor: pointer;
            user-select: none;
        }
    }

    .radio-group {
        display: flex;
    }
    .antecedents {
        margin-top: 3rem;

        label {
            display: block;
        }

        textarea {
            width: 100%;
            height: 120px;

            padding: 1rem;

            border: $components-border-width solid $primary;
            border-radius: $components-border-radius;

            font-size: 1rem;
            resize: none;
        }
    }
}
// #endregion

@media (max-width: 1050px) {
    #pagina {
        padding: 1rem;
    }
}
</style>
