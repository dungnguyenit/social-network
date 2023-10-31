import Vue from "vue";
import ArticleListComponent from "./components/ArticleListComponent.vue";

const post2 = new Vue({
    el: "#list",
    components: {
        ArticleList: ArticleListComponent,
    },
});
