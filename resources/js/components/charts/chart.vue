<template>
    <div>
        <canvas id="myChart" style="width: 250px; height: 250px"></canvas>
    </div>
</template>
<script>
export default {
//  mounted(){
//     const ctx = document.getElementById("myChart");
//         var myChart = new Chart(ctx, {
//             type: "bar",
//             data: {
//                 labels: ['jkads', 'kjdsabf', 'kjsbd,f'],
//                 datasets: [
//                     {
//                         data: [12, 34, 45],
//                         label: "# usuaris",
//                         borderWidth: 1,
//                     },
//                 ],
//             },
//             options: {
//                 scales: {
//                     y: {
//                         beginAtZero: true,
//                     },
//                 },
//             },
//         });
//         console.log(myChart.data);
//     }
// }
    mounted() {
        const ctx = document.getElementById("myChart");
        var myChart = new Chart(ctx, {
            type: "pie",
            data: {
                datasets: [
                    {
                        label: "# usuaris",
                        borderWidth: 1,
                        backgroundColor: ["#FF5733","#F1C40F","#2E86C1","#27AE60","#8E44AD","#E74C3C","#3498DB","#F39C12"],
                    },
                ],
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                    },
                },
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
<style scoped>
</style>
