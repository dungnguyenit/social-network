@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if($errors->has('msg_update_post'))
            <div class="alert alert-warning border" id="notification-alert">
                <button type="button" class="close" data-dismiss="alert">x</button>
                <strong>
                    Thông báo:
                </strong>
                {{ $errors->first('msg_update_post') }}
            </div>
            @endif
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="create-posts">
                    <form method="POST" action="{{ route('update',['id'=>$post->id]) }}" enctype="multipart/form-data">
                        @csrf
                        <div class=" box">
                            <textarea name="title" rows="10" style="width: 100%">{{$post->content}}</textarea>
                            <div class="box-content">
                                <div class="custom-file-upload">
                                    <div class="row">
                                        @foreach($post->postMedias as $m)
                                        <div class=" col-md-4 col-sm-12 mb-2">
                                            <img src="{{$m->media_url}}" alt="Preview image" width="450px" height="100%" class="img-fluid border">
                                            <a href="javascript:void(0)" class="btn btn-sm btn-danger delete-post-img" data-post-media-id="{{$m->id}}">Xóa</a>
                                        </div>
                                        @endforeach
                                    </div>
                                    <div class="box-submit">
                                        <input type="hidden" id="list-post-media-ids" value="" name="listPostMediaRemoves">
                                        <input type="file" id="fileInput" name="uploadFiles[]" multiple style="display: none;" onchange="handleFiles()">
                                        <label for="fileInput" class="btn border m-0">Tải lên tệp tin</label>
                                        <button type="submit" class="btn btn-posts">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div>
                        <span>File đã chọn: <span id="selectedFileCount">0</span></span>
                    </div>
                    <div id="fileList"></div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<script>
    // function previewImage(input) {
    //     if (input.files && input.files[0]) {
    //         var reader = new FileReader();
    //         reader.onload = function () {
    //             var image = new Image();
    //             image.src = reader.result;
    //             $(".box-image").append(image);
    //         };
    //         reader.readAsDataURL(input.files[0]);
    //     }
    // }

    // function previewImage(input) {
    //     var boxImage = document.getElementById("boxImage");
    //     var preview = document.getElementById("preview");
    //
    //     if (input.files && input.files[0]) {
    //         var reader = new FileReader();
    //         reader.onload = function (e) {
    //             preview.src = e.target.result;
    //             boxImage.style.display = "block"; // Hiển thị boxImage khi có ảnh
    //         };
    //         reader.readAsDataURL(input.files[0]);
    //     }
    // }

    // function deleteImage() {
    //     var boxImage = document.getElementById("boxImage");
    //     var preview = document.getElementById("preview");
    //     var fileUpload = document.getElementById("file-upload");
    //
    //     preview.src = "";
    //     fileUpload.value = ""; // Xóa giá trị file đã chọn
    //     boxImage.style.display = "none"; // Ẩn boxImage khi xóa ảnh
    // }

    // ------------------
    // var menu = document.querySelector(".menu"); // Using a class instead, see note below.
    // menu.classList.toggle("hidden-phone");
</script>

<!-- <script src="{{ asset('js/inputFile.js') }}"></script> -->
@endsection
