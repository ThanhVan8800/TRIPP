
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
      <p class="login-box-msg">Đăng ký tài khoản</p>
      @include('alert')
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="input-group mb-3">
                <input type="name" class="form-control" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="Name">
            </div>
            <div class="input-group mb-3">
                <input type="email" class="form-control" name="email" :value="old('email')" required autofocus autocomplete="email" placeholder="Email">
            </div>
            <div class="input-group mb-3">
                <input type="password" class="form-control" name="password" :value="old('password')" required autofocus autocomplete="password" placeholder="Password">
            </div>
            <div class="col-4">
                  <button type="submit" class="btn btn-primary btn-block">Đăng ký</button>
                </div>
        </form>
        </div>
</div>
        @include('footer')