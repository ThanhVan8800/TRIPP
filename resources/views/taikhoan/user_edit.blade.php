@extends("main")
@section("content")
    <form method="post" action="{{route('user.update',['user'=>$user])}}"  enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            @if($errors->any())
            @foreach ($errors->all() as $err)
            <li class="card-description" style="color: #fc424a;">{{ $err }}</li>
            @endforeach
            @endif
            <div class="form-group"><br>
            <label for=""> Tên tài khoản</label>
            <input type="text" name="name1" value="{{$user->name}}"><br/>
            </div>
            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
            <label for="">Email</label>
                    <textarea name="email1">{{$user->email}}</textarea><br/>
            <label for="">Password</label>
                <input type="password" name="password" value="{{$user->password}}"><br/>
                <div class="form-group">
                    <label for="">Hình ảnh</label>
                    <div class="custom-file">
                        <img style="left:50px;width:100px;max-height:100px;object-fit:contain" src="{{$user->image}}">
                    <input type="file" accept="image/*" name="image"><br>
                    </div><br><br><br><br>
                &nbsp <input type="submit" class="btn btn-primary mr-2" value="Cập nhật">
                <button type="text" class="btn btn-dark">Cancel</button>
                </div><br><br>
    </form>

@endsection