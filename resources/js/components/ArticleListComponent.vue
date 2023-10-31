<template>
    <div>
        <div class="container-fluid pl-0">
            <div
                class="box mb-4"
                v-for="(post, postId) in responseData"
                :key="postId"
            >
                <div class="mr-2 img-home" v-if="post[0].media_url">
                    <img
                        class="dynamic-image"
                        :src="post[0].media_url"
                        alt=""
                        style="width: 200px; height: 180px"
                    />
                </div>

                <div class="detail-box show-post m-0 p-1">
                    <a href="personal_page" class="mt-1 style_name">{{
                        post[0].name
                    }}</a>
                    <p class="style_time">{{ post[0].created_at }}</p>
                    <p class="style_time">{{ post[0].content }}</p>
                    <a
                        href="javascript:void(0)"
                        class="text-primary show-more-image"
                        @click="showImages(postId)"
                        v-if="post[0].media_url"
                    >
                        Xem tất cả hình ảnh
                    </a>
                </div>
            </div>
        </div>
        <div
            id="show-list-images"
            class="modal fade"
            tabindex="-1"
            role="dialog"
            aria-labelledby="myLargeModalLabel"
            aria-hidden="true"
        >
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5
                            class="modal-title text-dark"
                            id="exampleModalLabel"
                        >
                            Danh sách hình ảnh
                        </h5>
                        <button
                            type="button"
                            class="close"
                            data-dismiss="modal"
                            aria-label="Close"
                            @click="closeImagesModal"
                        >
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid" id="list-images">
                            <div class="row">
                                <div
                                    class="col-md-3"
                                    v-for="(image, index) in currentImages"
                                    :key="index"
                                >
                                    <img
                                        :src="image.media_url"
                                        alt="Image"
                                        class="img-thumbnail"
                                    />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button
                            type="button"
                            class="btn btn-secondary"
                            data-dismiss="modal"
                            @click="closeImagesModal"
                        >
                            Close
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from "axios";
export default {
    name: "article-list",
    data() {
        return {
            responseData: {},
            currentImages: [],
        };
    },
    methods: {
        fetchData() {
            var apiPost = "http://127.0.0.1:8000/api/posts";
            axios
                .get(apiPost)
                .then((response) => {
                    this.responseData = response.data.posts;
                    console.log("Data received:", this.responseData);
                })
                .catch((error) => {
                    console.error("Error:", error);
                });
        },
        showImages(postId) {
            this.currentImages = this.responseData[postId];
            $("#show-list-images").modal("show");
        },
        closeImagesModal() {
            this.currentImages = [];
            $("#show-list-images").modal("hide");
        },
    },
    mounted() {
        this.fetchData();
    },
};
</script>
