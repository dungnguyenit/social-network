import Vue from "vue";
import PostComponent from "./components/PostComponent.vue";

const postList = new Vue({
    el: "#post",
    components: {
        PostComponent: PostComponent,
    },
});
