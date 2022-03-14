

<!DOCTYPE html>
<html lang="en">
<head>
  @include('head')
</head>

<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="#"><b>Admin</b>TRIP</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
                @guest
                    <a href="{{route('login')}}">
                    Đăng nhập
                    </a>  
                    | 
                    <a href="{{route('register')}}">
                      Đăng ký
                    </a>
                @endguest
      <p class="login-box-msg">Đăng nhập tài khoản admin của bạn</p>
      @include('alert')
      <form action="{{route('login')}}" method="post"><!--truyen duong dan-->
              <div class="input-group mb-3">
                <input type="email" class="form-control" name="email" placeholder="Email">
                @if($errors->has('email'))
            {{$errors->first('email')}}<br/> @endif
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                  </div>
                </div>
              </div>
              <div class="input-group mb-3">
                <input type="password" name="password" class="form-control" placeholder="Password">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-4">
                  <div class="icheck-primary">
                    <input type="checkbox" name="remember" id="remember">
                    <label for="remember">
                      Remember Me
                    </label>
                  </div>
                </div>
                <!-- /.col -->
                
                <div class="col-4">
                  <button type="submit" class="btn btn-primary btn-block">Đăng nhập</button>
                </div>
                
                <!-- <div class="col-4">

                  <button type="submit" class="btn btn-primary btn-green">Sign Up</button>
                </div> -->
                <!-- /.col -->
              </div>
              @csrf
      </form>

   
      <!-- /.social-auth-links -->

   
    <!-- /.login-card-body -->
  </div>
</div>
        @include('footer') <!---đưa phần view đã cắt vào login->

</body>
</html>