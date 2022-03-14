
@extends('main')

@section('head')
    <script src="/ckeditor/ckeditor.js"></script>
@endsection

@section('content')
<form action="{{route('user.store')}}" method="POST" enctype="multipart/form-data">
        <div class="card-body">
            <div class="form-group">
                <label>Name</label>
                <textarea name="name1" id="" class="form-control" placeholder="Nội dung"></textarea>
            </div>
            <div class="form-group">
                <label>Email</label>
                <textarea name="email1" id="" class="form-control" placeholder="Nội dung"></textarea>
            </div>
            <div class="form-group">
                <label for="menu">Ảnh Sản Phẩm</label>
                <!-- <input type="file" class="custom-file-input" id="" accept="image/*" name="image"> -->
                <input type="file"  class="form-control" id="upload" accept="image/*" name="image">
                <img src="" id="upload" style="width:100px" alt="">
                <div id="image_show">
                </div>
                <!-- <input type="hidden" name="thumb" id="thumb"> -->
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password1">
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Tạo tài khoản</button>
        </div>
        @csrf
    </form>
@endsection

@section('footer')
    <script>
        CKEDITOR.replace('content');
    </script>
@endsection