
@extends('main')

@section('head')
    <script src="/ckeditor/ckeditor.js"></script>
@endsection

@section('content')
<form action="{{route('cmt.store')}}" method="POST" >
        <div class="card-body">
            <div class="form-group">
                <label>Nội dung</label>
                <textarea name="noidungbl" id="content" class="form-control" placeholder="Nội dung"></textarea>
            </div>
            <div class="form-group">
                <label for="">ID người bình luận</label>
            <select name="userid" >
                      @foreach($lstUser as $user)
                          <option value="{{$user->id}}" 
                            @if($user->id == $cmt->user_id) selected @endif
                          >{{$user->id}}</option>
                      @endforeach
                    </select><br>
                    <label for="">ID địa danh</label>
                    <select name="postid" >
                      @foreach($lstPost as $post)
                          <option value="{{$post->id}}" 
                            @if($post->id == $cmt->post_id) selected @endif
                          >{{$post->id}}</option>
                      @endforeach
                    </select>
                  </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Cập nhật</button>
        </div>
        @csrf
    </form>
@endsection

@section('footer')
    <script>
        CKEDITOR.replace('content');
    </script>
@endsection