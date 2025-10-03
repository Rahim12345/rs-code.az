<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../../assets/img/favicon.png">
  <title>
    {{ config('app.name') }} - Login
  </title>

  <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,600,700,800" rel="stylesheet" />
  <link href="{{ asset('assets/css/nucleo-icons.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/css/black-dashboard.min3f71.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/demo/demo.css') }}" rel="stylesheet" />
  <style>
    .full-page>.content{
        padding-top: 50px !important;
    }
  </style>
</head>

<body class="login-page" style="overflow: hidden !important;">
  <div class="wrapper wrapper-full-page ">
    <div class="full-page login-page ">
      <div class="content">
        <div class="container">
          <div class="col-lg-4 col-md-6 ml-auto mr-auto">

            <form class="form" method="POST" id="login-form">
              @csrf
              <div class="card card-login card-white">
                <div class="card-header">
                  <img src="{{ asset('assets/img/card-primary.png') }}" alt="">
                  <h1 class="card-title">Log in</h1>
                </div>
                <div class="card-body">
                  @if ($errors->any())
                  <div class="alert alert-danger">{{$errors->first()}}</div>
                  @endif
                  @if (session('error'))
                  <div class="alert alert-danger">{{session('error')}}</div>
                  @endif
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <div class="input-group-text">
                        <i class="tim-icons icon-email-85"></i>
                      </div>
                    </div>
                    <input type="email" class="form-control" name="email" placeholder="Email">
                  </div>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <div class="input-group-text">
                        <i class="tim-icons icon-lock-circle"></i>
                      </div>
                    </div>
                    <input type="password" placeholder="Password" name="password" class="form-control">
                  </div>
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary btn-lg btn-block mb-3 login">Login </button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
