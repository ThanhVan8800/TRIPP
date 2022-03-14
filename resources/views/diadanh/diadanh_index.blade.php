@extends('main')
<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
@section('content')
<div class="row">
          <div class="col-12">
            <!-- SEARCH FORM -->
            <!-- <div class="form-group">
                <label for="keyword">Tìm kiếm</label>
                <input type="text " name="keyword" id="keyword" class= "form-control">
            </div> -->
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap" id = "myTable">
                  <thead>
                    <tr>
                    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                      <a href="{{route('diadanh.create')}}"><i class="fas fa-plus-circle" > &nbspThêm bài viết</i></a> 
                      <th>ID</th>
                      <th>Tên địa danh</th>
                      <th>Hình ảnh</th>
                      <th>Kinh độ</th>
                      <th>Vĩ độ</th>
                      <th >Mô tả</th>
                      <th>Ngày đăng</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody >
                    
                    @foreach($lstDiaDanh as  $dia)
                            <tr>
                                <td>{{$dia->id}}</td>
                                <td>  
                                  {{$dia->ten_dia_danh}}
                                </td>
                                <td> <img style="width:100px;max-height:100px;object-fit:contain" 
                                src="{{$dia->hinhanh}}"></td>
                                <td>{{$dia->kinh_do}}</td>
                                <td>{{$dia->vi_do}}</td>
                                <td>
                                <div class="badge  text-wrap" style="width: 30rem;">
                                <p class="fs-1"  >
                                  {{$dia->mo_ta}}
                                </p>
                                </div>  
                              </td>
                                <td>{{$dia->ngay_dang}}</td>
                                <td>
                                  <a href="{{route('diadanh.show',['diadanh' => $dia])}} "><i class="fas fa-info-circle"></i>&nbsp</a><br>
                                  <a href="{{route('diadanh.edit',['diadanh' => $dia])}}"><i class="far fa-edit"></i></a>
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
        <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->
    <!-- <script>
          $(document).ready(function(){
            $(document).on('keyup', '#keyword', function(){
              var keyword = $(this).val();

              $.ajax  ({
                type : "get",
                url : "/search",
                data : {
                        keyword : keyword},
                        dataType : "json",
                        success: function(response){
                            $('#lsdiadanh').html(response);
                        }
              })
            })
          })

    </script> -->

@endsection