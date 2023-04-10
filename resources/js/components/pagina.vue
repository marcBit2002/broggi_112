<template>
    <div id="pagina">
        <div class="content" v-if="this.tab == 1">
            <h1 id="title">Identificació</h1>

            <div class="row g-3 align-items-center">
                <div class="col-sm-2 text-end">
                    <label for="telefon" class="col-form-label">Telèfon:</label>
                </div>
                <div class="col-sm-8">
                    <input
                        type="tel"
                        id="telefon"
                        class="form-control"
                        v-model="carta.telefon"
                        required
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
                    <label for="nom" class="col-form-label">Nom:</label>
                </div>
                <div class="col-sm-8">
                    <input
                        type="text"
                        id="nom"
                        class="form-control"
                        v-model="carta.nom"
                        required
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
                    <label for="cognoms" class="col-form-label">Cognoms:</label>
                </div>
                <div class="col-sm-8">
                    <input
                        type="text"
                        id="cognoms"
                        class="form-control"
                        v-model="carta.cognoms"
                        required
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
                    v-model="carta.antecedents"
                    required
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
                            name="estaCatalunya"
                            id="estaCatalunya"
                            checked
                        />
                        <label class="form-check-label" for="estaCatalunya">
                            Si
                        </label>
                    </div>
                    <div class="form-check">
                        <input
                            class="form-check-input"
                            type="radio"
                            name="estaCatalunya"
                            id="noEstaCatalunya"
                        />
                        <label class="form-check-label" for="noEstaCatalunya">
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
                                name="localitzacio"
                                id="carrer"
                                v-on:click="this.localitzacio = 'DADES Carrer'"
                            />
                            <label
                                class="form-check-label"
                                for="carrer"
                                v-on:click="this.localitzacio = 'DADES Carrer'"
                            >
                                Carrer
                            </label>
                        </div>
                        <div class="form-check col">
                            <input
                                class="form-check-input"
                                type="radio"
                                name="localitzacio"
                                id="puntSingular"
                                v-on:click="
                                    this.localitzacio = 'DADES Punt Singular'
                                "
                            />
                            <label
                                class="form-check-label"
                                for="puntSingular"
                                v-on:click="
                                    this.localitzacio = 'DADES Punt Singular'
                                "
                            >
                                Punt Singular
                            </label>
                        </div>
                        <div class="form-check col">
                            <input
                                class="form-check-input"
                                type="radio"
                                name="localitzacio"
                                id="carretera"
                                v-on:click="
                                    this.localitzacio = 'DADES Carretera'
                                "
                            />
                            <label
                                class="form-check-label"
                                for="carretera"
                                v-on:click="
                                    this.localitzacio = 'DADES Carretera'
                                "
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
                                name="localitzacio"
                                id="poblacio"
                                v-on:click="
                                    this.localitzacio =
                                        'DADES ENTITAT / Població'
                                "
                            />
                            <label
                                class="form-check-label"
                                for="poblacio"
                                v-on:click="
                                    this.localitzacio =
                                        'DADES ENTITAT / Població'
                                "
                            >
                                ENTITAT/Població
                            </label>
                        </div>
                        <div class="form-check col">
                            <input
                                class="form-check-input"
                                type="radio"
                                name="localitzacio"
                                id="comarca"
                                v-on:click="this.localitzacio = 'DADES Comarca'"
                            />
                            <label
                                class="form-check-label"
                                for="comarca"
                                v-on:click="this.localitzacio = 'DADES Comarca'"
                            >
                                Comarca
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <searchInput
                        :name="'Provincia'"
                        :options="provincies"
                    ></searchInput>
                </div>
                <div class="col">
                    <searchInput
                        :name="'Comarca'"
                        :options="comarques"
                    ></searchInput>
                </div>
                <div class="col">
                    <searchInput
                        :name="'Municipi'"
                        :options="municipis"
                    ></searchInput>
                </div>
            </div>
            <div class="row text-center mt-4" v-if="this.localitzacio">
                <div class="col" style="position: relative">
                    <h3>{{ this.localitzacio }}</h3>
                </div>
            </div>
        </div>
        <div class="content" v-if="this.tab == 3">
            <h1 id="title">Tipificació</h1>
            <div class="tipus-incidents">
                <table>
                    <tr>
                        <td>tipus</td>
                        <td>tipus</td>
                        <td>tipus</td>
                        <td>tipus</td>
                        <td>tipus</td>
                    </tr>
                    <tr>
                        <td>tipus</td>
                        <td>tipus</td>
                        <td class="selected">tipus</td>
                        <td>tipus</td>
                        <td>tipus</td>
                    </tr>
                </table>
            </div>
            <div class="search">
                <div class="input-group">
                    <span
                        class="input-group-text border border-primary border-3 border-end-0 text-warning"
                    >
                        <i class="bi bi-search"></i>
                    </span>
                    <input
                        type="search"
                        class="form-control border border-3 border-start-0 border-primary"
                        placeholder="Buscar"
                    />
                </div>
            </div>
            <div class="incidents">
                <table>
                    <tr>
                        <td>tipus</td>
                        <td>tipus</td>
                    </tr>
                    <tr>
                        <td>tipus</td>
                        <td>tipus</td>
                    </tr>
                    <tr>
                        <td>tipus</td>
                        <td>tipus</td>
                    </tr>
                    <tr>
                        <td>tipus</td>
                        <td>tipus</td>
                    </tr>
                    <tr>
                        <td>tipus</td>
                        <td>tipus</td>
                    </tr>
                    <tr>
                        <td>tipus</td>
                        <td class="selected">tipus</td>
                    </tr>
                    <tr>
                        <td>tipus</td>
                        <td>tipus</td>
                    </tr>
                    <tr>
                        <td>tipus</td>
                        <td>tipus</td>
                    </tr>
                    <tr>
                        <td>tipus</td>
                        <td>tipus</td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="content" v-if="this.tab == 4">
            <h1 id="title">Despatx</h1>
        </div>
        <div id="navigation_buttons">
            <a
                type="button"
                href="javascript:history.back()"
                class="btn btn-outline-secondary"
            >
                Descartar carta
            </a>
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
import searchInput from "./searchInput.vue";

