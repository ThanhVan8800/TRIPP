@extends('main')

@section('content')
<form action="{{route('hinhanh.destroy',['hinhanh'=>$hinhanh])}}" method="POST" >
  @csrf
  @method('delete')
<div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Chi tiết bài viết</h3>

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
                      <th>Nội dung bài viết</th>
                      <th>Hình ảnh</th>
                    </tr>
                  </thead>
                  <tbody>
                  
                            <tr>
                                <td>{{$hinhanh->id}}</td>
                                <td>{{$hinhanh->diadanh->ten_dia_danh}}</td>
                                <td style = "width:20px;height:20px;object-fit:contain" >
                                <img src="{{$hinhanh->hinh_anh}}" alt="Hình bài viết">
                                </td>
                                <td>{{$hinhanh->loai_hinh_anh}}</td>
                                <td><a href="{{route('hinhanh.edit',['hinhanh'=>$hinhanh])}}"><i class="far fa-edit"></i></a></td> 
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