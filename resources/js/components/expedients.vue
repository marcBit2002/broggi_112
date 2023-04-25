<template>
    <div id="title">
        <p>Expedients</p>
    </div>

    <div id="expedients">
        <div v-if="expedients.length == 0 && !isLoaded" role="status">
            <div class="spinner-border text-primary m-3"></div>
        </div>
        <p
            class="expedientInfoMsg"
            v-if="!telefon && !municipi && !incidentTipos && isLoaded"
        >
            Cap expedient coincideix.
        </p>
        <div
            class="expedient"
            v-for="expedient in expedients"
            :class="{ selected: expedient.codi == expedientId }"
            @click="linkExpedient(expedient.codi)"
        >
            <div class="info">
                <div class="incident">
                    <p>
                        {{ expedient.codi }}
                    </p>
                    <p>
                        <i class="bi bi-fire"></i>
                        {{ expedient.incident }}
                    </p>
                </div>
                <div class="location">
                    <p>
                        <i class="bi bi-geo-alt-fill"></i>
                        {{ expedient.localitat }}
                    </p>
                    <p class="date">
                        {{ this.fechaDiaMes(expedient.date) }}
                        <strong>
                            {{ this.fechaAño(expedient.date) }}
                        </strong>
                    </p>
                </div>
            </div>
            <p class="linkBtn"></p>
        </div>
    </div>
