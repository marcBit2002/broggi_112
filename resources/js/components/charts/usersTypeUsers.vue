<template>
    <div>
        <canvas id="myChart" style="width: 250px; height: 250px"></canvas>
    </div>
</template>
<script>
export default {
    mounted() {
        const ctx = document.getElementById("myChart");
        var myChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                datasets: [
                    {
                        label: "# usuaris",
                        backgroundColor: ['#087ca6', '#ffb300', '#de1278'],
                    },
                ],
            },
        });

        let url = '/broggi_112/public/api/usuario'
        fetch(url).then(response=>response.json())
        .then(datos=>mostrar(datos)).catch(error=> console.log(error))

        const mostrar=(articulos)=>{
            console.log(articulos);
            articulos.forEach(element=>{
                myChart.data['labels'].push(element.nom)
                myChart.data['datasets'][0].data.push(element.total_usuarios)
            });
            console.log(myChart.data);
        }
    }
}
</script>
<style lang="scss" scoped>
// @import "../../css/variables.scss";
</style>
