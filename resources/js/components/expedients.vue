<template>
    <div id="title">
        <p>Expedients</p>
    </div>

    <div id="expedients">
        <div
            v-if="expedients.length == 0"
            class="spinner-border text-primary m-3"
            role="status"
        >
            <span class="visually-hidden">Loading...</span>
        </div>
        <div class="expedient" v-for="(expedient, index) in expedients">
            <div class="info">
                <p class="incident">
                    {{ expedient.incident }}
                </p>
                <div>
                    <p>
                        {{ expedient.localitat }}
                    </p>
                    <p class="date">
                        {{ this.formatearFecha(expedient.date) }}
                    </p>
                </div>
            </div>
            <p class="linkBtn" v-bind:class="{ 'selected': isSelected === index }" @click="linkExpedient(expedient.codi,index)"></p>
        </div>
    </div>
</template>
<script>
export default {
    name: "expedients",
    data () {
        return {
            expedients: [],
            isSelected: -1,
            
        };
    },
    props: {
        allIncidents: null,
        allMunicipis: null,
    },
    computed: {
        dataIN() {
            return this.allIncidents && this.allMunicipis;
        },
    },
    watch: {
        dataIN() {
            this.getExpedients();
        },
    },
    methods: {
        getExpedients() {
            const me = this;
            axios
                .get("expedient")
                .then((response) => {
                    me.expedients = response.data.filter(
                        (i) => i.estat_expedients_id !== 4
                    );

                    me.expedients.forEach((expedient) => {
                        const tipos = [];
                        const localitat = [];
                        const dates = [];

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
                    });
                })
                .then()
                .catch((err) => {
                    console.error("Error" + err);
                });
        },
        formatearFecha(fecha) {
            const opciones = {
                day: "2-digit",
                month: "2-digit",
                year: "numeric",
            };
            return fecha.toLocaleDateString("es-ES", opciones);
        },
        linkExpedient(id,index) {
            this.$emit("expedient", id);
            console.log(id, this.isSelected);
            this.isSelected = index;
 
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
        color: green ;
        background-color: red !important;
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
            text-align: left;
            margin-left: 10px;

            .incident {
                font-style: italic;
                font-weight: 700;
                white-space: nowrap;
                overflow: hidden;
                text-overflow: ellipsis;
                max-width: 29ch;
            }

            div {
                display: flex;
                justify-content: flex-start;

                p:first-child {
                    margin-right: 10px;
                }

                .date {
                    color: $primary;
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

            &:hover {
                background-image: url("../../icons/expedientLinkActive.svg");

                background-color: $danger;
                cursor: pointer;
                background-size: 60%;
            }
        }
    }
}
</style>