</template>
<script>
export default {
    name: "expedients",
    emits: ["expedient"],
    data() {
        return {
            expedients: [],
            originalExpedients: [],
            originalExpedientId: null,
            isLoaded: false,
        };
    },
    props: {
        allIncidents: null,
        allMunicipis: null,
        expedientId: null,
        telefon: "",
        municipi: "",
        incidentTipos: "",
    },
    computed: {
        dataIN() {
            return this.allIncidents && this.allMunicipis;
        },
        expedientMatchValues() {
            return this.telefon && this.municipi && this.incidentTipos;
        },
    },
    watch: {
        dataIN() {
            this.getExpedients();
        },
        expedientId() {
            // Guardardamos el numero la primera vez que el watch de un cambio (id pasa de '----' a codigo)
            // El resto de veces que watch ve un cambio, no queremos actualizar el id original
            if (this.originalExpedientId === null) {
                this.originalExpedientId = this.expedientId;
            }
        },
        telefon() {
            this.matchExpedients();
        },
        municipi() {
            this.matchExpedients();
        },
        incidentTipos() {
            this.matchExpedients();
        },
    },
    methods: {
        getExpedients() {
            const me = this;
            axios
                .get("expedientsActius")
                .then((response) => {
                    me.expedients = response.data;

                    me.expedients.forEach((expedient) => {
                        const tipos = [];
                        const localitat = [];
                        const dates = [];

                        if (
                            expedient.cartes_trucades &&
                            expedient.cartes_trucades.length > 0
                        ) {
                            expedient.cartes_trucades.forEach((carta) => {
                                tipos.push(carta.incidents_id);
                                localitat.push(carta.municipis_id);

                                var date = new Date(carta.data_hora_trucada);
                                dates.push(date.getTime());
                            });

                            expedient.incident =
                                this.allIncidents[
                                    this.findMostRepeated(tipos)
                                ].tipus_incidents.nom;
                            expedient.localitat =
                                this.allMunicipis[
                                    this.findMostRepeated(localitat)
                                ].nom;

                            expedient.date = new Date(
                                dates.reduce((a, b) => Math.min(a, b))
                            );
                        }
                    });

                    me.originalExpedients = this.expedients;
                    me.matchExpedients();
                    me.isLoaded = true;
                })
                .catch((err) => {
                    console.error("Error" + err);
                });
        },
        fechaDiaMes(fecha) {
            const opciones = {
                day: "2-digit",
                month: "2-digit",
            };

            let date = fecha.toLocaleDateString("es-ES", opciones);

            let parts = date.split("/");
            parts[2] = "<span>" + parts[2] + "</span>";
            let result = parts.join("/");

            return fecha.toLocaleDateString("es-ES", opciones);
        },
        fechaAño(fecha) {
            const opciones = {
                year: "numeric",
            };

            let date = fecha.toLocaleDateString("es-ES", opciones);

            let parts = date.split("/");

            return `/` + parts[0];
        },
        linkExpedient(id) {
            if (this.expedientId != id) {
                this.$emit("expedient", id);
            } else {
                this.$emit("expedient", this.originalExpedientId);
            }
            console.log(id);
        },

        findMostRepeated(array) {
            let mostRepeated = null;
            let count = 0;
            let obj = array.reduce((acc, curr) => {
                if (curr in acc) {
                    acc[curr]++;
                } else {
                    acc[curr] = 1;
                }
                if (acc[curr] > count) {
                    mostRepeated = curr;
                    count = acc[curr];
                }
                return acc;
            }, {});
            return mostRepeated;
        },
        incidentIDtoNAME(id) {
            return axios
                .get("expedient", id)
                .then((res) => res.data)
                .catch((err) => console.error(err));
        },
        matchExpedients() {
            this.expedients = this.originalExpedients.filter(
                (expedient) =>
                    (this.telefon !== "" &&
                        expedient.cartes_trucades.some((carta) =>
                            carta.telefon.toString().startsWith(this.telefon)
                        )) ||
                    expedient.localitat === this.municipi ||
                    expedient.incident === this.incidentTipos
            );
        },
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

    .selected {
        box-shadow: 0px 0px 5px $danger !important;
        border: 3px solid $danger !important;

        background-color: rgba($color: $danger, $alpha: 0.05) !important;

        .linkBtn {
            background-color: $danger !important;

            background-image: url("../../icons/expedientLinkActive.svg") !important;

            background-size: 60% !important;
        }

        i {
            color: $danger !important;
        }
    }
    .expedient {
        width: 100%;
        min-height: calc(45px + $components-border-width);

        display: flex;
        justify-content: flex-start;
        align-items: center;

        scrollbar-width: 1px;

        .info {
            width: 100%;
            text-align: right;
            margin-left: 10px;

            .incident {
                display: flex;
                justify-content: flex-end;

                p {
                    &:first-child {
                        margin-right: auto;
                    }

                    &:last-child {
                        font-style: italic;
                        font-weight: 700;
                        white-space: nowrap;
                        overflow: hidden;
                        text-overflow: ellipsis;
                        max-width: clamp(140px, -3.7rem + 26.5vw, 280px);
                        margin-right: 20px;
                    }
                }

                i {
                    color: $danger;
                }
            }

            .location {
                display: flex;
                justify-content: flex-end;
                align-items: center;

                p {
                    &:first-child {
                        font-weight: 500;
                        white-space: nowrap;
                        overflow: hidden;
                        text-overflow: ellipsis;
                        max-width: clamp(70px, -7rem + 22.5vw, 215px);
                        margin-right: auto;
                    }

                    i {
                        color: $primary;
                    }
                }

                .date {
                    font-size: clamp(0.75rem, 1.6vw, 1rem);

                    color: $primary;
                    margin-right: 20px;
                    strong {
                        margin-left: -0.25rem;
                    }
                }
            }
        }

        &:first-child {
            margin-top: 10px;
        }

        color: #fff;
        font-weight: 500;

        p {
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

        cursor: pointer;

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
        }

        &:hover {
            .linkBtn {
                background-image: url("../../icons/expedientLinkActive.svg");

                background-color: $danger;
                background-size: 60%;
            }
        }
    }
}

.expedientInfoMsg {
    color: rgba($color: $dark, $alpha: 0.6);
    margin: 1.5rem 0 0 0;
    font-size: 1.15rem;
}
</style>
