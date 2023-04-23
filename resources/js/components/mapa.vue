<template>
    <div class="container">
        <input
            type="text"
            id="buscador"
            class="form-control"
            placeholder="Introdueix la direcció"
            v-model="direccion"
            @input="debounce(cargarLocalitzacio, 800)"
            @keyup.enter="cargarLocalitzacio()"
            @blur="cargarLocalitzacio()"
        />
        <div id="map"></div>
        <h2 id="agenciesTitle">Agències seleccionades:</h2>
        <div id="containerAgencies">
            <div
                v-for="agencia in agenciasSeleccionadas"
                :key="agencia.id"
                class="card m-2"
                style="width: 18rem"
            >
                <div class="card-body">
                    <h5 class="card-title">{{ agencia.nom }}</h5>
                    <p class="card-text">
                        {{ agencia.carrer }}
                    </p>
                    <button
                        class="btn btn-danger"
                        @click="deseleccionarAgencia(agencia)"
                    >
                        ELIMINAR
                    </button>
                    <div
                        class="hover-bg"
                        @click="deseleccionarAgencia(agencia)"
                    ></div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import axios from "axios";

export default {
    props: {
        buscarString: String,
    },
    data() {
        return {
            direccion: this.buscarString,
            agencias: [],
            mapboxClient: null,
            agenciasSeleccionadas: [],
            map: {},
            marker: null,
            debounceTimeout: null,
        };
    },

    created() {
        mapboxgl.accessToken =
            "pk.eyJ1IjoibWFyY2JpdDIwMDIiLCJhIjoiY2xnZzcyZjk5MDh2OTNxcnJoOGtjYXJkNCJ9.di7gnS5p1QxJO0VS1yuwZg";
        this.mapboxClient = mapboxSdk({
            accessToken: mapboxgl.accessToken,
        });
    },
    mounted() {
        this.cargarAgencias();
    },
    methods: {
        cargarMapa() {
            this.mapboxClient.geocoding
                .forwardGeocode({
                    query: this.direccion,
                    autocomplete: false,
                    limit: 1,
                })
                .send()
                .then((response) => {
                    if (
                        !response ||
                        !response.body ||
                        !response.body.features ||
                        !response.body.features.length
                    ) {
                        console.error("Invalid response:");
                        console.error(response);
                        return;
                    }
                    const feature = response.body.features[0];

                    this.map = new mapboxgl.Map({
                        container: "map",
                        style: "mapbox://styles/mapbox/streets-v9",
                        center: feature.center,
                        zoom: 15,
                        interactive: true,
                    });

                    this.marker = new mapboxgl.Marker()
                        .setLngLat(feature.center)
                        .addTo(this.map);
                });
        },
        cargarLocalitzacio() {
            this.mapboxClient.geocoding
                .forwardGeocode({
                    query: this.direccion,
                    autocomplete: false,
                    limit: 1,
                })
                .send()
                .then((response) => {
                    console.log(this.direccion);
                    if (
                        !response ||
                        !response.body ||
                        !response.body.features ||
                        !response.body.features.length
                    ) {
                        console.error("Invalid response:");
                        console.error(response);
                        return;
                    }
                    const feature = response.body.features[0];

                    if (this.marker) {
                        // Si existe, eliminarlo
                        this.marker.remove();
                    }

                    this.marker = new mapboxgl.Marker()
                        .setLngLat(feature.center)
                        .addTo(this.map);
                    this.map.flyTo({
                        center: feature.center,
                        zoom: 15,
                        interactive: true,
                    });
                });
        },
        cargarAgencias() {
            axios.get("agencia").then((response) => {
                this.agencias = response.data;
                this.cargarMapa();
                this.agregarMarcadoresAgencias();
            });
        },
        agregarMarcadoresAgencias() {
            this.agencias.forEach((agencia) => {
                const direccion = agencia.carrer + "," + agencia.municipis.nom;
                this.mapboxClient.geocoding
                    .forwardGeocode({
                        query: direccion,
                        autocomplete: false,
                        limit: 1,
                    })
                    .send()
                    .then((response) => {
                        if (
                            !response ||
                            !response.body ||
                            !response.body.features ||
                            !response.body.features.length
                        ) {
                            console.error("Invalid response:");
                            console.error(response);
                            return;
                        }
                        const feature = response.body.features[0];

                        let iconClass;
                        let iconColor;

                        if (agencia.nom.toLowerCase().includes("bombers")) {
                            iconClass = "bi bi-fire fs-4";
                            iconColor = "red";
                        } else if (
                            agencia.nom.toLowerCase().includes("policia") ||
                            agencia.nom.toLowerCase().includes("urbana")
                        ) {
                            iconClass = "bi bi-shield-fill fs-4";
                            iconColor = "blue";
                        } else if (
                            agencia.nom.toLowerCase().includes("hospital")
                        ) {
                            iconClass = "bi bi-heart-fill fs-4 ";
                            iconColor = "green";
                        } else {
                            iconClass = "bi-person-fill fs-4 ";
                            iconColor = "purple";
                        }

                        const markerElement = document.createElement("div");
                        markerElement.className = "marker";
                        markerElement.innerHTML = `<i class="${iconClass}" style="color:${iconColor}"></i>`;

                        const marker = new mapboxgl.Marker(markerElement)
                            .setLngLat(feature.center)
                            .addTo(this.map);

                        marker.getElement().addEventListener("click", () => {
                            const estaSeleccionada =
                                this.agenciasSeleccionadas.includes(agencia);
                            const buttonText = estaSeleccionada
                                ? "Deseleccionar"
                                : "Seleccionar";
                            const buttonColor = estaSeleccionada
                                ? "#087ca6"
                                : "#de1278";
                            const popup = new mapboxgl.Popup({
                                offset: 25,
                            }).setHTML(
                                `<h5 class="popup">${agencia.nom}</h5><p class="popup">${agencia.carrer}</p><button style="background-color: ${buttonColor}">${buttonText}</button>`
                            );
                            popup.addTo(this.map);
                            marker.setPopup(popup);

                            popup.on("open", () => {
                                popup
                                    .getElement()
                                    .querySelector("button").onclick = () => {
                                    if (estaSeleccionada) {
                                        this.deseleccionarAgencia(agencia);
                                    } else {
                                        this.seleccionarAgencia(agencia);
                                    }
                                    popup.remove();
                                };
                            });
                        });
                    });
            });
        },

        debounce(func, delay) {
            clearTimeout(this.debounceTimeout);
            this.debounceTimeout = setTimeout(() => func.call(this), delay);
        },

        seleccionarAgencia(agencia) {
            if (!this.agenciasSeleccionadas.includes(agencia)) {
                this.agenciasSeleccionadas.push(agencia);
            }
        },
        deseleccionarAgencia(agencia) {
            const index = this.agenciasSeleccionadas.indexOf(agencia);
            if (index !== -1) {
                this.agenciasSeleccionadas.splice(index, 1);
            }
        },
    },
};
</script>
<style lang="scss">
@import "../../css/variables.scss";

