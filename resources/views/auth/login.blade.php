<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login - Mazer Admin Dashboard</title>
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('dashboard') }}/assets/css/bootstrap.css">
  <link rel="stylesheet" href="{{ asset('dashboard') }}/assets/vendors/bootstrap-icons/bootstrap-icons.css">
  <link rel="stylesheet" href="{{ asset('dashboard') }}/assets/css/app.css">
  <link rel="stylesheet" href="{{ asset('dashboard') }}/assets/css/pages/auth.css">
</head>

<body>
  <div id="auth">

    <div class="row h-100">
      <div class="col-lg-5 col-12">
        <div id="auth-left">
          <div class="auth-logo">
            {{-- <a href="index.html"><img src="{{ asset('portal') }}/assets/img/logo/logoo.png" alt="Logo" style="height: 70px; margin-bottom: -80px;"></a> --}}
          </div>
          <h1 class="auth-title">Login</h1>
          <p class="auth-subtitle mb-5"></p>
          @if (session('error'))
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          @endif
          <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-group position-relative has-icon-left mb-4">
              <input type="text" class="form-control form-control-xl" placeholder="Email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
              <div class="form-control-icon">
                <i class="bi bi-person"></i>
              </div>
              @if ($errors->has('email'))
              <span class="error">{{ $errors->first('email') }}</span>
              @endif
              @error('email')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
            <div class="form-group position-relative has-icon-left mb-4">
              <input type="password" id="password" class="form-control form-control-xl @error('password') is-invalid @enderror" placeholder="Password" name="password" required autocomplete="current-password">
              <div class="form-control-icon">
                <i class="bi bi-shield-lock"></i>
              </div>
              @if ($errors->has('password'))
              <span class="error">{{ $errors->first('password') }}</span>
              @endif
              @error('password')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
            <div class="form-check form-check-lg d-flex align-items-end">
              <input class="form-check-input me-2" type="checkbox" value="" id="flexCheckDefault">
              <label class="form-check-label text-gray-600" for="flexCheckDefault">
                Keep me logged in
              </label>
            </div>
            <button type="submit" class="btn btn-primary btn-block btn-lg shadow-lg mt-5">
              {{ __('Login') }}</button>
            @if (Route::has('password.request'))
            {{-- <a class="btn btn-link" href="{{ route('password.request') }}">
            {{ __('Forgot Your Password?') }}
            </a> --}}
            @endif
          </form>
          {{-- <div class="text-center mt-5 text-lg fs-4">
            <p class="text-gray-600">Don't have an account? <a href="auth-register.html" class="font-bold">Sign
                up</a>.</p>
            <p><a class="font-bold" href="auth-forgot-password.html">Forgot password?</a>.</p>
          </div> --}}
        </div>
      </div>
      <div class="col-lg-7 d-none d-lg-block">
        <div id="auth-right">
        </div>
      </div>
    </div>
  </div>
</body>

</html>
