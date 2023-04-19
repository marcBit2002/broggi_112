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
            data: {}
        };
    },
    mounted() {
        this.fetchData();
    },
    methods: {
        fetchData() {
            axios
                .get("incident_type")
                .then((response) => {
                    this.data = response.data
                    this.mountMap()
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
        mountMap () {
            this.incidents = new Chart(this.$refs.incidents, {
            type: "pie",
            data: {
                datasets: [
                    {
                        label: "# incidents",
                        backgroundColor: ["#0080c4", "#ccb200", "#cc4c81", "#00bf5a", "#cc4433", "#1677b3", "#666666", "#cc00cc", "#cc117a", "#00a7a3"],
                    },
                ],
            },
            options: {
                aspectRatio: 1.5
            }
            });
            this.carregarDades();
        }
    },
};
</script>
<style lang="scss" scoped></style>
