<template>
    <div>
        <canvas ref="cartes"></canvas>
    </div>
</template>
<script>
export default {
    data() {
        return {
            cartes: null,
            data: {}
        };
    },
    mounted() {
        this.fetchData();
    },
    methods: {
        fetchData() {
            axios
                .get("cartesTipus")
                .then((response) => {
                    this.data = response.data
                    this.mountMap()
                })
                .catch((error) => console.log(error));
        },
        carregarDades() {
            this.data.forEach((element) => {
                this.cartes.data["labels"].push(element.nom);
                this.cartes.data["datasets"][0].data.push(
                    element.num_cartes
                );
            });
        },
        mountMap () {
            this.cartes = new Chart(this.$refs.cartes, {
            type: 'pie',
            data: {
                datasets: [
                    {
                        label: "# cartes",
                        backgroundColor: ["#0080c4", "#ccb200", "#cc4c81", "#00bf5a", "#cc4433", "#666666"],
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
