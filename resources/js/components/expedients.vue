<template>
    <div id="expedients">
        <div>
            <p>Expedients</p>
            <img src="/broggi_112/public/assets/icons/arrowDownWhite.svg" />
        </div>
        <div class="content"></div>
    </div>
</template>
<script>
export default {
    name: "expedients",
};
</script>
<style lang="scss" scoped>
@import "../../css/variables.scss";

#expedients {
    width: 100%;
    flex: 1;

    display: flex;
    align-items: center;
    justify-content: flex-start;
    flex-direction: column;

    border-radius: $components-border-radius;

    background-color: $primary;

    div {
        width: 85%;
        height: 45px;

        display: flex;
        justify-content: space-between;
        align-items: center;

        color: #fff;
        font-weight: 500;

        p {
            margin-bottom: 0;
        }
    }

    .content {
        flex: 1;
        width: calc(100% - $components-border-width * 2);
        border: none;
        border-radius: calc(
            $components-border-radius - $components-border-width
        );
        transform: translateY(-$components-border-width);

        background-color: #fff;
    }
}
</style>
