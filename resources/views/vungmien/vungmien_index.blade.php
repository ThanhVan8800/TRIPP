@extends('main')

@section('content')
<div class="row">
         
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap" id="myTable">
                  <thead>
                    <tr>
                    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                      <a href="{{route('vungmien.create')}}"><i class="fas fa-plus-circle" > &nbspThêm vùng miền</i></a> 
                      <th>ID</th>
                      <th>Tên vùng miền</th>
                      <th>Hình ảnh</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody id = "">
                    @foreach($lstVungMien as  $vu)
                            <tr>
                                <td>{{$vu->id}}</td>
                                <td>  
                                  {{$vu->ten_vung_mien}}
                                </td>
                                <td> <img style="width: 200px;;max-height:100px;object-fit:contain" 
                                src="{{$vu->hinhanh}}"></td>
                              
                                <td>
                                  <a href="{{route('vungmien.show',['vungmien' => $vu])}} "><i class="fas fa-info-circle"></i>&nbsp</a><br>
                                  <a href="{{route('vungmien.edit',['vungmien' => $vu])}}"><i class="far fa-edit"></i></a>
                                </td>
                                <!--  -->
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