@extends('main')

@section('content')
<!-- <a href="{{route('post.edit',['post'=>$post])}}">Sua</a> -->
<form action="{{route('post.destroy',['post'=>$post])}}" method="POST" >
  @csrf
  @method('delete')
<div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Chi tiết bài viết</h3>

                <!-- <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                      </button>
                    </div>
                  </div>
                </div> -->
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <!-- <a href="{{route('post.create')}}">Thêm bài viết</a>  -->
                      <th>ID</th>
                      <th>Nội dung bài viết</th>
                      <th>Hình ảnh</th>
                      <th>ID Người tạo bài </th>
                      <th>Địa danh </th>
                    </tr>
                  </thead>
                  <tbody>
                  
                            <tr>
                                <td>{{$post->id}}</td>
                                <td>{{$post->body}}</td>
                                <td style = "width:20px;height:20px;object-fit:contain" >
                                <img src="{{$post->image}}" alt="Hình bài viết">
                                </td>
                                <td>{{$post->user_id}}</td>
                                <td>{{$post->dia_danh_id}}</td>
                                <td><a href="{{route('post.edit',['post'=>$post])}}"><i class="far fa-edit"></i></a></td> 
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