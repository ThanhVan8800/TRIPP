@extends('main')
@section('head')
    <script src="/ckeditor/ckeditor.js"></script>
@endsection

@section('content')
<form method="post" action="{{route('cmt.update',['cmt'=>$cmt])}}" ><br>
          @csrf 
          @method('PATCH')
                <div class="card-body">
                  <div class="form-group">
                    <label for="">Nội dung</label>
                    <textarea value="{{$cmt->noidungbl}}" name="noidungbl" type="text" class="form-control" id="" cols="30" rows="10" placeholder="Nội dung"></textarea>
                  </div>
                  <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Cập nhật</button>
                </div>
                </div>
                <!-- /.card-body -->
              </form>
@endsection

@section('footer')
    <script>
        CKEDITOR.replace('content');
    </script>
@endsection