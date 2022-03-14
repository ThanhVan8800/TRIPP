@extends ('main')
@section('content')
<div class="row justify-content-center">
    <div><h1>Thông tin</h1></div>
</div>
<div class="row">
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
            <div class="inner">
                <h3>{{$lstUser}}</h3>

                <p>Tổng số tài khoản</p>
                </div>
                <div class="icon">
                <i class="ion ion-bag"></i>
                </div>
                <a href="/admin/user/user" class="small-box-footer">Xem chi tiết <i class="fas fa-arrow-circle-right"></i></a>
            </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
                <div class="inner">
                <h3>{{$lstDiaDanh}}<sup style="font-size: 20px"></sup></h3>

                <p>Tổng số địa danh</p>
                </div>
                <div class="icon">
                <i class="ion ion-stats-bars"></i>
                </div>
                <a href="/admin/user/diadanh" class="small-box-footer">Xem chi tiết <i class="fas fa-arrow-circle-right"></i></a>
            </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
                <div class="inner">
                <h3>{{$lstPost}}</h3>

                <p>Tổng số bài viết</p>
                </div>
                <div class="icon">
                <i class="ion ion-person-add"></i>
                </div>
                <a href="/admin/user/post" class="small-box-footer">Xem chi tiết <i class="fas fa-arrow-circle-right"></i></a>
            </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
                <div class="inner">
                <h3>{{$lstVungMien}}</h3>

                <p>Tổng số Vùng</p>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
                <a href="/admin/user/vungmien" class="small-box-footer">Xem chi tiết <i class="fas fa-arrow-circle-right"></i></a>
            </div>
            </div>
            <!-- ./col -->
        </div>
        <div class="row">
    <div id="data">

    </div>
    <div class="col col-lg-4">
        <canvas id="myChart" width="200" height="100"></canvas>
    </div>
    <div class="col col-lg-8">
        <canvas id="myChart2" width="200" height="100"></canvas>
    </div>
</div>

@endsection