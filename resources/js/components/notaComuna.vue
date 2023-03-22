<template>
    <div id="notaComuna">
        <div>
            <p>Nota comuna</p>
            <img src="/broggi_112/public/assets/icons/arrowDownWhite.svg" />
        </div>
        <textarea name="" id="" cols="30" rows="10"></textarea>
    </div>
</template>
<script>
export default {
    name: "notaComuna",
};
</script>
<style lang="scss" scoped>
@import "../../css/variables.scss";

#notaComuna {
    width: 100%;
    height: calc(50% - $components-gap / 2);

    overflow: hidden;

    display: flex;
    align-items: center;
    justify-content: flex-start;
    flex-direction: column;

    border-radius: $components-border-radius;

    background-color: $danger;

    div {
        width: 85%;
        min-height: calc(45px + $components-border-width);

        display: flex;
        justify-content: space-between;
        align-items: center;

        color: #fff;
        font-weight: 500;

        p {
            margin-bottom: 0;
        }

        img {
            transition: transform 0.1s ease-in-out;

            &:hover {
                cursor: pointer;
                transform: scale(1.1);
            }
        }
    }

    textarea {
        flex: 1;
        width: calc(100% - $components-border-width * 2);
        border: none;
        border-radius: calc(
            $components-border-radius - $components-border-width
        );
        transform: translateY(-$components-border-width);
        padding: 20px;

        border: none;
        overflow: auto;
        outline: none;

        -webkit-box-shadow: none;
        -moz-box-shadow: none;
        box-shadow: none;

        resize: none; /*remove the resize handle on the bottom right*/
    }
}
</style>
