<template>
    <div class="state" style="border-color: {{this.color}}">
        <div class="state-title">
            ESTAT
            <img src="/broggi_112/resources/icons/state.svg" />
        </div>
        <img
            src="/broggi_112/public/assets/icons/arrowHeadFill.svg"
            style="height: inherit"
        />
        <div class="state-content">
            <select class="select"></select>
        </div>
    </div>
</template>

<script>
import axios from "axios";

export default {
    name: "estatExpedient",
    data() {
        return {
            expedients: [],
            expedient: null,
            id: null,
            estat: null,
            color: null,
        };
    },
    mounted() {
        this.expedient = this.$el.parentNode.dataset.idExpedient;
        this.getExpedient(this.expedient);
        this.getEstatExpedients();
        this.$el
            .querySelector(".select")
            .addEventListener("change", (event) => {
                let newEstatId = event.target.value;
                axios
                    .put(`expedient/${this.expedient}`, {
                        estat_id: newEstatId,
                    })
                    .then((response) => {
                        this.getExpedients();
                    });
            });
    },
    methods: {
        getExpedients() {
            axios.get("expedient").then((response) => {
                this.expedients = response.data;
            });
        },
        getExpedient(expedient) {
            axios.get(`expedient/${expedient}`).then((response) => {
                this.getEstatExpedient(response.data);
            });
        },
        getEstatExpedients() {
            axios.get("estatExpedient").then((response) => {
                let estats = response.data;
                estats.forEach((estat) => {
                    let option = document.createElement("option");
                    option.value = estat.id;
                    option.text = estat.estat;
                    option.dataset.color = estat.color;
                    this.$el.querySelector(".select").add(option);
                });
                this.$el
                    .querySelector(".select")
                    .addEventListener("change", (event) => {
                        let color =
                            event.target.options[event.target.selectedIndex]
                                .dataset.color;
                        event.target.style.color = color;
                    });
            });
        },
        getEstatExpedient(dada) {
            this.estat = dada[0].estat_expedient.estat;
            this.color = dada[0].estat_expedient.color;
            this.id = dada[0].estat_expedients_id;
            this.$el.querySelector(".select").value = this.id;
        },
    },
};
</script>

<style lang="scss" scoped>
@import "../../css/variables.scss";
.state {
    margin-top: 100px;
    height: 70px;
}

.state {
    display: flex;
    align-items: center;

    margin-bottom: 10px;

    border: 4px solid $primary;
    border-radius: 8px;

    color: $primary;
    background-color: white;

    img {
        height: 68px;
        position: relative;
        justify-self: flex-start;
    }
}

.state-title {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;

    max-width: 70px;
    width: 63px;
    height: 100%;

    padding: 7px;

    background-color: $primary;
    color: white;

    img {
        height: 30px;
        width: 30px;
    }
}

.state-content {
    margin: auto;

    select {
        border: 0;
        padding: 15px;

        width: 160px;

        font-weight: bold;
    }
}
</style>
