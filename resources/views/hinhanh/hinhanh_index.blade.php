@extends('main')

@section('content')
<div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Danh sách hình ảnh</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                      <a href="{{route('hinhanh.create')}}"><i class="fas fa-plus-circle" > &nbspThêm hình ảnh bài</i> </a> 
                      <th>ID</th>
                      <th>Tên địa danh</th>
                      <th>Hình ảnh</th>
                      <th>Loại hình ảnh</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($lstHinh as  $hinh)
                            <tr>
                                <td>{{$hinh->id}}</td>
                                <td>{{$hinh->diadanh->ten_dia_danh}}</td>
                                <td> 
                                <img style="width:100px;max-height:100px;object-fit:contain" src="{{asset($hinh->hinh_anh)}}" alt="Hình ảnh địa danh">
                                </td>
                                <td>
                                  @if($hinh -> loai_hinh_anh == 1) Địa Danh
                                  @elseif($hinh -> loai_hinh_anh == 2) Bài viết người dùng
                                  @endif
                                </td>   
                                <td>
                                    <a href="{{route('hinhanh.edit',['hinhanh'=>$hinh])}}"><i class="far fa-edit"></i></a><br>
                                    <a href="{{route('hinhanh.show',['hinhanh'=>$hinh])}}">
                                      <i class="fas fa-info-circle"></i>&nbsp{{$hinh->diadanh->ten_dia_danh}}</a>
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