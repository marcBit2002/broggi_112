<template>
    <div id="pagina">
        <!-- -------------- IDENTIFICACIÓ -------------- -->
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

        <!-- -------------- LOCALITZACIÓ -------------- -->
        <div class="content" v-if="this.tab == 2">
            <h1 id="title">Localització</h1>

            <div class="mb-3 row">
                <label for="inputPassword" class="col-sm-4 col-form-label">
                    Està a Catalunya?
                </label>
                <div class="col-sm-8">
                    <div class="form-check">
                        <input
                            class="form-check-input"
                            type="radio"
                            name="estaCatalunya"
                            id="estaCatalunya"
                            checked
                            v-on:click="this.catalunya = true"
                        />
                        <label
                            class="form-check-label"
                            for="estaCatalunya"
                            v-on:click="this.catalunya = true"
                        >
                            Si
                        </label>
                    </div>
                    <div class="form-check">
                        <input
                            class="form-check-input"
                            type="radio"
                            name="estaCatalunya"
                            id="noEstaCatalunya"
                            v-on:click="this.catalunya = false"
                        />
                        <label
                            class="form-check-label"
                            for="noEstaCatalunya"
                            v-on:click="this.catalunya = false"
                        >
                            No
                        </label>
                    </div>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="inputLocalitzacio" class="col-sm-4 col-form-label">
                    Tipus localització:
                </label>
                <div class="col">
                    <div class="col row">
                        <template v-for="item in tipusLocalitzacions">
                            <div class="form-check col" v-if="this.catalunya">
                                <input
                                    class="form-check-input"
                                    type="radio"
                                    name="localitzacio"
                                    :id="item.id"
                                    v-on:click="this.localitzacio = item.nom"
                                />
                                <label
                                    class="form-check-label"
                                    :for="item.id"
                                    v-on:click="this.localitzacio = item.nom"
                                >
                                    {{ item.nom }}
                                </label>
                            </div>
                            <div class="form-check col" v-else>
                                <template v-if="item.nom == 'Comarca'">
                                    <input
                                        class="form-check-input"
                                        type="radio"
                                        name="localitzacio"
                                        :id="item.id"
                                        :checked="
                                            (this.localitzacio = item.nom)
                                        "
                                    />
                                    <label
                                        class="form-check-label"
                                        :for="item.id"
                                        v-on:click="
                                            this.localitzacio = item.nom
                                        "
                                    >
                                        {{ item.nom }}
                                    </label>
                                </template>
                                <template v-else>
                                    <input
                                        class="form-check-input"
                                        type="radio"
                                        name="localitzacio"
                                        :id="item.id"
                                        disabled="true"
                                    />
                                    <label
                                        class="form-check-label"
                                        :for="item.id"
                                        v-on:click="
                                            this.localitzacio = item.nom
                                        "
                                    >
                                        {{ item.nom }}
                                    </label>
                                </template>
                            </div>
                        </template>
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
                    <h3>DADES {{ this.localitzacio }}</h3>
                    <div v-if="this.localitzacio === 'Carrer'">
                        <div class="row g-3 align-items-center mt-2">
                            <div class="col-sm-2 text-end">
                                <label for="tipusVia" class="col-form-label"
                                    >Tipus de via:</label
                                >
                            </div>
                            <div class="col-sm-8">
                                <searchInput
                                    :name="'Tipus de Via'"
                                    :options="tipusVia"
                                ></searchInput>
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
                                <img
                                    src="/broggi_112/public/assets/icons/arki.svg"
                                />
                            </a>
                        </div>
                        <div class="row g-3 align-items-center">
                            <div class="col-sm-2 text-end">
                                <label for="nomCarrer" class="col-form-label"
                                    >Nom:</label
                                >
                            </div>
                            <div class="col-sm-8">
                                <input
                                    type="text"
                                    id="nomCarrer"
                                    class="form-control"
                                    v-model="carta.nomLocalitzacio"
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
                                <img
                                    src="/broggi_112/public/assets/icons/arki.svg"
                                />
                            </a>
                        </div>
                        <div class="row g-3 align-items-center">
                            <div class="col-sm-2 text-end">
                                <label for="numero" class="col-form-label"
                                    >Número:</label
                                >
                            </div>
                            <div class="col-sm-1">
                                <input
                                    type="text"
                                    id="numero"
                                    class="form-control"
                                    v-model="carta.numero"
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
                                <img
                                    src="/broggi_112/public/assets/icons/arki.svg"
                                />
                            </a>
                            <div class="col-sm-1 text-end ms-2">
                                <label for="escala" class="col-form-label"
                                    >Escala:</label
                                >
                            </div>
                            <div class="col-sm-1">
                                <input
                                    type="text"
                                    id="escala"
                                    class="form-control"
                                    v-model="carta.escala"
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
                                <img
                                    src="/broggi_112/public/assets/icons/arki.svg"
                                />
                            </a>
                            <div class="col-sm-1 text-end ms-1">
                                <label for="pis" class="col-form-label"
                                    >Pis:</label
                                >
                            </div>
                            <div class="col-sm-1">
                                <input
                                    type="text"
                                    id="pis"
                                    class="form-control"
                                    v-model="carta.pis"
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
                                <img
                                    src="/broggi_112/public/assets/icons/arki.svg"
                                />
                            </a>
                            <div class="col-sm-1 text-end ms-2">
                                <label for="porta" class="col-form-label"
                                    >Porta:</label
                                >
                            </div>
                            <div class="col-sm-1">
                                <input
                                    type="text"
                                    id="porta"
                                    class="form-control"
                                    v-model="carta.porta"
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
                                <img
                                    src="/broggi_112/public/assets/icons/arki.svg"
                                />
                            </a>
                        </div>
                        <div class="row g-3 align-items-center mt-2">
                            <div class="col-sm-4 text-start">
                                <label for="altresRef" class="col-form-label"
                                    >Altres referències:</label
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
                                <img
                                    src="/broggi_112/public/assets/icons/arki.svg"
                                />
                            </a>
                            <textarea
                                class="form-control"
                                id="floatingTextarea"
                                rows="2"
                                v-model="carta.altresRef"
                                required
                            ></textarea>
                        </div>
                    </div>
                    <div v-if="this.localitzacio === 'Carretera'">
                        <div class="row g-3 align-items-center mt-2">
                            <div class="col-sm-2 text-end">
                                <label for="nom" class="col-form-label"
                                    >Nom:</label
                                >
                            </div>
                            <div class="col-sm-8">
                                <input
                                    type="text"
                                    id="nom"
                                    class="form-control"
                                    v-model="carta.nomLocalitzacio"
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
                                <img
                                    src="/broggi_112/public/assets/icons/arki.svg"
                                />
                            </a>
                        </div>
                        <div class="row g-3 align-items-center">
                            <div class="col-sm-2 text-end">
                                <label for="km" class="col-form-label"
                                    >KM:</label
                                >
                            </div>
                            <div class="col-sm-2">
                                <input
                                    type="text"
                                    id="km"
                                    class="form-control"
                                    v-model="carta.km"
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
                                <img
                                    src="/broggi_112/public/assets/icons/arki.svg"
                                />
                            </a>
                            <div class="col-sm-1 text-end ms-5">
                                <label for="sentit" class="col-form-label"
                                    >Sentit:</label
                                >
                            </div>
                            <div class="col-sm-2">
                                <input
                                    type="text"
                                    id="sentit"
                                    class="form-control"
                                    v-model="carta.sentit"
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
                                <img
                                    src="/broggi_112/public/assets/icons/arki.svg"
                                />
                            </a>
                        </div>
                        <div class="row g-3 align-items-center mt-2">
                            <div class="col-sm-4 text-start">
                                <label for="altresRef" class="col-form-label"
                                    >Altres referències:</label
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
                                <img
                                    src="/broggi_112/public/assets/icons/arki.svg"
                                />
                            </a>
                            <textarea
                                class="form-control"
                                id="floatingTextarea"
                                rows="2"
                                v-model="carta.altresRef"
                                required
                            ></textarea>
                        </div>
                    </div>
                    <div v-if="this.localitzacio === 'Punt Singular'">
                        <div class="row g-3 align-items-center mt-2">
                            <div class="col-sm-2 text-end">
                                <label for="nom" class="col-form-label"
                                    >Nom:</label
                                >
                            </div>
                            <div class="col-sm-8">
                                <input
                                    type="text"
                                    id="nom"
                                    class="form-control"
                                    v-model="carta.nomLocalitzacio"
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
                                <img
                                    src="/broggi_112/public/assets/icons/arki.svg"
                                />
                            </a>
                        </div>
                        <div class="row g-3 align-items-center mt-2">
                            <div class="col-sm-4 text-start">
                                <label for="altresRef" class="col-form-label"
                                    >Altres referències:</label
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
                                <img
                                    src="/broggi_112/public/assets/icons/arki.svg"
                                />
                            </a>
                            <textarea
                                class="form-control"
                                id="floatingTextarea"
                                rows="2"
                                v-model="carta.altresRef"
                                required
                            ></textarea>
                        </div>
                    </div>
                    <div
                        v-if="
                            this.localitzacio === 'ENTITAT/Població' ||
                            this.localitzacio == 'Comarca'
                        "
                    >
                        <div class="row g-3 align-items-center mt-2">
                            <div class="col-sm-4 text-start">
                                <label for="altresRef" class="col-form-label"
                                    >Altres referències:</label
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
                                <img
                                    src="/broggi_112/public/assets/icons/arki.svg"
                                />
                            </a>
                            <textarea
                                class="form-control"
                                id="floatingTextarea"
                                rows="3"
                                v-model="carta.altresRef"
                                required
                            ></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- -------------- TIPIFICACIÓ -------------- -->
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

        <!-- -------------- DESPATX -------------- -->
        <div class="content" v-if="this.tab == 4">
            <h1 id="title">Despatx</h1>
        </div>

        <!-- -------------- BOTONS DESCARTAR/SEGüENT/FINALITZAR -------------- -->
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
            catalunya: true,
            tipusLocalitzacions: this.getTipusLocalitzacions(),
            localitzacio: null,
            carta: {},
            provincies: this.getProvincies(),
            comarques: this.getComarques(),
            municipis: this.getMunicipis(),
            tipusVia: this.getTipusVia(),
        };
    },
    components: {
        searchInput,
    },
    props: {
        tab: null,
        notaContent: null,
    },
    watch: {
        notaContent() {
            this.carta.nota = this.notaContent;
        },
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
        getTipusLocalitzacions() {
            const allLocalitzacions = [];

            axios
                .get("tipusLocalitzacions")
                .then((response) => {
                    for (const key in response.data) {
                        const localitzacio = response.data[key];

                        const newLocalitzacio = {
                            id: localitzacio.id,
                            nom: localitzacio.nom,
                        };

                        allLocalitzacions.push(newLocalitzacio);
                    }
                })
                .catch((error) => {});
            return allLocalitzacions;
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
        getTipusVia() {
            const allTipusVia = [];

            axios
                .get("tipusVies")
                .then((response) => {
                    for (const key in response.data) {
                        const tipusVia = response.data[key];

                        const newTipus = {
                            value: tipusVia.id,
                            text: tipusVia.nom,
                        };

                        allTipusVia.push(newTipus);
                    }
                })
                .catch((error) => {});
            return allTipusVia;
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

    overflow: auto;
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
