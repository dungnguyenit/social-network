import Vue from "vue";


Vue.component(
    "article-list",
    require("./components/ArticleListComponent.vue").default
);
const postList = new Vue({
    el: "#list",
});

