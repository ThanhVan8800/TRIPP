@extends('main')

@section('content')
<div class="row">
@csrf
                                @method('DELETE')
          <div class="col-12">
            <div class="card">
              <div class="card-header">
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                    <a href="{{route('post.create')}}"><i class="fas fa-plus-circle" style="width:50px, height:20px"> &nbsp Thêm bài viết</i></a> 
                      <th>ID</th>
                      <th>Nội dung bài viết</th>
                      <th>Hình ảnh</th>
                      <th>Người tạo bài viết</th>
                      {{-- <th>Địa danh</th> --}}
                      <!-- <th>DiaDanh_id</th> -->
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($lstPo as  $post)
                            <tr>
                                <td>{{$post->id}}</td>
                                <td>{{$post->body}}</td>
                                <td>
                                <img style="width:200px;height:150px;object-fit:contain" src="{{asset('/Storage/'.$post->image)}}">
                                </td>
                                <td>{{$post->user_id}}</td>
                                {{-- <td>{{$post->diadanhid}}</td> --}}
                                {{-- <td><a href="{{route('post.edit',['post'=>$post])}}"><i class="far fa-edit"></i></a></td>  --}}
                                <td><a href="{{route('post.destroy',['post'=>$post])}}"> 
                                  <label for=""><i class="far fa-trash-alt"></i></label>
                                </a></td>
                                
                            </tr>
                    @endforeach
                  
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->




@endsection