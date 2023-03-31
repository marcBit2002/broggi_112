<template>
    <div class="ui vertical segment">
        <div class="flexbox">
            <div class="flex-content">
                <div>
                    <model-select
                        ref="select"
                        :options="options"
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
    },
    data() {
        return {
            options: [
                { value: "1", text: "aa" + " - " + "1" },
                { value: "2", text: "ab" + " - " + "2" },
                { value: "3", text: "bc" + " - " + "3" },
                { value: "4", text: "cd" + " - " + "4" },
                { value: "5", text: "de" + " - " + "5" },
                { value: "6", text: "ef" + " - " + "6" },
                { value: "10", text: "ef" + " - " + "10" },
                { value: "11", text: "ef" + " - " + "11" },
                { value: "12", text: "ef" + " - " + "12" },
                { value: "13", text: "down case" + " - " + "testcase" },
                { value: "14", text: "camel case" + " - " + "testCase" },
                { value: "15", text: "Capitalize case" + " - " + "Testcase" },
                { value: "16", text: "more a" + " - " + "1" },
                { value: "17", text: "more a" + " - " + "2" },
                { value: "18", text: "more a" + " - " + "3" },
                { value: "19", text: "more a" + " - " + "4" },
                { value: "20", text: "more a" + " - " + "5" },
                { value: "21", text: "more a" + " - " + "6" },
                { value: "22", text: "more a" + " - " + "7" },
                { value: "23", text: "more a" + " - " + "8" },
                { value: "24", text: "more a" + " - " + "9" },
                { value: "25", text: "more あ" + " - " + "10" },
                { value: "26", text: "more い" + " - " + "11" },
            ],
            item: "",
        };
    },
    components: {
        ModelSelect,
    },
};
</script>
