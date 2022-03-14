
<!DOCTYPE html>
<html lang="en">
<head>
        @include('head')
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">

            <!-- Left navbar links -->
            <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            </ul>
                

        
        @auth
            {{Auth::user()->name}} |
            <form method="post" action="{{route('logout')}}">
                @csrf 
                
                <input type="submit" value="Đăng xuất" >
                <i class="fas fa-sign-out-alt"></i></input>
            </form>


        @endauth

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
            <!-- Navbar Search -->
           
            <!-- Notifications Dropdown Menu -->
          
            <li class="nav-item">
                <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
                </a>
            </li>
           
            </ul>
        </nav>
        <!-- /.navbar -->

      @include('sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
          

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">

                @include('alert')
                  
                    <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- jquery validation -->
                        <div class="card card-primary mt-3">
                        <div class="card-header">
                            <h3 class="card-title">{{$title}} <!--<small>jQuery Validation</small>--></h3>
                        </div>
                        <!--NOI DUNG GHI O DAY-->
                            @yield('content')
                    <!-- right column -->
                    <div class="col-md-6">
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <div class="float-right d-none d-sm-block">
            <b>Version</b> 3.1.0
            </div>
            <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
        </footer>

        
</div>
<!-- ./wrapper -->
@include('footer')
@yield('js')
</body>
</html>
