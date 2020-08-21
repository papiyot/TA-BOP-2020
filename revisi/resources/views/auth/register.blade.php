<!doctype html>
<html lang="en" class="no-focus">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>BOP | Daftar</title>
    <meta name="author" content="deni">
    <meta name="robots" content="noindex, nofollow">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Open Graph Meta -->
    <meta property="og:title" content="BOP | Daftar">
    <meta property="og:site_name" content="BOP">

    <!-- Stylesheets -->
    <!-- Fonts and Codebase framework -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,400i,600,700&display=swap">
    <link rel="stylesheet" id="css-main" href="{{ asset('assets/css/codebase.min.css') }}">

    <!-- You can include a specific file from css/themes/ folder to alter the default color theme of the template. eg: -->
    <link rel="stylesheet" id="css-theme" href="{{ asset('assets/css/themes/flat.min.css') }}">
    <!-- END Stylesheets -->
</head>
<body>

<div id="page-container" class=" bg-info">

    <!-- Main Container -->
    <main id="main-container">
        <!-- Page Content -->
       <div class="container">
            <div class="card my-5 bg-white">
  <div class="card-body">
    <!-- Nested Row within Card Body -->
    <div class="row justify-content-center align-items-center">
      <div class="col-lg-7">
        <div class="p-5">
          <div class="text-center">
            <h1 class="h4 text-gray-900 ">Mendaftar Akun</h1>
        </div>

        <div class="card-body">
            <form class="daftar" method="POST" action="{{ route('daftar') }}">
                @csrf

                <div class="form-group">
                    <input type="text" class="js-autocomplete form-control" id="example-autocomplete1" name="pt_id" required placeholder="Masukan Nama PT..." autocomplete="off">
                </div>
                <div class="form-group">
                    <input id="name" type="text" class="form-control form-control-user" name="name" required placeholder="Masukan Nama anda...">
                </div>
                <div class="form-group">
                    <input id="email" type="email" class="form-control form-control-user @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Masukan email anda...">

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror 
                </div>

                <div class="form-group">
                    <input id="password" type="password" class="form-control form-control-user" name="password" required autocomplete="current-password" placeholder="Masukan kata Sandi anda...">
                </div>

                <div class="form-group">
                    <div class="form-group">
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">
                                Daftar
                            </button>

                        </div>
                    </div>
                </form>
                <hr>
                <div class="text-center"> 
                    <a class="small" href="{{ route('login') }}"> Sudah memiliki akun? Login!</a>
                </div>
            </div>
        </div>
    </div>
</div>
        </div>
        <!-- END Page Content -->
    </main>
    <!-- END Main Container -->
</div>
<!-- END Page Container -->

<script src="{{ asset('assets/js/codebase.core.min.js')}}"></script>

<script src="{{ asset('assets/js/codebase.app.min.js')}}"></script>

<!-- Page JS Plugins -->
<script src="{{ asset('assets/js/plugins/jquery-validation/jquery.validate.min.js')}}"></script>

<!-- Page JS Code -->
<script src="{{ asset('assets/js/pages/op_auth_signin.min.js')}}"></script>
<!-- <script src="assets/js/plugins/pwstrength-bootstrap/pwstrength-bootstrap.min.js"></script> -->
<script src="{{ asset('assets/js/plugins/pwstrength-bootstrap/pwstrength-bootstrap.min.js')}}"></script>
<script src="{{ asset('assets/js/plugins/jquery-auto-complete/jquery.auto-complete.min.js')}}"></script>
<script src="{{ asset('assets/js/pages/be_forms_plugins.min.js')}}"></script>
<script>
    jQuery(function() {
        Codebase.helpers(['select2']);
    });
</script>
</body>
</html>
