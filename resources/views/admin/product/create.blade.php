@extends('admin.layout.inc')
@section('content')
<script>
    var editor_config = {
        path_absolute : "http://127.0.0.1:8000/",
        selector: '#post',
        relative_urls: false,
        plugins: [
        "advlist autolink lists link image charmap print preview hr anchor pagebreak",
        "searchreplace wordcount visualblocks visualchars code fullscreen",
        "insertdatetime media nonbreaking save table directionality",
        "emoticons template paste textpattern"
        ],
        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
        file_picker_callback : function(callback, value, meta) {
        var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
        var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

        var cmsURL = editor_config.path_absolute + 'laravel-filemanager?editor=' + meta.fieldname;
        if (meta.filetype == 'image') {
            cmsURL = cmsURL + "&type=Images";
        } else {
            cmsURL = cmsURL + "&type=Files";
        }

        tinyMCE.activeEditor.windowManager.openUrl({
            url : cmsURL,
            title : 'Filemanager',
            width : x * 0.8,
            height : y * 0.8,
            resizable : "yes",
            close_previous : "no",
            onMessage: (api, message) => {
            callback(message.content);
            }
        });
        }
    };

    tinymce.init(editor_config);
    </script>
<div id="main-content-wp" class="add-cat-page">
    <div class="wrap clearfix">
        <x-sidebar/>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Thêm sản phẩm</h3>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <form method="POST">
                        <label for="product-name">Tên sản phẩm</label>
                        <input type="text" name="product_name" id="product-name">
                        <label for="romaji-name">Tên sản phẩm (Romaji)</label>
                        <input type="text" name="romaji_name" id="romaiji-name">
                        <label for="price">Giá sản phẩm</label>
                        <input type="text" name="price" id="price">
                        <label for="category">Danh mục sản phẩm</label>
                        <select name="category" id="category">
                            <option value="0">Chọn danh mục sản phẩm</option>
                            <option value="1">Sashimi</option>
                            <option value="2">Special Roll</option>
                            <option value="3">Nigiri Sushi</option>
                            <option value="4">Gunkan Sushi</option>
                            <option value="5">Makimono</option>
                            <option value="6">Temaki Sushi</option>
                            <option value="7">Udon & Ramen</option>
                            <option value="8">Bento</option>
                            <option value="9">Hot Food</option>
                            <option value="10">Appetizer</option>
                            <option value="11">Drink</option>
                            <option value="12">Dessert</option>
                        </select>
                        <label for="desc">Mô tả ngắn</label>
                        <textarea name="desc" id="desc"></textarea>
                        <label for="post">Chi tiết</label>
                        <textarea name="post" id="post"></textarea>
                        <label>Hình ảnh</label>
                        <div id="uploadFile">
                            <input type="file" name="file" id="upload-thumb">
                            <input type="submit" name="btn-upload-thumb" value="Upload" id="btn-upload-thumb">
                            <img src="public/images/img-thumb.png">
                        </div>
                        <label>Trạng thái</label>
                        <select name="status">
                            <option value="0">-- Chọn danh mục --</option>
                            <option value="1">Chờ duyệt</option>
                            <option value="2">Đã đăng</option>
                        </select>
                        <button type="submit" name="btn-submit" id="btn-submit" class="btn">Thêm mới</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection