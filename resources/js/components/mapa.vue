<template>
    <div class="container">
        <input
            type="text"
            class="buscador form-control"
            placeholder="Introduce la dirección"
            v-model="direccion"
            @input="debounce(cargarLocalitzacio, 800)"
            @keyup.enter="cargarLocalitzacio()"
            @blur="cargarLocalitzacio()"
        />
        <div id="map"></div>
        <div class="agencies">
            <h2>Agencias seleccionadas:</h2>
            <div class="agencies-list">
                <div
                    v-for="agencia in agenciasSeleccionadas"
                    :key="agencia.id"
                    class="agency-pill"
                >
                    <span>{{ agencia.nom }} - {{ agencia.carrer }}</span>
                    <button @click="deseleccionarAgencia(agencia)">×</button>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import axios from "axios";

export default {
    props: {
        buscarString: "",
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
<style lang="scss" scoped>
@import "../../css/variables.scss";

.container {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    border-radius: 10px;
    overflow: hidden;
    padding: 0;
}

.buscador {
    margin-bottom: 10px;
}
#map {
    width: 70%;
    height: 400px;
    border-radius: 10px;
    border: 2px solid $primary;
    box-sizing: border-box;
    padding: 10px;
}

.agencies {
    width: 28%;
    height: 400px;
    border-radius: 10px;
    border: 2px solid $primary;
    box-sizing: border-box;
    padding: 10px;
    overflow: auto;
}

.agencies h2 {
    margin-bottom: 10px;
}

.agencies-list {
    display: flex;
    flex-wrap: wrap;
}

.agency-pill {
    background-color: #eee;
    padding: 10px;
    border-radius: 20px;
    margin-right: 10px;
    margin-bottom: 10px;
    display: flex;
    align-items: center;
}

.agency-pill span {
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

.agency-pill button {
    background-color: transparent;
    border: none;
    font-size: 20px;
    line-height: 1;
    margin-left: 10px;
}

.bombers {
    background-color: red;
}
.policia {
    background-color: blue;
}
.hospital {
    background-color: yellow;
}

.Popup {
    border-radius: 6px;
}
.popup {
    font-family: "Figtree", sans-serif !important;
}

@media only screen and (max-width: 980px) {
    .container {
        flex-direction: column;
    }
    .agencies {
        width: 100%;
        height: auto;
        min-height: 100px;
        margin-top: 10px;
        border-radius: 10px;
        margin-left: 0;
    }
    #map {
        width: 100%;
        margin-top: 10px;
        border-radius: 10px;
        margin-left: 0;
    }
}
</style>
