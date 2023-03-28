<template>
    <div id="pagina">
        <div class="content" v-if="this.tab == 1">
            <h1 id="title">Identificació</h1>
            <div class="input_group">
                <label for="telefon">Telèfon:</label>
                <input type="tel" id="telefon" name="telefon" value="" />
                <img
                    src="/broggi_112/public/assets/icons/arki.svg"
                    class="arki"
                    data-bs-toggle="popover"
                    data-bs-trigger="focus"
                    data-bs-title="Help Box"
                    data-bs-content="And here's some amazing content. It's very engaging. Right?"
                />
            </div>
            <div class="input_group">
                <label for="nom">Nom:</label>
                <input
                    type="text"
                    id="nom"
                    name="nom"
                    value=""
                    style="width: 400px"
                />
                <img
                    src="/broggi_112/public/assets/icons/arki.svg"
                    class="arki"
                    data-bs-toggle="popover"
                    data-bs-title="Help Box"
                    data-bs-content="And here's some amazing content. It's very engaging. Right?"
                />
            </div>
            <div class="input_group">
                <label for="cognoms">Cognoms:</label>
                <input
                    type="text"
                    id="cognoms"
                    name="cognoms"
                    value=""
                    style="width: 400px"
                />
                <img
                    src="/broggi_112/public/assets/icons/arki.svg"
                    class="arki"
                    data-bs-toggle="popover"
                    data-bs-title="Help Box"
                    data-bs-content="And here's some amazing content. It's very engaging. Right?"
                />
            </div>
            <div class="antecedents">
                <label for="antecedents">Antecedents</label>
                <textarea
                    name="antecedents"
                    id="antecedents"
                    rows="5"
                ></textarea>
            </div>
        </div>
        <div class="content" v-if="this.tab == 2">
            <h1 id="title">Localització</h1>
            <div class="input_group">
                <label for="estaCatalnya">Està a Catalunya?</label>
                <input type="checkbox" id="estaCatalnya" value="" />
                <input type="checkbox" id="noEstaCatalnya" value="" />
                <img
                    src="/broggi_112/public/assets/icons/arki.svg"
                    class="arki"
                    data-bs-toggle="popover"
                    data-bs-trigger="focus"
                    data-bs-title="Help Box"
                    data-bs-content="And here's some amazing content. It's very engaging. Right?"
                />
            </div>
            <div class="input_group">
                <label>Tipus localització:</label>
                <input type="radio" id="age1" name="age" value="30" />
                <label for="age1">Carrer</label>
                <input type="radio" id="age2" name="age" value="60" />
                <label for="age2">Punt Singular</label>
                <input type="radio" id="age3" name="age" value="100" />
                <label for="age3">Carretera</label>
                <input type="radio" id="age3" name="age" value="100" />
                <label for="age3">ENTITAT/Població</label>
                <input type="radio" id="age3" name="age" value="100" />
                <label for="age3">Comarca</label>
                <img
                    src="/broggi_112/public/assets/icons/arki.svg"
                    class="arki"
                    data-bs-toggle="popover"
                    data-bs-trigger="focus"
                    data-bs-title="Help Box"
                    data-bs-content="And here's some amazing content. It's very engaging. Right?"
                />
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

// #region PAGINA
.content {
    width: 100%;
    color: $dark;

    .input_group {
        font-size: 1.25rem;
        font-weight: 500;

        display: flex;
        align-items: center;

        margin-bottom: 2rem;

        label {
            &:first-child {
                margin-right: 2rem;
                width: 130px;
                text-align: right;
            }
        }

        input {
            border: $components-border-width solid $primary;
            border-radius: $components-border-radius;
        }

        img {
            width: 18px;
            height: 18px;
            margin-left: 5px;
            margin-bottom: 2px;
            align-self: flex-end;
            cursor: pointer;
            user-select: none;
        }
    }

    .antecedents {
        font-size: 1.25rem;
        font-weight: 500;

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
