@extends('main')
@section('head')
    <script src="/ckeditor/ckeditor.js"></script>
@endsection

@section('content')
<form action="{{route('vungmien.update',['vungmien'=>$vungmien])}}" method="POST" enctype="multipart/form-data">
          @csrf 
          @method('PATCH')
                <div class="card-body">
                <div class="form-group">
                    <label for="">Tên vùng miền</label>
                    <input value="{{$vungmien->ten_vung_mien}}" name="ten_vung_mien1"  type="text" class="form-control" id="" cols="30" rows="10" placeholder="Nội dung"></input>
                </div>
                <div class="form-group">
                    <img src="{{ asset($vungmien->hinhanh) }}" width="200" />
                </div>
                <div class="form-group">
                    <label>Hình ảnh</label>
                    <input type="file" name="hinhanh" class="file-upload-default">
                    
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
    <script>
        CKEDITOR.replace('content');
    </script>
    

@endsection