<template>
    <Bar :data="data" />
</template>
<script>
import { Bar } from 'vue-chartjs'
import { Chart as ChartJS, Title, Tooltip, Legend, BarElement, CategoryScale, LinearScale } from 'chart.js'

ChartJS.register(Title, Tooltip, Legend, BarElement, CategoryScale, LinearScale)

export default {
    name: "myGraph",
    components: {
        Bar
    },
  data: () => ({
    loaded: false,
    nom_incident: [],
    tipus_incident: [],
  }),
  async mounted () {
    this.loaded = false

    try {
        axios
            .get("usuario")
            .then((response) => {
                response.data.forEach((element) => {
                    this.labels.push(element.nom);
                    this.datasets.push(element.tipus_incidents_id);
                });


            });

      this.loaded = true
    } catch (e) {
      console.error(e)
    }
  }
}
//     data() {
//         return {
//             nom_incident: [],
//             tipus_incident: [],
//             bgColors: ["#FF5733","#F1C40F","#2E86C1","#27AE60","#8E44AD","#E74C3C","#3498DB","#F39C12"],
//         };
//     },
//     mounted() {
//         this.mostrar(),
//         this.renderChart({
//             labels: this.nom_incident,
//             datasets: [
//                 {
//                     label: "GRAFICO",
//                     backgroundColor: this.bgColors,
//                     data: this.element.tipus_incidents_id,
//                 },
//             ],
//         }),{ responsive: true, maintainAspectRadio: false };
//     },
//     methods: {
//         mostrar() {
//             axios
//             .get("incident")
//             .then((response) => {
//                 response.data.forEach((element) => {
//                     this.nom_incident.push(element.nom);
//                     this.tipus_incident.push(element.tipus_incidents_id);
//                 });
//             });
//         },
//     },
// };
</script>
<style>
</style>
