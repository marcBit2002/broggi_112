<template>
    <div class="container">
        <input
            type="text"
            class="buscador form-control"
            placeholder="Introduce la dirección"
            v-model="direccion"
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
    data() {
        return {
            direccion: "Plaça Urquinaona",
            agencias: [],
            mapboxClient: null,
            agenciasSeleccionadas: [],
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
    watch: {
        direccion() {
            this.cargarAgencias();
        },
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

                    const map = new mapboxgl.Map({
                        container: "map",
                        style: "mapbox://styles/mapbox/light-v9",
                        // style: "mapbox://styles/mapbox/streets-v9",
                        center: feature.center,
                        zoom: 15,
                        interactive: true,
                    });

                    new mapboxgl.Marker().setLngLat(feature.center).addTo(map);

                    this.agregarMarcadoresAgencias(map);
                });
        },
        cargarAgencias() {
            axios.get("agencia").then((response) => {
                this.agencias = response.data;
                this.cargarMapa();
            });
        },
        agregarMarcadoresAgencias(map) {
            this.agencias.forEach((agencia) => {
                const direccion = agencia.carrer;
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
                        if (agencia.nom.toLowerCase().includes("bombers")) {
                            iconClass = "bi bi-fire";
                        } else if (
                            agencia.nom.toLowerCase().includes("policia")
                        ) {
                            iconClass = "bi bi-shield-fill";
                        } else if (
                            agencia.nom.toLowerCase().includes("hospital")
                        ) {
                            iconClass = "bi bi-heart-fill";
                        }

                        const markerElement = document.createElement("div");
                        markerElement.className = "marker";
                        markerElement.innerHTML = `<i class="${iconClass}"></i>`;

                        const marker = new mapboxgl.Marker(markerElement)
                            .setLngLat(feature.center)
                            .addTo(map);

                        marker.getElement().addEventListener("click", () => {
                            const estaSeleccionada =
                                this.agenciasSeleccionadas.includes(agencia);
                            const buttonText = estaSeleccionada
                                ? "Deseleccionar"
                                : "Seleccionar";
                            const buttonColor = estaSeleccionada
                                ? "red"
                                : "green";
                            const popup = new mapboxgl.Popup({
                                offset: 25,
                            }).setHTML(
                                `<h3>${agencia.nom}</h3><p>${agencia.carrer}</p><button style="background-color: ${buttonColor}">${buttonText}</button>`
                            );
                            popup.addTo(map);
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
