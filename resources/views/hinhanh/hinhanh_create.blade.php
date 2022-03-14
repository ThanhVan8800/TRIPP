
@extends('main')

@section('head')
    <script src="/ckeditor/ckeditor.js"></script>
@endsection

@section('content')
<form action="{{route('hinhanh.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
        <div class="card-body">
            <div class="form-group">
                    <label > Tên Địa Danh </label>
                    <select name="dia_danh_id" >
                            @foreach($lstDiaDanh as $hinhDiaDanh)
                                    <option value="{{$hinhDiaDanh->id}}">{{$hinhDiaDanh->ten_dia_danh}}</option>    
                            @endforeach
                    </select>
                </div>
            <div class="form-group">
                <label >Ảnh Địa Danh</label>
                <!-- <input type="file" class="custom-file-input" id="" accept="image/*" name="image"> -->
                <input type="file"  class="form-control" id="upload" accept="image/*" name="hinh_anh">
                <!-- <img src="" id="upload" style="width:100px" alt=""> -->
                <!-- <input type="hidden" name="thumb" id="thumb"> -->
            </div>
            <div class="form-group">
                <label for=""> Loại hình ảnh</label>
                    <select name="loai" >
                                        <option value="">Chon</option>
                                    <option value="1">Dia danh</option>
                                    <option value="2">Bai viet</option>
                    </select>
            </div>
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Tạo</button>
        </div>
        @csrf
    </form>
@endsection

@section('footer')
    <script>
        CKEDITOR.replace('content1');
    </script>
@endsection