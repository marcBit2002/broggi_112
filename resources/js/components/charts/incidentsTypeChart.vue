<template>
    <div>
        <canvas ref="incidents"></canvas>
    </div>
</template>
<script>
export default {
    data() {
        return {
            incidents: null,
            data: {},
        };
    },
    mounted() {
        this.fetchData();
    },
    methods: {
        fetchData() {
            axios
                .get("incidentType")
                .then((response) => {
                    this.data = response.data;
                    this.mountMap();
                })
                .catch((error) => console.log(error));
        },
        carregarDades() {
            this.data.forEach((element) => {
                this.incidents.data["labels"].push(element.nom);
                this.incidents.data["datasets"][0].data.push(
                    element.total_usuarios
                );
            });
        },
        mountMap() {
            this.incidents = new Chart(this.$refs.incidents, {
                type: "bar",
                data: {
                    datasets: [
                        {
                            label: "Número d'incidents",
                            backgroundColor: [
                                "rgba(255, 99, 132, 0.6)",
                                "rgba(255, 159, 64, 0.6)",
                                "rgba(255, 205, 86, 0.6)",
                                "rgba(75, 192, 192, 0.6)",
                                "rgba(54, 162, 235, 0.6)",
                                "rgba(153, 102, 255, 0.6)",
                                "rgba(201, 203, 207, 0.6)",
                            ],
                            borderColor: [
                                "rgb(255, 99, 132)",
                                "rgb(255, 159, 64)",
                                "rgb(255, 205, 86)",
                                "rgb(75, 192, 192)",
                                "rgb(54, 162, 235)",
                                "rgb(153, 102, 255)",
                                "rgb(201, 203, 207)",
                            ],
                            borderWidth: 1,
                        },
                    ],
                },
                options: {
                    aspectRatio: 1.5,
                },
            });
            this.carregarDades();
        },
    },
};
</script>
<style lang="scss" scoped></style>
