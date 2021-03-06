@extends('layouts.app')
@section('title','Login')
@section('content')

<div class="card my-5">
  <div class="card-body">
    <!-- Nested Row within Card Body -->
    <div class="row justify-content-center align-items-center">
      <div class="col-lg-7">
        <div class="p-5">
          <div class="text-center">
            <h1 class="h4 text-gray-900 ">Selamat Datang</h1>
        </div>

        <div class="card-body">
            <form class="user" method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form-group">
                    <input id="email" type="email" class="form-control form-control-user @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Masukan email anda...">

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror 
                </div>

                <div class="form-group">

                    <input id="password" type="password" class="form-control form-control-user @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Masukan kata Sandi anda...">

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                </div>

                <div class="form-group">
                    <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="customCheck" name="remember_token">
                        <label class="custom-control-label" for="customCheck">Remember Me</label {{ old('remember') ? 'checked' : '' }}>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Login') }}
                            </button>

                        </div>
                    </div>
                </form>
                <hr>
                <div class="text-center"> 
                    @if (Route::has('password.request'))

                    @endif
                    <a class="small" href="{{ route('register') }}"> Daftar</a>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