export default {
    name: "pagina",
    data: function () {
        return {
            localitzacio: null,
            carta: {},
            provincies: this.getProvincies(),
            comarques: this.getComarques(),
            municipis: this.getMunicipis(),
        };
    },
    components: {
        searchInput,
    },
    props: {
        tab: null,
    },
    watch: {
        tab() {},
    },
    methods: {
        insertCarta() {
            alert(JSON.stringify(this.carta));
        },
        removePopovers() {
            const popovers = document.querySelectorAll(".popover");
            popovers.forEach((popover) => {
                popover.remove();
            });
        },
        getProvincies() {
            const allProvincies = [];

            axios
                .get("provincia")
                .then((response) => {
                    for (const key in response.data) {
                        const provincia = response.data[key];

                        const newProvincia = {
                            value: provincia.id,
                            text: provincia.nom,
                        };

                        allProvincies.push(newProvincia);
                    }
                })
                .catch((error) => {});
            return allProvincies;
        },
        getComarques() {
            const allComarques = [];

            axios
                .get("comarca")
                .then((response) => {
                    for (const key in response.data) {
                        const comarca = response.data[key];

                        const newComarca = {
                            value: comarca.id,
                            text: comarca.nom,
                        };

                        allComarques.push(newComarca);
                    }
                })
                .catch((error) => {});
            return allComarques;
        },
        getMunicipis() {
            const allMunicipis = [];

            axios
                .get("municipi")
                .then((response) => {
                    for (const key in response.data) {
                        const municipi = response.data[key];

                        const newMunicipi = {
                            value: municipi.id,
                            text: municipi.nom,
                        };

                        allMunicipis.push(newMunicipi);
                    }
                })
                .catch((error) => {});
            return allMunicipis;
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
    mounted() {
        // this.getProvincies();
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
    margin-bottom: 2rem;

    &::before {
        content: url("/broggi_112/public/assets/icons/arrowTitle.svg");
        margin-right: 8px;
    }
}

#navigation_buttons {
    margin-top: auto;
    width: 100%;

    display: flex;
    a {
        margin-right: auto;
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
// #region TIPIFICACIÓ
.tipus-incidents {
    table {
        width: 100%;
        height: 30px;

        margin-bottom: 1rem;

        border-radius: 0.5em;
        border: 2px solid $primary;
        overflow: hidden;

        text-align: center;
    }

    th,
    td {
        padding: 5px;
        background: $primary;
        color: white;
        border: 2px solid white;
    }

    .selected {
        color: $dark;
        background-color: $warning;
    }
}

.search {
    width: 35%;
    input {
        background-color: white;
    }
}

.incidents {
    table {
        width: 100%;

        margin-top: 1rem;

        border: 2px solid $primary;
        overflow: hidden;

        text-align: center;
    }

    td {
        color: $secondary;
        border: 2px solid $primary;
    }

    .selected {
        background-color: $warning;
    }
}

// #endregion

h3 {
    color: $primary;

    z-index: 1;
    background-color: #fff;

    position: relative;

    text-transform: uppercase;

    &::before {
        content: "";
        display: block;
        width: 100%;
        height: 2px;

        position: absolute;
        bottom: -6px;
        right: 0;

        border-radius: 10px;

        background-color: rgba($color: $primary, $alpha: 0.5);
    }
}

// #endregion

@media (max-width: 1050px) {
    #pagina {
        padding: 1rem;
    }
}
</style>