#buscador {
    margin-bottom: 10px;
    border-radius: $components-border-radius;

    &:focus {
        box-shadow: none;
    }
}
#map {
    width: 100%;
    height: 400px;
    border: 2px solid $primary;
    box-sizing: border-box;
    padding: 10px;
    margin-top: 10px;
    border-radius: 10px;
    margin-left: 0;
}

#agenciesTitle {
    margin: 20px 0;
    font-size: 1.75rem;
    color: $primary;
}

#containerAgencies {
    display: flex;
    flex-wrap: wrap;
    overflow: hidden;

    width: 100%;
    height: auto;

    border-radius: $components-border-radius;
    border: 2px solid $primary;

    padding: 10px;
    min-height: 100px;

    justify-content: flex-start;

    position: relative;

    .card {
        flex: 1 !important;
        min-width: 30%;
        border: 2px solid $primary;

        &:hover {
            cursor: pointer;
        }

        &:hover .btn {
            opacity: 1;
        }

        &:hover .hover-bg {
            opacity: 1;
        }
    }

    .hover-bg {
        position: absolute;
        top: 0;
        left: 0;

        width: 100%;
        height: 100%;
        background-color: rgba($color: $dark, $alpha: 0.5);
        backdrop-filter: blur(2px);

        opacity: 0;

        transition: opacity 0.3s ease-in-out;

        z-index: 1;
    }

    .card-title {
        color: $primary;
        font-size: 1.25rem;
    }

    .card-text {
        color: $danger;
        font-size: 1rem;
        margin-bottom: 0;
    }

    .btn {
        position: absolute;

        top: 50%;
        left: 50%;
        opacity: 0;
        transform: translate(-50%, -50%);

        transition: opacity 0.2s linear;
        transition-delay: 0.2s;

        z-index: 2;
    }
}

.agencies-list {
    display: flex;
    flex-wrap: wrap;
}

.agency-pill {
    width: 32.5%;

    background-color: #eee;
    padding: 1rem;
    border-radius: 20px;

    margin-bottom: 0.5rem;

    display: flex;
    align-items: center;

    button {
        background-color: transparent;
        border: none;
        font-size: 20px;
        line-height: 1;
        margin-left: 10px;
    }
}

.mapboxgl-popup-content {
    border-radius: 6px;
    font-family: "Figtree", sans-serif;
    box-shadow: 0px 0px 10px rgba($color: $dark, $alpha: 0.75);

    display: flex;
    flex-direction: column;

    h5 {
        color: $primary;
        font-size: 1.15rem;
    }

    p {
        color: $danger;
        font-weight: bold;
        font-size: 1rem;
    }

    button:not(.mapboxgl-popup-close-button) {
        border-radius: $components-border-radius;
        background-color: $danger;

        color: white;
        font-size: 1rem;
    }
}

.mapboxgl-popup-close-button {
    color: $primary;
    font-size: 26px;
}
</style>
