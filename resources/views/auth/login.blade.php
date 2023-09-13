@extends('layouts.app')

@section('content')
<style>
    body{
        background-image: url(img/yud.jpg);
        background-size: cover;
        background-repeat: no-repeat;
        position: relative;
        
    }

</style>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<body>
    <head>
        <style>
            .card {
                margin-right: auto;
                margin-left: auto;
                width: 250px;
                box-shadow: 0 15px 25px rgba(129, 124, 124, 0.2);
                height: 450px;
                border-radius: 5px;
                backdrop-filter: blur(14px);
                background-color: rgba(255, 255, 255, 0.151);
                padding: 10px;
                text-align: center;
            }
      
            .card img {
                height: 100%;
            }
        </style>
    </head>
    <body >
        <div class="overlay">
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <div class=" card modal-transparan aligns-items-center text-center  mx-auto "style="width: 30rem;">
            <div class="card-body">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="mb-3">
                      <label class="form-label fs-3"  ><b><font face="Roboto" color="WHITE" size="6">SIGN UP</font></b></label>
                    </div>
                    <br>
                    <div class="text-start">
                      <input id="username" type="text" class="form-control form-control-lg @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>

                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                      
                    </div>
                    <br>
                    <br>
                    <div class="text-start">
                      <input id="password" type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                      @error('password')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                    </div>
                    <br>
                    <br>
                      <div class="text-start">
                        <button type="submit" class="btn btn-primary d-grid gap-2 form-control-lg">
                            {{ __('LOGIN') }}
                        </button>
                      </div>
                    
                    <div class="mb-5">
                        <label class="form-label"><font face="arial" color="WHITE" size="2">Belum memiliki akun?</font></label>
                        <a href="registrasi">Sign In</a>
                      </div>
                  </form>
            </div>
          </div>
        </div>
<!--<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Username') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>-->
@endsection
