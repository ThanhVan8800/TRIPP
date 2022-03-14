@extends('main')

@section('content')
<form action="{{route('user.destroy',['user'=>$user])}}" method="POST" >
  @csrf
  @method('delete')
<div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Chi tiết bài viết</h3>

              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <!-- <a href="{{route('post.create')}}">Thêm bài viết</a>  -->
                      <th>ID</th>
                      <th>Name</th>
                      <th>Image </th>
                      <th>Email</th>
                      <th>Password </th>
                    </tr>
                  </thead>
                  <tbody>
                  
                            <tr>
                                <td>{{$user->id}}</td>
                                <td>{{$user->name}}</td>
                                <td style = "width:20px;height:20px;object-fit:contain" >
                                <img src="{{$user->image}}" alt="Hình bài viết">
                                </td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->password}}</td>
                                <td><a href="{{route('user.edit',['user'=>$user])}}"><i class="far fa-edit"></i></a></td> 
                                <td>
                                  <button type="submit"><i class="far fa-trash-alt"></i></button>
                                </td>
                            </tr>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
        </form>



@endsection