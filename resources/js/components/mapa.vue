<template>
    <div class="container">
        <div id="map"></div>
        <div class="agencies"></div>
    </div>
</template>
<script>
export default {
    mounted() {
        mapboxgl.accessToken =
            "pk.eyJ1IjoibWFyY2JpdDIwMDIiLCJhIjoiY2xnZzcyZjk5MDh2OTNxcnJoOGtjYXJkNCJ9.di7gnS5p1QxJO0VS1yuwZg";
        const mapboxClient = mapboxSdk({ accessToken: mapboxgl.accessToken });
        mapboxClient.geocoding
            .forwardGeocode({
                query: "Plaça Urquinaona 10,Barcelona",
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
                    // Choose from Mapbox's core styles, or make your own style with Mapbox Studio
                    style: "mapbox://styles/mapbox/light-v11",
                    center: feature.center,
                    zoom: 15,
                });

                // Create a marker and add it to the map.
                new mapboxgl.Marker().setLngLat(feature.center).addTo(map);
            });
    },
};
</script>
<style lang="scss" scoped>
@import "../../css/variables.scss";

.container {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    width: 98%;
    border-radius: 10px;
    overflow: hidden;
    padding: 0;
    margin: 0;
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
    margin-left: 10px;
}

@media only screen and (max-width: 980px) {
    .container {
        flex-direction: column;
    }
    #map,
    .agencies {
        width: 100%;
        margin-top: 10px;
        border-radius: 10px;
        margin-left: 0;
    }
}
</style>
