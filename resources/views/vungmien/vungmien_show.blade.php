@extends('main')

@section('content')
<form action="{{route('vungmien.destroy',['vungmien'=>$vungmien])}}" method="POST">
  @csrf @method('DELETE')
<div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Chi tiết Vùng Miền</h3>

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
                      <th>Tên Vùng Miền</th>
                      <th>Hình ảnh</th>
                     

                    </tr>
                  </thead>
                  <tbody>
                  
                            <tr>
                              <td>{{$vungmien->id}}</td>
                                <td>{{$vungmien->ten_vung_mien}}</td>
                                <td style = "width:20px;height:20px;object-fit:contain"  >
                                  <img src="{{$vungmien->hinhanh}}" alt="">
                                </td>
                                
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