@extends('main')
@section('head')
    <script src="/ckeditor/ckeditor.js"></script>
@endsection

@section('content')
<form method="post" action="{{route('post.update',['post'=>$post])}}" enctype="multipart/form-data"><br>
          @csrf 
          @method('PATCH')
                <div class="card-body">
                  <div class="form-group">
                    <label for="">Nội dung</label>
                    <textarea value="{{$post->body}}" name="body1" type="text" class="form-control" id="" cols="30" rows="10" placeholder="Nội dung"></textarea>
                    <!-- <textarea value="{{$post->body}}" name="body1" type="text" class="form-control" id="content" placeholder="Nội dung"></textarea> -->
                  </div>

                  <div class="form-group">
                    <label for="">Hình ảnh</label>
                      <div class="custom-file">
                        <img style="left:50px;width:100px;max-height:100px;object-fit:contain" src="{{$post->image}}">
                      <input type="file" accept="image/*" name="image"><br>
                      </div>
                  </div><br><br>
                  <div class="form-group">

                  <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Cập nhật</button>
                </div>
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