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
            @if(Session::has('status') == 'failed')
                <div class="alert alert-danger alert-dismissable fade show d-flex justify-content-between ms-auto me-auto mb-sm-0 mt-5" style="width: 480px;" role="alert">
                    {{ Session::get("message") }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
                </div>
            @elseif(Session::has('status') == 'success')
                <div class="alert alert-success alert-dismissable fade show d-flex justify-content-between w-50 ms-auto me-auto mb-sm-0 mt-5" role="alert">
                    {{ Session::get("message") }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
                </div>
            @endif
            <form method="POST" action="" class="mx-auto mt-2 shadow-lg">
                @csrf
                <h4 class="text-center">Login</h4>
                <div class="mb-3 mt-5">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" class="form-control  @error('email') is-invalid @enderror" name="email" id="inputEmail" aria-describedby="emailHelp" value="{{old('email')}}">
                    @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="Password" class="form-label">Kata Sandi</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="inputPassword">
                    @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    
                </div>
                    <button type="submit" class="btn btn-primary mt-5">Login</button>
                    <div class="form-text d-flex justify-content-center">
                        {{-- <div id="emailHelp" class="form-text mt-3 me-2"><a href="">Lupa Kata Sandi?</a></div> --}}
                        <div id="loginHelp" class="form-text mt-3 me-2">Belum daftar?</div>
                        <div id="loginHelp" class="form-text mt-3 "><a href="register">Daftar akun</a></div>
                    </div>
            </form>
        </div>
    </div>
   

 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>