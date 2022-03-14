
@extends('main')

@section('head')
    <script src="/ckeditor/ckeditor.js"></script>
@endsection

@section('content')
<form action="{{route('diadanh.store')}}" method="POST" enctype="multipart/form-data">
        <div class="card-body">
            <!-- <div class="form-group">
                <label>Noi dung </label>
                <textarea name="body1" class="form-control">{{ old('body1') }}</textarea>
            </div> -->
            <div class="form-group">
                <label>Tên địa danh</label>
                <textarea name="ten" id="content1" class="form-control" placeholder="Nội dung"></textarea>
            </div>
            <div class="form-group">
                    <label>Hình ảnh</label>
                    <input type="file" name="hinhanh" class="file-upload-default">
                    <div class="input-group col-xs-12">
                        <input type="text" class="form-control file-upload-info" placeholder="Upload Image">
                        <span class="input-group-append">
                        <button class="file-upload-browse btn btn-primary" type="button">Upload hình ảnh</button>
                        </span>
                    </div>
                </div>
            <div class="form-group">
                <label>Kinh độ</label>
                <textarea name="kinh_do" id="content1" class="form-control" placeholder="Nội dung"></textarea>
            </div>
            <div class="form-group">
                <label>Vĩ độ</label>
                <textarea name="vi_do" id="content1" class="form-control" placeholder="Nội dung"></textarea>
            </div>
            <div class="form-group">
                <label>Mô tả</label>
                <textarea name="mo_ta" id="content1" class="form-control" placeholder="Nội dung"></textarea>
            </div>
            <div class="form-group">
                <label>Ngày đăng</label>
                <textarea name="ngay" id="content1" class="form-control" placeholder="Nội dung"></textarea>
            </div>
            
            

        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Tạo địa danh mới</button>
        </div>
        @csrf
    </form>
@endsection

@section('footer')
    <script>
        CKEDITOR.replace('content');
    </script>
@endsection