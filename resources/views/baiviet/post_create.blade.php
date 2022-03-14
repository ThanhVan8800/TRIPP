
@extends('main')

@section('head')
    <script src="/ckeditor/ckeditor.js"></script>
@endsection

@section('content')
<form action="{{route('post.store')}}" method="POST" enctype="multipart/form-data">
        <div class="card-body">
            <div class="form-group">
                <label>Nội dung</label>
                <textarea name="body1" id="content1" class="form-control" placeholder="Nội dung"></textarea>
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
                <label for="">ID user</label>
                    <select name="userid" >
                        @foreach($lstUser as $user)
                            <option value="{{$user->id}}" 
                            @if($user->id == $post->user_id) selected @endif
                            >{{$user->id}}</option>
                        @endforeach
                    </select>
            </div>
            <div class="form-group">
                <label for="">ID Địa danh</label>
                    <select name="dia_danh_id" >
                        @foreach($lstUser as $user)
                            <option value="{{$user->id}}" 
                            @if($user->id == $post->diadanhid) selected @endif
                            >{{$user->id}}</option>
                        @endforeach
                    </select>
                    </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Tạo bài</button>
        </div>
        @csrf
    </form>
@endsection

@section('footer')
    <script>
        CKEDITOR.replace('content');
    </script>
@endsection