@extends('main')

@section('content')
<form action="{{route('diadanh.destroy',['diadanh'=>$diadanh])}}" method="POST">
  @csrf @method('DELETE')
<div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Chi tiết Địa danh</h3>

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
                      <th>Tên địa danh</th>
                      <th>Hình ảnh</th>
                      <th>Kinh độ</th>
                      <th>Vĩ độ</th>
                      <th>Mô tả</th>
                      <th>Ngày đăng</th>

                    </tr>
                  </thead>
                  <tbody>
                  
                            <tr>
                              <td>{{$diadanh->id}}</td>
                                <td>{{$diadanh->ten_dia_danh}}</td>
                                <td style = "width:20px;height:20px;object-fit:contain"  >
                                  <img src="{{$diadanh->hinhanh}}" style = "max-width:300px"alt="">
                                </td>
                                <td>{{$diadanh->kinh_do}}</td>
                                <td>{{$diadanh->vi_do}}</td>
                                <td>{{$diadanh->mo_ta}}</td>
                                <td>{{$diadanh->ngay_dang}}</td>
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