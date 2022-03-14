
@extends('main')

@section('head')
@endsection

@section('content')
<form action="{{route('vungmien.store')}}" method="POST" enctype="multipart/form-data">
        <div class="card-body">
            <!-- <div class="form-group">
                <label>Noi dung </label>
                <textarea name="body1" class="form-control">{{ old('body1') }}</textarea>
            </div> -->
            <div class="form-group">
                <label>Tên vùng miền</label>
                <textarea name="ten_vung_mien1" id="content1" class="form-control" placeholder="Nội dung"></textarea>
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
            
            
            

        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Tạo vùng miền</button>
        </div>
        @csrf
    </form>
@endsection

@section('footer')
    <script>
        CKEDITOR.replace('content');
    </script>
@endsection