@extends('main')
@section('head')
    <script src="/ckeditor/ckeditor.js"></script>
@endsection

@section('content')
<form method="POST" action="{{route('hinhanh.update',['hinhanh' => $hinhanh])}}" enctype="multipart/form-data"><br>
          @csrf 
          @method("PATCH")
          <div class="form-group">
            <label for="">Tên địa danh</label>
            <input type="text" name="">

          </div>
          <div class="form-group">
            <label for="">Địa danh</label>
                   <select name="diadanhid" id="">
                     @foreach($lstDiaDanh as $dia)
                        <option value="{{$dia->id}}"
                          @if($hinhanh->dia_danh_id == $dia->id)
                          selected
                          @endif>
                          {{$dia->ten_dia_danh}}
                        </option>
                     @endforeach
                   </select>
                  </div>
                  <div class="form-group">
                    <label for="">Hình ảnh</label>
                   <div class="form-group">
                    <img src="{{ asset($hinhanh->hinh_anh) }}" width="250" alt="">
                  </div>
                  <input type="file" accept="image/*" name="hinh_anh">
                  </div>
                </div>
                <div class="form-group">
                  
                </div>
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