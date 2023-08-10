<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>

    <style>
        .main-container {
            /* background: linear-gradient(to right, #2b68ec, #012c88); */
            background-color: rgb(233, 233, 233);
            height: 100vh;
            position: absolute;
        }

        .container-login {
            top: 50%;
            left: 50%;
            width: 70vw;
            height: 60vh;
            position: absolute;
            transform: translate(-49%, -50%);
        }

        .eye {
            position: absolute;
            cursor: pointer;
            right: 10px;
            top: 70%;
            transform: translateY(-50%);
        }

        #show {
            display: none;
        }

        @media only screen and (max-width: 957px) {
            /* .container-foto {
                width: 20rem;
            } */
        }

        @media only screen and (max-width: 768px) {
            .container-foto {
                display: none;
            }
        }

        /* @media only screen and (max-width: 575px) {
            .container-foto {
                display: none;
            }
        } */
    </style>
    
    @include('partials.bootstrap')
    @include('partials.toastr')
</head>
<body style="font-family: 'Poppins', sans-serif;">
    <div class="container-fluid main-container">
        <div class="container-login row rounded">
            <div class="col-lg-6 col-md-5 p-0 rounded-start container-foto">
                <img src="img/login-exm/kamar-kost.jpg" alt="Bedroom"  class="rounded" style="width: 100%; height: 100%;">
            </div>
            <div class="col-lg-6 col-md-7 bg-light rounded-end p-4">
                <div class="p-2" style="height: 100%;">
                    <h4 class="fw-bold mb-4">Masuk</h4>
                    <form action="/login" class="" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="fw-bold">Email</label>
                            <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" value="{{ old('email') }}" autofocus>
                            @error('email')
                                <div class="invalid-feedback text-start">
                                    <b>{{ $message }}</b>
                                </div>
                            @enderror
                        </div>
                        <div class="" style="position: relative;">
                            <label for="pw" class="fw-bold">Password</label>
                            <input type="password" name="password" id="pw" class="form-control @error('password') is-invalid @enderror" placeholder="Password">
                            @error('password')
                                <div class="invalid-feedback text-start">
                                    <b>{{ $message }}</b>
                                </div>
                            @enderror
                            <div class="eye" onclick="showHidePassword()">
                                <i id="show" class="fa-solid fa-eye"></i>
                                <i id="hide" class="fa-solid fa-eye-slash"></i>
                            </div>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-warning fw-bold my-4 text-light" style="font-size: 16px;">Masuk</button>
                        </div>
                        <div class="d-flex justify-content-between">
                            <div>
                                <input type="checkbox" name="remember" id="rm" class="ms-1">
                                <label for="rm" class="text-warning">Remember Me</label>
                            </div>
                            <p></p>
                            <a href="" class="text-dark">Forgot Password</a>
                        </div>
                        <div class="mt-3">
                            <p class="text-center text-dark">Belum Penya Akun? <a href="/daftar" class="text-warning text-decoration-none">Daftar</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        function showHidePassword() {
            let passCheck = document.getElementById("pw");
            let show = document.getElementById("show");
            let hide = document.getElementById("hide");
            
            if (passCheck.type == 'password') {
                passCheck.type = 'text';
                show.style.display = "block";
                hide.style.display = "none";
            } else {
                passCheck.type = 'password';
                show.style.display = "none";
                hide.style.display = "block";
            }
        }
    </script>
    @include('partials.toastrjs')
    <script>
        @if (Session::has('error'))
            toastr.error("{{ Session::get('error') }}", "Waduh")
        @elseif (Session::has('warning'))
            toastr.warning("{{ Session::get('warning') }}");
        @endif
    </script>
</body>
</html>