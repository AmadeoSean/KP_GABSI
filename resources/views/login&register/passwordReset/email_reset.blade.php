{{--  
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href={{ asset("css/style2.css") }} rel="stylesheet" >
    <title>Login Form</title>
</head>
    <body class="bg-body-secondary">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">{{ __('Reset Password') }}</div>
        
                        <div class="card-body">
                            <form method="POST" action="{{ route('password.update') }}">
                                @csrf
        
                                <input type="hidden" name="token" value="{{ $token }}">
        
                                <div class="row mb-3">
                                    <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>
        
                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
        
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
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
        
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
        
                                <div class="row mb-3">
                                    <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>
        
                                    <div class="col-md-6">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                </div>
        
                                <div class="row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Reset Password') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    </body>
</html>
 

  --}}



  <!doctype html>
  <html lang="en">
  <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
  
      <!-- Bootstrap CSS -->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
      <link href={{ asset("css/style2.css") }} rel="stylesheet" >
      <title>Login Form</title>
  </head>
  <body class="bg-body-secondary">
      <div class="vh-100 d-flex justify-content-center align-items-center flex-column">
          <div class="container-fluid">
              {{-- @if(Session::has('status') == 'failed')
                  <div class="alert alert-danger alert-dismissable fade show d-flex justify-content-between ms-auto me-auto mb-sm-0 mt-5" style="width: 480px;" role="alert">
                      {{ Session::get("message") }}
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
                  </div>
              @elseif(Session::has('status') == 'success')
                  <div class="alert alert-success alert-dismissable fade show d-flex justify-content-between w-50 ms-auto me-auto mb-sm-0 mt-5" role="alert">
                      {{ Session::get("message") }}
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
                  </div>
              @endif --}}
              <form method="POST" action="{{ route('password.update') }}" class="mx-auto mt-2 shadow-lg">
                  @csrf
                  <h4 class="text-center">Password Reset</h4>
                  <input type="hidden" name="token" value="{{ $token }}">
                  <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus id="email">
                    @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                  <div class="mb-3">
                      <label for="Password" class="form-label">Enter New Password</label>
                      <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" id="password">
                      @error('password')
                      <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                  </div>
                  <div class="mb-3">
                      <label for="password-confirm" class="form-label">Re-enter New Password</label>
                      <input type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" id="password-confirm">
                      
                  </div>
                      <button type="submit" class="btn btn-primary mt-5">Reset Password</button>
                      <div class="form-text d-flex justify-content-between">
                          
                          {{-- <div id="loginHelp" class="form-text mt-3 "><a href="{{ route('login') }}">back to login</a></div> --}}
                      </div>
              </form>
          </div>
      </div>
     
  
   
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    </body>
  </html>