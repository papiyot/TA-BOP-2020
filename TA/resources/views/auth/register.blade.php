@extends('layouts.app')
@section('title','Daftar')
@section('content')

<div class="card my-5">
  <div class="card-body">
    <!-- Nested Row within Card Body -->
    <div class="row justify-content-center align-items-center">
      <div class="col-lg-7">
        <div class="p-5">
          <div class="text-center">
            <h1 class=" text-gray-900 ">Mendaftar Akun</h1>
        </div>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <div class="card-body ">
            <form class="user" method="POST" action="{{ route('register') }}">
                @csrf

                <div class="form-group">
                   <input id="name" type="text" class="form-control form-control-user @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required  autocomplete="name" autofocus placeholder="Masukan Nama">

                   @error('name')
                   <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

            </div>

            <div class="form-group">
                <input id="email" type="email" class=" form-control form-control-user @error('email') is-invalid @enderror" name="email"  value="{{ old('email') }}" required autocomplete="email" placeholder="Masukan Email">

                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group ">
                <input id="password" type="password" class=" form-control form-control-user @error('password') is-invalid @enderror" name="password"  autocomplete="new-password" placeholder="Masukan Password">
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <input id="password-confirm" type="password" class=" form-control form-control-user" name="password_confirmation"  autocomplete="new-password" placeholder="Konfirmasi Password">
            </div>

             <div class="form-group">
                <select name="jabatan" class="form-control">
                    <option value="Admin">Admin
                    </option>
                    <option value="Manager">Manager</option>
                </select>
            </div>

            <div class="form-group">
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Daftar') }}
                    </button>
                </div>
            </div>
        </form>
        <hr>
        <div class="text-center">
            <a class="small" href="{{ route('login') }}">Sudah memiliki akun? Login!</a>
        </div>
    </div>
</div>
</div>
</div>
</div>
</div>


@endsection
