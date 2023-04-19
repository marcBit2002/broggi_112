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
                        type="text"
                        pattern="[0-9]*"
                        id="telefon"
                        class="form-control"
                        v-model="carta.telefon"
                        @input="$emit('telefon', carta.telefon)"
                        required
                    />
                </div>
                <a
                    tabindex="-1"
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
                    tabindex="-1"
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
                    tabindex="-1"
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
                    tabindex="-1"
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
                            :checked="!this.catalunya"
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
                            <template v-if="item.nom !== 'Provincia'">
                                <div class="form-check col">
                                    <input
                                        class="form-check-input"
                                        type="radio"
                                        name="localitzacio"
                                        :id="item.id"
                                        :disabled="!this.catalunya"
                                        v-on:click="carta.localitzacio = item"
                                    />
                                    <label
                                        class="form-check-label"
                                        :for="item.id"
                                        :disabled="!this.catalunya"
                                        v-on:click="
                                            this.catalunya
                                                ? (carta.localitzacio = item)
                                                : ''
                                        "
                                    >
                                        {{ item.nom }}
                                    </label>
                                </div>
                            </template>
                            <template v-else>
                                <div class="form-check col">
                                    <input
                                        class="form-check-input"
                                        type="radio"
                                        name="localitzacio"
                                        :id="item.id"
                                        :disabled="this.catalunya"
                                        :checked="!this.catalunya"
                                        v-on:click="carta.localitzacio = item"
                                    />
                                    <label
                                        class="form-check-label"
                                        :for="item.id"
                                        :disabled="this.catalunya"
                                        v-on:click="
                                            !this.catalunya
                                                ? (carta.localitzacio = item)
                                                : ''
                                        "
                                    >
                                        {{ item.nom }}
                                    </label>
                                </div>
                            </template>
                        </template>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <searchInput
                        :name="
                            carta.provincia == null
                                ? 'Provincia'
                                : provincies[carta.provincia - 1].text
                        "
                        :options="provincies"
                        :defaultPlaceholder="'Provincia'"
                        @searchValue="(id) => (carta.provincia = id)"
                    ></searchInput>
                </div>
                <div class="col" v-if="catalunya">
                    <searchInput
                        :name="
                            carta.comarca == null
                                ? 'Comarca'
                                : comarques[carta.comarca - 1].text
                        "
                        :options="comarques"
                        :defaultPlaceholder="'Comarca'"
                        @searchValue="(id) => (carta.comarca = id)"
                    ></searchInput>
                </div>
                <div class="col">
                    <searchInput
                        :name="
                            carta.municipi == null
                                ? 'Municipi'
                                : municipis[carta.municipi - 1].text
                        "
                        :options="municipis"
                        :defaultPlaceholder="'Municipi'"
                        @searchValue="(id) => (carta.municipi = id)"
                        @searchName="(name) => this.$emit('municipi', name)"
                    ></searchInput>
                </div>
            </div>
            <div class="row text-center mt-4" v-if="carta.localitzacio">
                <div class="col" style="position: relative">
                    <h3>DADES {{ carta.localitzacio["nom"] }}</h3>
                    <div v-if="carta.localitzacio['nom'] === 'Carrer'">
                        <div class="row g-3 align-items-center mt-2">
                            <div class="col-sm-2 text-end">
                                <label for="tipusVia" class="col-form-label"
                                    >Tipus de via:</label
                                >
                            </div>
                            <div class="col-sm-8">
                                <searchInput
                                    :name="
                                        carta.tipusVia == null
                                            ? 'Tipus de Via'
                                            : tipusVia[carta.tipusVia - 1].text
                                    "
                                    :options="tipusVia"
                                    :defaultPlaceholder="'Tipus de Via'"
                                    @searchValue="(id) => (carta.tipusVia = id)"
                                    @searchName="
                                        (id) => (carta.tipusViaNom = id)
                                    "
                                ></searchInput>
                            </div>
                            <a
                                tabindex="-1"
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
                                tabindex="-1"
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
                                tabindex="-1"
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
                                tabindex="-1"
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
                                tabindex="-1"
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
                                tabindex="-1"
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
                                tabindex="-1"
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
                    <div v-if="carta.localitzacio['nom'] === 'Carretera'">
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
                                tabindex="-1"
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
                                tabindex="-1"
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
                                tabindex="-1"
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
                                tabindex="-1"
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
                    <div v-if="carta.localitzacio['nom'] === 'Punt Singular'">
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
                                tabindex="-1"
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
                                tabindex="-1"
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
                            carta.localitzacio['nom'] === 'ENTITAT/Població' ||
                            carta.localitzacio['nom'] === 'Provincia'
                        "
                    >
                        <div class="row g-3 align-items-center mt-2">
                            <div class="col-sm-4 text-start">
                                <label for="altresRef" class="col-form-label"
                                    >Altres referències:</label
                                >
                            </div>
                            <a
                                tabindex="-1"
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
                    <tr class="fila">
                        <td
                            v-for="tipus in tipusIncidents"
                            :id="tipus.id"
                            :key="tipus.id"
                            v-bind:class="
                                tipus.nom == selectedIncidentNom
                                    ? 'tipusSelected'
                                    : ''
                            "
                            @click="loadIncident(tipus.id)"
                        >
                            {{ tipus.nom }}
                        </td>
                    </tr>
                </table>
            </div>
            <div v-if="selectedIncident">
                <div style="height: 100%">
                    <div class="incidents">
                        <table>
                            <tr class="fila">
                                <td
                                    v-for="incident in incidents"
                                    :key="incident.id"
                                    @click="loadIncidentInfo(incident.id)"
                                >
                                    {{ incident.nom }}
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div v-else>
                <div class="row g-3 align-items-center mb-2">
                    <div class="col-sm-2 text-end">
                        <label for="codi" class="col-form-label">Codi:</label>
                    </div>
                    <div class="col-sm-8">
                        <input
                            type="text"
                            id="codi"
                            class="form-control"
                            :value="incidentInfo.codi"
                            disabled
                        />
                    </div>
                </div>
                <div class="row g-3 align-items-center mb-2">
                    <div class="col-sm-2 text-end">
                        <label for="nom" class="col-form-label">Nom:</label>
                    </div>
                    <div class="col-sm-8">
                        <input
                            disabled
                            class="form-control"
                            type="text"
                            :value="incidentInfo.nom"
                        />
                    </div>
                </div>
                <div class="row g-3 align-items-center mb-2">
                    <div class="col-sm-2 text-end">
                        <label for="tipus" class="col-form-label">Tipus:</label>
                    </div>
                    <div class="col-sm-8">
                        <input
                            type="text"
                            id="tipus"
                            class="form-control"
                            :value="incidentInfo.tipus_incidents.nom"
                            disabled
                        />
                    </div>
                </div>
                <div class="row g-3 align-items-center mb-3">
                    <div class="col-sm-2 text-end">
                        <label for="definicio" class="col-form-label"
                            >Definició:</label
                        >
                    </div>
                    <div class="col-sm-8">
                        <textarea
                            type="text"
                            id="definicio"
                            class="form-control"
                            :value="incidentInfo.definicio"
                            disabled
                            rows="3"
                        />
                    </div>
                </div>
                <div class="row g-3 align-items-center mb-4">
                    <div class="col-sm-2 text-end">
                        <label for="instruccions" class="col-form-label"
                            >Instruccions:</label
                        >
                    </div>
                    <div class="col-sm-8">
                        <textarea
                            type="text"
                            id="instruccions"
                            class="form-control"
                            :value="incidentInfo.instruccions"
                            disabled
                            rows="5"
                        />
                    </div>
                </div>
            </div>
        </div>

        <!-- -------------- DESPATX -------------- -->
        <div class="content" v-if="this.tab == 4">
            <h1 id="title">Despatx</h1>
            <mapa></mapa>
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
import axios from "axios";
import mapa from "./mapa.vue";

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
            incidents: null,
            selectedId: null,
            selectedIncident: -1,
            selectedIncidentNom: null,
            tipusVia: this.getTipusVia(),
            incidentInfo: null,
        };
    },
    components: {
        searchInput,
        mapa,
    },
    props: {
        tab: null,
        notaContent: null,
        tipusIncidents: null,
        allIncidents: null,
    },
    watch: {
        notaContent() {
            this.carta.nota = this.notaContent;
        },
        catalunya() {
            if (this.catalunya) {
                this.carta.localitzacio = undefined;
            } else {
                // Seteamos todos los radios en unchecked
                let radios = document.querySelectorAll(
                    `input[name="localitzacio`
                );

                radios.forEach((radio) => {
                    radio.checked = false;
                });

                // Selecionamos todos los labels de los radios
                let labels = document.querySelectorAll(
                    `input[name="localitzacio"] + label`
                );

                // Si el label es 'Provincia', guardamos el id i nombre
                labels.forEach((label) => {
                    if (label.textContent === "Provincia") {
                        // console.log(label.getAttribute("for"), label.innerHTML);
                        this.carta.localitzacio = {
                            id: label.getAttribute("for"),
                            nom: label.innerHTML,
                        };
                    }
                });
            }
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

            axios.get("provincia").then((response) => {
                for (const key in response.data) {
                    const provincia = response.data[key];

                    const newProvincia = {
                        value: provincia.id,
                        text: provincia.nom,
                    };

                    allProvincies.push(newProvincia);
                }
            });
            return allProvincies;
        },
        getComarques() {
            const allComarques = [];

            axios.get("comarca").then((response) => {
                for (const key in response.data) {
                    const comarca = response.data[key];

                    const newComarca = {
                        value: comarca.id,
                        text: comarca.nom,
                    };

                    allComarques.push(newComarca);
                }
            });
            return allComarques;
        },
        getMunicipis() {
            const allMunicipis = [];

            axios.get("municipi").then((response) => {
                for (const key in response.data) {
                    const municipi = response.data[key];

                    const newMunicipi = {
                        value: municipi.id,
                        text: municipi.nom,
                    };

                    allMunicipis.push(newMunicipi);
                }
            });
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
        loadIncident(id) {
            this.tipusIncidents.filter((incident) => {
                if (incident["id"] == id) {
                    this.selectedIncidentNom = incident["nom"];
                    this.$emit("incidentTipos", incident["nom"]);
                }
            });

            this.incidents = this.allIncidents.filter(
                (i) => i["tipus_incidents"].id == id
            );

            this.selectedId = id;
            this.selectedIncident = true;
        },
        loadIncidentInfo(id) {
            this.incidentInfo = this.allIncidents.find(
                (incident) => incident.id === id
            );
            this.selectedIncident = false;
            this.carta.incidentId = id;
        },
        textt(val) {
            console.log(val);
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
    & > * {
        margin-top: 30px;
    }

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
    .fila {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;

        .tipusSelected {
            background-color: $warning;
            color: black;
        }
    }
    .fila td {
        &:nth-child(1) {
            border-radius: $components-border-radius 0 0 0;
        }
        &:nth-child(5) {
            border-radius: 0 $components-border-radius 0 0;
        }
        &:nth-child(6) {
            border-radius: 0 0 0 $components-border-radius;
        }
        &:nth-child(10) {
            border-radius: 0 0 $components-border-radius 0;
        }
        display: grid;
        place-content: center;

        width: calc(20%); /* 20% para 5 iteraciones por fila*/
        padding: 5px;
        background: $primary;
        color: white;
        border: 2px solid white;
        transition: background-color 0.3s ease;
        cursor: pointer;
        .selected {
            color: $dark;
            background-color: $warning;
        }
    }
}

.tipus-incidents td:hover {
    background-color: $warning;
    color: $dark;
}

.search {
    width: 35%;
    input {
        background-color: white;
    }
}

.incidents {
    overflow-y: auto;
    overflow-x: hidden;
    max-height: 300px;
    margin-bottom: 30px;

    table {
        width: 100%;
    }

    .fila {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
    }

    .fila td {
        width: calc(33.33% - 4px);
        height: auto;
        padding: 10px;
        margin-bottom: 5px;
        border: 2px solid $primary;
        background-color: white;
        color: $secondary;
        transition: background-color 0.3s ease;
        cursor: pointer;
    }

    .fila td:hover {
        background-color: $warning;
        color: $dark;
    }

    /* Espaciado entre filas */
    .fila + .fila {
        margin-top: 10px;
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
