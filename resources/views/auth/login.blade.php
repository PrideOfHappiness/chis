<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Aplikasi Manajemen Gambar Mobil Pribadi</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset ('style/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{asset ('style/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- FontAwesome -->
  <script src="https://kit.fontawesome.com/225bc69ba1.js" crossorigin="anonymous"></script>
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset ('style/dist/css/adminlte.min.css') }}">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
        <a href="/login" class="h1">
            <img src="{{ asset('style/dist/img/chis_logo.png') }}" alt="Chis Logo" style="opacity: .8"/>
        </a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Silahkan login terlebih dahulu</p>
        @if ($message = Session::get('error'))
            <div class="alert alert-danger">
              <p>{{ $message }}</p>
          </div>
        @endif
        @if ($message = Session::get('warning'))
            <div class="alert alert-warning">
              <p>{{ $message }}</p>
          </div>
        @endif

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="input-group mb-3">
                            <input type="text" name="kode_users" class="form-control" placeholder="Username">
                            
                            <div class="input-group-append">
                              <div class="input-group-text">
                                <span class="fa-solid fa-bars-staggered"></span>
                              </div>
                            </div>
                        </div>

                        <div class="input-group mb-3">
                            <input type="password" name="password" class="form-control" placeholder="Password">
                            @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                            <div class="input-group-append">
                              <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                              </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary btn-block">
                                    {{ __('Login') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
