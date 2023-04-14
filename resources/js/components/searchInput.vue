<template>
    <div class="ui vertical segment">
        <div class="flexbox">
            <div class="flex-content">
                <div>
                    <model-select
                        ref="select"
                        :options="this.options"
                        v-model="item"
                        :placeholder="name"
                    >
                    </model-select>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import { ModelSelect } from "vue-search-select";
import "vue-search-select/dist/VueSearchSelect.css";

export default {
    name: "searchInput",
    props: {
        name: null,
        options: Array,
    },
    data() {
        return {
            item: ".",
        };
    },
    watch: {
        item() {
            this.$emit("searchValue", this.item);
            console.log(this.item);
        },
    },
    components: {
        ModelSelect,
    },
};
</script>
