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
        <div class="container-fluid ">
            <form method="POST" action="/register" class="mx-auto shadow-lg mt-2">
                @csrf
                <h4 class="text-center">Register</h4>
                    <div class="mb-3 mt-5">
                        <label for="exampleInputEmail1" class="form-label">Nama lengkap</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="inputName" value="{{old('name')}}" >
                        @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
           
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="inputEmail" aria-describedby="emailHelp" value="{{old('email')}}" >
                        @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">kata sandi</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="inputPassword">
                        @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="d-flex p-3">
                        <div class="me-3">
                            <label for="exampleInputPassword1" class="form-label">Mendaftar Sebagai</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="role_id" id="flexRadioDefault1" checked value="3">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Atlet
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="role_id" id="flexRadioDefault2" value="2">
                                <label class="form-check-label" for="flexRadioDefault2">
                                    Pelatih
                                </label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Jenis Kelamin</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" id="flexRadioDefault1" checked value="Laki-laki">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Laki-laki
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" id="flexRadioDefault2" value="perempuan">
                                <label class="form-check-label" for="flexRadioDefault2">
                                    Perempuan
                                </label>
                            </div>
                        </div>
                    </div>
                    
                   
                    <button type="submit" class="btn btn-primary mt-3">Daftar</button>
                    <div class="form-text d-flex justify-content-center">
                        {{-- <div id="emailHelp" class="form-text mt-3 me-2"><a href="">Lupa Kata Sandi?</a></div> --}}
                        <div id="registerHelp" class="form-text mt-3 me-2">Sudah punya akun?</div>
                        <div id="registerHelp" class="form-text mt-3 "><a href="login">Masuk</a></div>
                    </div>
            </form>
        </div>
    </div>
   


    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>