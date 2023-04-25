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
                        v-model="carta.telefon"
                        @input="
                            $emit('telefon', carta.telefon), checkInput($event)
                        "
                        @blur="checkInput($event)"
                        class="form-control"
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
                    data-bs-content="Please tell me your phone number so we can contact you if needed."
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
                    data-bs-content="Can you tell me your name?"
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
                    data-bs-content="Can you tell me your surname?"
                >
                    <img src="/broggi_112/public/assets/icons/arki.svg" />
                </a>
            </div>

            <div class="row g-3 align-items-center">
                <div class="col-sm-4 text-start">
                    <label for="antecedents" class="col-form-label"
                        >Antecedents</label
                    >
                    <a
                        tabindex="-1"
                        class="arki"
                        role="button"
                        data-bs-toggle="popover"
                        data-bs-trigger="focus"
                        data-bs-title="Help Box"
                        data-bs-content="Have you called us before or have you had any previous interactions with us?"
                    >
                        <img src="/broggi_112/public/assets/icons/arki.svg" />
                    </a>
                </div>

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
                    <a
                        tabindex="-1"
                        class="arki ms-3"
                        role="button"
                        data-bs-toggle="popover"
                        data-bs-trigger="focus"
                        data-bs-title="Help Box"
                        data-bs-placement="bottom"
                        data-bs-content="Please tell me where you are (Street, Road, Landmark, Town/city, Province)"
                    >
                        <img src="/broggi_112/public/assets/icons/arki.svg" />
                    </a>
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
                                        :checked="
                                            carta.localitzacio &&
                                            item.id &&
                                            catalunya &&
                                            carta.localitzacio.nom == item.nom
                                        "
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
                <div class="col d-flex">
                    <searchInput
                        :name="
                            carta.provincia == null
                                ? 'Provincia'
                                : provincies[carta.provincia - 1].text
                        "
                        :options="provincies"
                        :defaultPlaceholder="'Provincia'"
                        @searchValue="(id) => (carta.provincia = id)"
                        @searchName="
                            (name) => {
                                this.carta.provinciaNom = name;
                            }
                        "
                    ></searchInput>
                </div>
                <div class="col d-flex" v-if="catalunya">
                    <searchInput
                        :name="
                            carta.comarca == null
                                ? 'Comarca'
                                : comarques[carta.comarca - 1].text
                        "
                        :options="comarques"
                        :defaultPlaceholder="'Comarca'"
                        @searchValue="(id) => (carta.comarca = id)"
                        @searchName="
                            (name) => {
                                this.carta.comarcaNom = name;
                            }
                        "
                    ></searchInput>
                </div>
                <div class="col d-flex">
                    <searchInput
                        :name="
                            carta.municipi == null
                                ? 'Municipi'
                                : municipis[carta.municipi - 1].text
                        "
                        :options="municipis"
                        :defaultPlaceholder="'Municipi'"
                        @searchValue="(id) => (carta.municipi = id)"
                        @searchName="
                            (name) => {
                                this.$emit('municipi', name);
                                this.carta.municipiNom = name;
                            }
                        "
                    ></searchInput>
                    <a
                        tabindex="-1"
                        class="arki"
                        role="button"
                        data-bs-toggle="popover"
                        data-bs-trigger="focus"
                        data-bs-title="Help Box"
                        data-bs-placement="bottom"
                        data-bs-content="Where are you(city)?"
                    >
                        <img src="/broggi_112/public/assets/icons/arki.svg" />
                    </a>
                </div>
            </div>
            <div class="row text-center mt-4" v-if="carta.localitzacio">
                <div class="col" style="position: relative">
                    <h3>DADES {{ carta.localitzacio["nom"] }}</h3>
                    <div v-if="carta.localitzacio['nom'] === 'Carrer'">
                        <div class="row g-3 align-items-center mt-2 mb-1">
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
                                    @input="checkInput($event)"
                                    @blur="checkInput($event)"
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
                                data-bs-content="Please tell me the name of the street."
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
                                data-bs-content="Building number"
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
                                data-bs-content="Staircase"
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
                                data-bs-content="Floor"
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
                                data-bs-content="Door number"
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
                                <a
                                    tabindex="-1"
                                    class="arki"
                                    role="button"
                                    data-bs-toggle="popover"
                                    data-bs-trigger="focus"
                                    data-bs-title="Help Box"
                                    data-bs-content="Please provide any other relevant location information."
                                >
                                    <img
                                        src="/broggi_112/public/assets/icons/arki.svg"
                                    />
                                </a>
                            </div>

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
                                    @input="checkInput($event)"
                                    @blur="checkInput($event)"
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
                                data-bs-content="Please tell me the name of the road."
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
                                data-bs-content="Kilometer marker."
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
                                data-bs-content="Direction of travel."
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
                                ><a
                                    tabindex="-1"
                                    class="arki"
                                    role="button"
                                    data-bs-toggle="popover"
                                    data-bs-trigger="focus"
                                    data-bs-title="Help Box"
                                    data-bs-content="Please provide any other relevant location information."
                                >
                                    <img
                                        src="/broggi_112/public/assets/icons/arki.svg"
                                    />
                                </a>
                            </div>

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
                                data-bs-content="Please tell me the name of the landmark."
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
                                ><a
                                    tabindex="-1"
                                    class="arki"
                                    role="button"
                                    data-bs-toggle="popover"
                                    data-bs-trigger="focus"
                                    data-bs-title="Help Box"
                                    data-bs-content="Please provide any other relevant location information."
                                >
                                    <img
                                        src="/broggi_112/public/assets/icons/arki.svg"
                                    />
                                </a>
                            </div>

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
                                <a
                                    tabindex="-1"
                                    class="arki"
                                    role="button"
                                    data-bs-toggle="popover"
                                    data-bs-trigger="focus"
                                    data-bs-title="Help Box"
                                    data-bs-content="Please provide any other relevant location information."
                                >
                                    <img
                                        src="/broggi_112/public/assets/icons/arki.svg"
                                    />
                                </a>
                            </div>

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
            <div class="d-flex align-items-center mb-5">
                <h1 id="title" class="m-0">Tipificació</h1>
                <a
                    tabindex="-1"
                    class="arki ms-3"
                    role="button"
                    data-bs-toggle="popover"
                    data-bs-trigger="focus"
                    data-bs-title="Help Box"
                    data-bs-placement="right"
                    data-bs-content="• Accident = Accident • Assitència sanitària = Health assistance • Incendi = Fire • Fuita(Aigua,Gas, Altres) = Leak (water, gas, other) • Altres incidències = Other incidents • Seguretat = Security • Trànsit =  Traffic • Civisme = Citizenship • Mediambient = Environment • Meteorologia = Weather"
                >
                    <img src="/broggi_112/public/assets/icons/arki.svg" />
                </a>
                <a
                    tabindex="-1"
                    class="arki ms-3"
                    role="button"
                    data-bs-toggle="popover"
                    data-bs-trigger="focus"
                    data-bs-title="Help Box"
                    data-bs-placement="right"
                    data-bs-content="
                    • A man in the street suddenly collapses
                    • Someone in my family has cut their finger deeply
                    • Someone is having difficulty breathing
                    • There has been a car accident in my street and one of the drivers is bleeding uncontrollably
                    • A boy has fallen out of a tree and has broken his leg
                    • Somebody has been shot
                    • My heart is racing
                    • A man has fallen from a boat and is drowning
                    • I feel dizzy
                    • A woman was bitten by a snake
                    • I'm in labour
                    • A person was beaten up
                    • My house is full of smoke. I can't hardly breathe
                    • My grandmother lives alone and  she does not answer my calls nor opens her house door. I think something is wrong
                    • There is a pub nearby and it is 4 a.m and it is still open and people are shouting in the street"
                >
                    <img src="/broggi_112/public/assets/icons/arki.svg" />
                </a>
            </div>
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
        <div class="content" v-show="this.tab == 4">
            <div class="d-flex align-items-center mb-5">
                <h1 id="title" class="m-0">Despatx</h1>
                <a
                    tabindex="-1"
                    class="arki ms-3"
                    role="button"
                    data-bs-toggle="popover"
                    data-bs-trigger="focus"
                    data-bs-title="Help Box"
                    data-bs-placement="right"
                    data-bs-content="I'm sending you (Fireman, Police, Ambulance)"
                >
                    <img src="/broggi_112/public/assets/icons/arki.svg" />
                </a>
            </div>
            <mapa :buscarString="this.carta.localitzacioConcatenada"></mapa>
        </div>

        <!-- -------------- BOTONS DESCARTAR/SEGüENT/FINALITZAR -------------- -->
        <div id="navigation_buttons">
            <a
                type="button"
                class="btn btn-outline-secondary"
                @click="anularWarning('open')"
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
                v-on:click="finalitzarWarning('open')"
            >
                Finalitzar
            </button>
        </div>
    </div>
    <!-- Modals -->
    <!-- Finalitzar -->
    <div
        class="modal fade show"
        id="modal-finalitzar"
        tabindex="-1"
        style="display: none"
    >
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1
                        class="modal-title fs-5"
                        style="color: rgb(8, 124, 167)"
                    >
                        Anem a tancar la carta
                    </h1>
                    <button
                        type="button"
                        class="btn-close"
                        @click="finalitzarWarning('close')"
                    ></button>
                </div>
                <div class="modal-body">
                    <p class="mb-0" style="color: rgb(118, 118, 118)">
                        Eliminar a l'usuari
                        <span
                            id="estil"
                            style="font-style: italic; font-weight: bold"
                            >Operador BROGGI</span
                        >
                        comporta que no podràs recuperar-ho un cop eliminat
                    </p>
                </div>
                <div class="modal-footer">
                    <button
                        type="button"
                        class="btn btn-secondary me-2"
                        @click="finalitzarWarning('close')"
                    >
                        Cancel·lar
                    </button>
                    <button
                        type="button"
                        class="btn btn-danger delete"
                        @click="insertCarta()"
                    >
                        Finalitzar<i class="bi bi-check-lg"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- Descartar carta -->
    <div
        class="modal fade show"
        id="modal-anular"
        tabindex="-1"
        style="display: none"
    >
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1
                        class="modal-title fs-5"
                        style="color: rgb(8, 124, 167)"
                    >
                        Segur que vols descartar la carta?
                    </h1>
                    <button
                        type="button"
                        class="btn-close"
                        @click="anularWarning('close')"
                    ></button>
                </div>
                <div class="modal-body">
                    <p class="mb-0" style="color: rgb(118, 118, 118)">
                        Perdras totes les dades de la carta actual.
                    </p>
                </div>
                <div class="modal-footer">
                    <button
                        type="button"
                        class="btn btn-secondary me-2"
                        @click="anularWarning('close')"
                    >
                        Cancel·lar
                    </button>
                    <button
                        type="button"
                        class="btn btn-danger delete"
                        @click="redirigirMenu()"
                    >
                        Anul·lar<i class="bi bi-check-lg"></i>
                    </button>
                </div>
            </div>
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
    emits: ["tab", "telefon", "municipi", "incidentTipos"],
    data: function () {
        return {
            catalunya: true,
            tipusLocalitzacions: this.getTipusLocalitzacions(),
            localitzacio: null,
            carta: {
                localitzacio: { nom: "" },
                localitzacioConcatenada: "Plaça Urquinaona",
                provincia: null,
                altresRef: "",
                nom: "",
                cognoms: "",
                antecedents: "",
            },
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
        codi: null,
        expedient: null,
        duration: null,
        date: null,
        isAssociated: Boolean,
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
        tab() {
            if (this.tab == 4) {
                let result = this.carta.localitzacioConcatenada;

                let c = this.carta;
                let address = [];

                // Mira si hay valor y añade al array, luego pasa a string
                try {
                    switch (c.localitzacio.nom) {
                        case "Carrer":
                            if (c.nomLocalitzacio)
                                address.push(c.nomLocalitzacio);
                            if (c.numero) address.push(c.numero);
                            if (
                                this.carta.municipiNom &&
                                this.carta.municipiNom != "Municipi"
                            )
                                address.push(this.carta.municipiNom);
                            if (this.carta.provinciaNom)
                                address.push(this.carta.provinciaNom);
                            if (address.length != 0) address.push("Espanya");
                            result = address.join(", ");
                            break;
                        case "Carretera":
                        case "Punt Singular":
                            if (c.nomLocalitzacio)
                                address.push(c.nomLocalitzacio);
                            if (
                                this.carta.municipiNom &&
                                this.carta.municipiNom != "Municipi"
                            )
                                address.push(this.carta.municipiNom);
                            if (this.carta.provinciaNom)
                                address.push(this.carta.provinciaNom);
                            if (address.length != 0)
                                result = address.join(", ");
                            break;
                        case "":
                            break;
                        default:
                        // if (this.carta.municipiNom)
                        //     address.push(this.carta.municipiNom);
                        // address.push("Espanya");
                        // result = address.join(", ");
                        // break;
                    }
                } catch (error) {
                    result = "Plaça Urquinaona";
                }

                if (result == "") {
                    result = this.carta.localitzacioConcatenada;
                }

                this.carta.localitzacioConcatenada = result;
            }
        },
    },
    methods: {
        redirigirMenu() {
            // let currentUrl = window.location.href;
            // let newUrl = currentUrl.replace(/carta$/, "menu");
            // window.location.href = newUrl;
        },
        anularWarning(action) {
            const modal = document.getElementById("modal-anular");

            switch (action) {
                case "open":
                    modal.style.display = "flex";
                    break;
                case "close":
                    modal.style.display = "none";
                    break;
            }
        },
        finalitzarWarning(action) {
            const modal = document.getElementById("modal-finalitzar");
            const modal_title = document.querySelector(
                "#modal-finalitzar .modal-title"
            );
            const modal_body = document.querySelector(
                "#modal-finalitzar .modal-body p"
            );
            const modal_footer = document.querySelector(
                "#modal-finalitzar .modal-footer"
            );
            const modal_btn = document.querySelector(
                "#modal-finalitzar .modal-footer .delete"
            );

            switch (action) {
                case "open":
                    if (
                        this.carta.telefon &&
                        this.carta.localitzacio.id &&
                        this.carta.incidentId &&
                        this.carta.municipi &&
                        this.carta.agencies
                    ) {
                        if (this.isAssociated) {
                            modal_title.innerText =
                                "No tens cap expedient associat";
                            modal_body.innerText = `S'associara la carta a l'expedient: ${this.expedient}?`;
                            modal_footer.style.display = "inherit";
                            modal_btn.innerText = "Finalitzar";
                        } else {
                            modal_title.innerText =
                                "Finalitzem amb l’expedient:";
                            modal_body.innerText = `No hi ha expedient associat.\nVols crear l’expedient: ${this.expedient}?`;
                            modal_footer.style.display = "inherit";
                            modal_btn.innerText = "Finalitzar";
                        }
                    } else {
                        modal_title.innerText =
                            "Error al finalitzar l’expedient:";

                        let body_text = "Falten els camps minims:\n";

                        if (!this.carta.telefon) {
                            body_text += "- Telefon\n";
                        }
                        if (
                            this.carta.localitzacio == null ||
                            this.carta.localitzacio == undefined
                        ) {
                            body_text += "- Localització tipos\n";
                        }
                        if (!this.carta.incidentId) {
                            body_text += "- Incident\n";
                        }
                        if (!this.carta.municipi) {
                            body_text += "- Municipi\n";
                        }
                        if (!this.carta.agencies) {
                            body_text += "- Contactar agència\n";
                        }

                        modal_body.innerText = body_text;
                        modal_footer.style.display = "none";
                    }

                    modal.style.display = "flex";
                    break;
                case "close":
                    modal.style.display = "none";
                    break;
            }
        },
        insertCarta() {
            this.carta.codi = this.codi;
            this.carta.expedient = this.expedient;
            this.carta.duration = this.duration - 1;
            this.carta.date = this.date;
            this.carta.notaComuna = this.notaContent;

            console.log(JSON.stringify(this.carta));

            const me = this;

            axios
                .post("carta", JSON.stringify(me.carta))
                .then((response) => {
                    console.log(response);
                })
                .catch((error) => {});

            this.redirigirMenu();
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
        checkInput(event) {
            if (event.target.value == "") {
                event.target.classList.add("invalid-input");
            } else {
                event.target.classList.remove("invalid-input");
            }
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

.invalid-input {
    border: $components-border-width solid $danger;
    animation-name: shake;
    animation-duration: 0.2s;

    &:focus {
        box-shadow: 0 0 0 0.25rem rgba($color: $danger, $alpha: 0.25);
    }
}

// #endregion

@media (max-width: 1050px) {
    #pagina {
        padding: 1rem;
    }
}

// ANIMATIONS
@keyframes shake {
    0% {
        transform: translate(1px, 1px) rotate(0deg);
    }
    10% {
        transform: translate(-1px, -2px) rotate(-0.05deg);
    }
    20% {
        transform: translate(-3px, 0px) rotate(0.05deg);
    }
    30% {
        transform: translate(3px, 2px) rotate(0deg);
    }
    40% {
        transform: translate(1px, -1px) rotate(0.05deg);
    }
    50% {
        transform: translate(-1px, 2px) rotate(-0.05deg);
    }
    60% {
        transform: translate(-3px, 1px) rotate(0deg);
    }
    70% {
        transform: translate(3px, 1px) rotate(-0.05deg);
    }
    80% {
        transform: translate(-1px, -1px) rotate(0.05deg);
    }
    90% {
        transform: translate(1px, 2px) rotate(0deg);
    }
    100% {
        transform: translate(1px, -2px) rotate(-0.05deg);
    }
}

.modal {
    background-color: rgba($color: $dark, $alpha: 0.5);
    backdrop-filter: blur(2px);
}
</style>
