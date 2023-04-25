<template>
    <div>
        <canvas ref="cartesExp"></canvas>
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
                .get("cartesExpedients")
                .then((response) => {
                    this.data = response.data
                    this.mountMap()
                })
                .catch((error) => console.log(error));
        },
        carregarDades() {
            this.data.forEach((element) => {
                this.cartes.data["labels"].push(element.codi);
                this.cartes.data["datasets"][0].data.push(
                    element.num_cartes
                );
            });
        },
        mountMap () {
            this.cartes = new Chart(this.$refs.cartesExp, {
            type: 'bar',
            data: {
                datasets: [
                    {
                        label: "Número de cartes",
                        backgroundColor: ["#FFB300", "#0080c4", "#cc4c81", "#00bf5a", "#cc4433", "#666666", "#6934B2", "#34B29B", "#B27F34"],
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
