<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title> Log in</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{ (asset('public/backend/plugins/fontawesome-free/css/all.min.css')) }}">
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <link rel="stylesheet" href="{{ (asset('public/backend/plugins/icheck-bootstrap/icheck-bootstrap.min.css')) }}">
        <link rel="stylesheet" href="{{ (asset('public/backend/css/adminlte.min.css')) }}">
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    </head>
    <body class="hold-transition login-page">
        <div class="login-box">
            <div class="login-logo">
                <a href=""><b>Form Login</b></a>
            </div>
            <!-- /.login-logo -->
            <div class="card">
                <div class="card-body login-card-body">
                    <p class="login-box-msg"></p>

                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="input-group mb-3">
                            <input id="email" type="email" placeholder="Email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>

                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        </div>
                        <div class="input-group mb-3">
                            <input id="password" type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                            @error('password')
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>

                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        </div>
                        <div class="row">
                            <div class="col-6">
                                <button type="submit" class="btn btn-success btn-block">Sign In</button>
                            </div>
                            @if (Route::has('password.request'))
                            <div class="col-6">
                                <a href="{{ route('password.request') }}">I forgot password ?</a>
                            </div>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script src="{{ (asset('public/backend/plugins/jquery/jquery.min.js')) }}"></script>
        <script src="{{ (asset('public/backend/plugins/bootstrap/js/bootstrap.bundle.min.js')) }}"></script>
        <script src="{{ (asset('public/backend/js/adminlte.min.js')) }}"></script>
    </body>
</html>
