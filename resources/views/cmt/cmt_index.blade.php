@extends('main')

@section('content')
<div class="row">
  @csrf
  @method('DELETE')
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        
      <!-- /.card-header -->
      <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
          <thead>
            <tr>
            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                      <a href="{{route('cmt.create')}}"><i class="fas fa-plus-circle" style="width:50px, height:20px"> &nbsp Thêm bình luận bài viết </i></a>
                      <th>ID</th>
                      <th>Nội dung bình luận</th>
                      <th> Người bình luận</th>
                      <th>Bài bình luận </th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($lstCmt as  $cmt)
                            <tr>
                                <td>{{$cmt->id}}</td>
                                <td>{{$cmt->comment}}</td>
                                <td>{{$cmt->user_id}}</td>
                                <td>{{$cmt->post_id}}</td>
                                <td>
                                  <a href="{{route('cmt.edit',['cmt'=>$cmt])}}"><i class="far fa-edit"></i></a>
                                    <form action="{{route('cmt.destroy',['cmt'=>$cmt])}}">
                                      @csrf @method('DELETE')
                                        <button><i class="far fa-trash-alt" style="color:red"></i></button>
                                    </form>
                                </td>
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