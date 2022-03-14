@extends('main')

@section('content')
<div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Chi tiết bình luận đã chỉnh sửa</h3>

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nội dung bình luận</th>
                        <th>Người bình luận</th>
                        <th>Bài viết</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                            <tr>
                                <td>{{$cmt->id}}</td>
                                <td>{{$cmt->comment}}</td>
                                <td>{{$cmt->user_id}}</td>
                                <td>{{$cmt->post_id}}</td>
                                <td>
                                    <form action="{{route('cmt.destroy',['cmt'=>$cmt])}}" method="post">
                                        @csrf 
                                        @method('delete')
                                  <button type="submit"><i class="far fa-trash-alt" style="color:red"></i></button>
                                    </form>
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