<template>
    <div>
        <canvas ref="usuaris"></canvas>
    </div>
</template>
<script>
export default {
    data() {
        return {
            usuaris: null,
            data: {},
        };
    },
    mounted() {
        this.fetchData();
    },
    methods: {
        fetchData() {
            axios
                .get("usuario")
                .then((response) => {
                    this.data = response.data;
                    console.log(response.data);
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
            this.incidents = new Chart(this.$refs.usuaris, {
                type: "doughnut",
                data: {
                    datasets: [
                        {
                            label: "número d'usuaris",
                            backgroundColor: ["#087ca6", "#ffb300", "#de1278"],
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
