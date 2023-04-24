<template>
    <div id="dades">
        <div>
            <p id="codi">
                CODI<span>{{ codi }}</span>
            </p>
            <p id="expedient">
                EXPEDIENT<span>{{ expedient }}</span>
            </p>
        </div>
        <p id="crono">{{ timerFormated }}</p>
        <div>
            <div>
                <p id="time">{{ timestamp }}</p>
                <p id="date">{{ date }}</p>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    name: "dades",
    data: function () {
        return {
            timer: 1,
            timerFormated: "00:00",
            timestamp: "--:--",
            date: "--/--/--",
        };
    },
    props: {
        codi: null,
        expedient: null,
    },
    watch: {
        timer() {
            this.$emit("timer", this.timer);
        },
        timestamp() {
            var partesFecha = this.date.split("/");
            var partesHora = this.timestamp.split(":");

            let anio = partesFecha[2];
            let mes = partesFecha[1].padStart(2, "0");
            let dia = partesFecha[0].padStart(2, "0");
            let horas = partesHora[0].padStart(2, "0");
            let minutos = partesHora[1].padStart(2, "0");
            let segundos = partesHora[2].padStart(2, "0");

            let date = `${anio}-${mes}-${dia} ${horas}:${minutos}:${segundos}`;

            this.$emit("date", date);
        },
    },
    methods: {
        getDay: function () {
            const today = new Date();
            this.date =
                ("0" + today.getDate()).slice(-2) +
                "/" +
                ("0" + (today.getMonth() + 1)).slice(-2) +
                "/" +
                today.getFullYear();
        },
        getTime: function () {
            const today = new Date();
            this.timestamp =
                today.getHours() +
                ":" +
                ("0" + today.getMinutes()).slice(-2) +
                ":" +
                ("0" + today.getSeconds()).slice(-2);
        },
        calcTimer: function () {
            this.timerFormated = new Date(this.timer++ * 1000)
                .toISOString()
                .substring(14, 19);

            this.getTime();
            this.getDay();

            if (this.timer > 60) {
                let timer_dom = document.getElementById("crono");
                timer_dom.style.color = "red";
            }
        },
    },
    beforeMount() {
        this.getTime();
        this.getDay();
    },
    mounted: function () {
        setInterval(() => this.calcTimer(), 1000);
    },
    beforeDestroy() {
        clearInterval(this.timer);
    },
};
</script>
<style lang="scss" scoped>
@import "../../css/variables.scss";

#dades {
    background-color: #fff;

    border: $components-border-width solid $primary;
    border-radius: $components-border-radius;

    display: grid;
    place-items: center;
    grid-template-columns: 40% 1fr 40%;
    grid-template-rows: 1fr;

    p {
        margin-bottom: 0;
    }

    div {
        width: 100%;
        height: 100%;

        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;

        color: $primary;

        &:nth-child(3) {
            p {
                width: 100px;
                text-align: right;
                font-variant-numeric: tabular-nums lining-nums;
            }
        }
    }
}

#codi,
#expedient {
    font-weight: 300;
    font-size: 0.6rem;

    span {
        font-weight: 700;
        font-size: 1rem;
        margin-left: 5px;
    }
}

#time {
    font-weight: 700;
}

#crono {
    font-variant-numeric: tabular-nums lining-nums;
    font-weight: 700;
    font-size: 1.5rem;
    color: $warning;

    position: relative;

    &::before {
        content: "";
        position: absolute;
        top: 50%;
        left: -15%;
        transform: translate(-50%, -50%);
        width: 2px;
        height: 100%;
        border-radius: 5px;
        background-color: rgba($color: $primary, $alpha: 0.5);
    }

    &::after {
        content: "";
        position: absolute;
        top: 50%;
        right: -18%;
        transform: translate(-50%, -50%);
        width: 2px;
        height: 100%;
        border-radius: 5px;
        background-color: rgba($color: $primary, $alpha: 0.5);
    }
}
</style>
