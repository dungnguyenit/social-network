<template>
    <div class="create-posts">
        <form @submit.prevent="postData" enctype="multipart/form-data">
            <div class="box-header ml-0">
                <textarea
                    name="title"
                    id=""
                    cols="30"
                    rows="10"
                    placeholder="Nhập bài viết"
                    v-model="title"
                ></textarea>
            </div>
            <p>{{ title }}</p>
            <div class="box-content mt-12 mb-2">
                <div class="box-submit">
                    <input
                        type="file"
                        name="uploadFiles[]"
                        multiple
                        @change="handleFiles"
                        ref="fileInput"
                    />
                    <button type="submit" class="btn btn-posts">Submit</button>
                </div>
            </div>
        </form>
        <div class="mt-2 text-dark">
            <span>File đã chọn: <span id="selectedFileCount">0</span></span>
        </div>
        <div id="fileList" class="text-dark"></div>
    </div>
</template>

<script>
import Axios from "axios";

export default {
    name: "post-component",
    data() {
        return {
            title: "",
        };
    },
    methods: {
        postData() {
            let formData = new FormData();
            formData.append("title", this.title);
            let uploadFiles = this.$refs.fileInput.files;
            for (let i = 0; i < uploadFiles.length; i++) {
                formData.append("uploadFiles[]", uploadFiles[i]);
            }

            Axios.post("/home/post/store", formData, {
                headers: {
                    "Content-Type": "multipart/form-data",
                },
            })
                .then(function (response) {
                    console.log(response);
                    location.reload();
                })
                .catch(function (error) {
                    console.log(error);
                    location.reload();
                });
        },
        handleFiles() {
            let selectedFileCount = this.$refs.fileInput.files.length;
            document.getElementById("selectedFileCount").textContent =
                selectedFileCount;
        },
    },
};
</script>
