@extends('main')
@section('head')
    <!-- <script src="/ckeditor/ckeditor.js"></script> -->
@endsection

@section('content')
<form action="{{route('diadanh.update',['diadanh'=>$diadanh])}}" method="POST" enctype="multipart/form-data">
          @csrf 
          @method('PATCH')
                <div class="card-body">
                <div class="form-group">
                    <label for="">Tên địa danh</label>
                    <input value="{{$diadanh->ten_dia_danh}}" name="ten"  type="text" class="form-control" id="" cols="30" rows="10" placeholder="Nội dung"></input>
                </div>
                <div class="form-group">
                <label>Ngày đăng</label>
                    <div class="input-group date" id="reservationdatetime" data-target-input="nearest">
                        <input type="text" value="{{$diadanh->ngay_dang}}" name="ngay" class="form-control datetimepicker-input" data-target="#reservationdatetime" placeholder="YYYY/MM/DD hh:mm:ss"/>
                        <div class="input-group-append" data-target="#reservationdatetime" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Kinh độ</label>
                    <input value="{{$diadanh->kinh_do}}" name="kinh_do" type="text" class="form-control" id="" cols="30" rows="10" placeholder="Nội dung"></input>
                </div>
                <div class="form-group">
                    <label for="">Vĩ độ</label>
                    <input value="{{$diadanh->vi_do}}" name="vi_do" type="text" class="form-control" id="" cols="30" rows="10" placeholder="Nội dung"></input>
                </div>
                <div class="form-group">
                    <label for="">Mô tả</label>
                    <textarea value="{{$diadanh->mo_ta}}" name="mo_ta" id="" type="text" class="form-control" id="" cols="30" rows="10" placeholder="Nội dung"></textarea>
                </div>
                <div class="form-group">
                    <img src="{{ asset($diadanh->hinhanh) }}" width="200" />
                </div>
                <div class="form-group">
                    <label>Hình ảnh</label>
                    <input type="file" name="hinhanh" class="file-upload-default">
                    <div class="input-group col-xs-12">
                        <input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload Image">
                        <span class="input-group-append">
                            <button class="file-upload-browse btn btn-primary" type="button">Upload hình ảnh</button>
                        </span>
                    </div>
                </div>
                </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                <button type="submit" class="btn btn-primary">Cập nhật</button>
                </div>
</form>
@endsection

@section('footer')
    <!-- <script>
        CKEDITOR.replace('content');
    </script>
     -->

@endsection