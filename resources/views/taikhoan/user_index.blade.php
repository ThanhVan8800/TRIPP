@extends('main')

<!-- /.row -->
@section('content')
<div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Danh sách các tài khoản</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                      <a href="{{route('user.create')}}"><i class="fas fa-plus-circle" > &nbspThêm tài khoản</i> </a> 
                      <th>ID</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Images</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($lstUser as  $user)
                            <tr>
                                <td>{{$user->id}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td> <img style="width:100px;max-height:100px;object-fit:contain" src="{{$user->image}}"></td>
                                <td>
                                  <a href="{{route('user.edit',['user'=>$user])}}">
                                  <label for=""><i class="far fa-edit"></i></label>
                                  </a>
                                  <a href="{{route('user.show',['user' => $user])}} "><i class="fas fa-info-circle"></i>&nbsp</a><br>

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