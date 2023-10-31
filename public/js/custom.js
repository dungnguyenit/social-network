// navigation  menu js
function openNav() {
    $("#myNav").addClass("menu_width");
    $(".menu_btn-style").fadeIn();
}

function closeNav() {
    $("#myNav").removeClass("menu_width");
    $(".menu_btn-style").fadeOut();
}

// get current year

function displayYear() {
    var d = new Date();
    var currentYear = d.getFullYear();
    const displayYear = document.querySelector("#displayYear");
    if (displayYear != null) {
        displayYear.innerHTML = currentYear;
    }
}
displayYear();

$(document).ready(function () {
    $(".show-more-image").click(function () {
        let post_id = $(this).data("post-id");
        var requestData = {
            postId: post_id,
            _token: $('meta[name="csrf-token"]').attr("content"),
        };

        $("#list-images .row").empty();
        $.ajax({
            type: "POST",
            url: "/get-list-images",
            data: JSON.stringify(requestData),
            contentType: "application/json",
            success: function (response) {
                jsonResponse = JSON.parse(response);
                for (var i = 0; i < jsonResponse.length; i++) {
                    var image = jsonResponse[i];
                    var imageUrl = image.media_url;
                    var imgElement = $("<img>");
                    imgElement.attr("src", imageUrl);
                    imgElement.attr("width", "100%");
                    imgElement.attr("height", "100%");
                    imgElement.attr("alt", "Hình ảnh");
                    var colElement = $('<div class="col-md-3">');
                    colElement.append(imgElement);
                    $("#list-images .row").append(colElement);
                }
            },
            error: function (xhr, status, error) {
                console.error("Lỗi:", error);
            },
        });
        $("#show-list-images").modal("show");
    });

    $(".delete-post-img").click(function () {
        let list_post_media_ids = $("#list-post-media-ids");
        let post_media_id = $(this).data("post-media-id");
        let list_post_media_ids_val = list_post_media_ids.val();
        list_post_media_ids_val += post_media_id + ",";
        list_post_media_ids.val(list_post_media_ids_val);
        $(this).parent().remove();
    });

    $("#notification-alert")
        .fadeTo(5000, 500)
        .slideUp(500, function () {
            $("#notification-alert").slideUp(3000);
        });
});

function handleFiles() {
    const fileInput = document.getElementById("fileInput");
    console.table(fileInput.value);
    const fileList = document.getElementById("fileList");
    fileList.innerHTML = ""; // Xóa danh sách hiện tại

    const selectedFileCount = document.getElementById("selectedFileCount");
    selectedFileCount.textContent = "0";

    const files = fileInput.files;
    const selectedFiles = [];

    for (let i = 0; i < files.length; i++) {
        const file = files[i];
        const listItem = document.createElement("div");
        listItem.innerHTML = `${file.name} <button data-index="${i}" class="remove-button btn btn-sm btn-danger">X</button>`;
        fileList.appendChild(listItem);
        selectedFiles.push(file);
    }

    selectedFileCount.textContent = selectedFiles.length;

    const removeButtons = document.querySelectorAll(".remove-button");
    removeButtons.forEach((button) => {
        button.addEventListener("click", function () {
            let index = this.getAttribute("data-index");
            const selectedFileLength = selectedFiles.length;
            selectedFiles.splice(index, 1); // Xóa tệp khỏi danh sách

            fileList.removeChild(this.parentElement); // Xóa mục trong danh sách
            selectedFileCount.textContent = selectedFiles.length;

            // Cập nhật lại giá trị data-index
            let removeButtonsAfter =
                document.querySelectorAll(".remove-button");
            removeButtonsAfter.forEach((button, index) => {
                button.dataset.index = index;
            });

            const dataTransfer = new DataTransfer();
            selectedFiles.forEach((e, idx) => {
                dataTransfer.items.add(e);
            });

            document.getElementById("fileInput").files = dataTransfer.files;
        });
    });
}
