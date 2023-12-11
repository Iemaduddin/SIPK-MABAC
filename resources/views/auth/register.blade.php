<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIPK - MABAC</title>
    <link rel="icon" type="image/png" href="{{ asset('/assets/images/logo/logo_tanpa_nama.png') }}">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('assets/css/app_modif.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/pages/auth_modif.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/bootstrap-icons/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/pages/home-signin-signup.css') }}">
</head>

<body>
    <div class="video-container">
        <video autoplay muted loop id="bg-video">
            <source src="{{ asset('assets/kaperma.mp4') }}" type="video/mp4">
        </video>
        <div class="overlay-layer"></div>
    </div>
    <style>
        body,
        html {
            margin: 0;
            padding: 0;
            overflow: hidden;
            /* Hide scrollbars */
        }

        .video-container {
            position: fixed;
            width: 100%;
            height: 100%;
        }

        #bg-video {
            position: fixed;
            right: 0;
            bottom: 0;
            min-width: 100%;
            min-height: 100%;
            z-index: -1;
            /* Move the video to the background */
        }

        .overlay-layer {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.678);
            /* Adjust the alpha (last parameter) for transparency */
            z-index: 1;
            /* Place the layer on top of the video */
        }
    </style>

    <div class="container" id="container">
        <div class="form-container sign-up-container">
            <form action="{{ route('register') }}" method="POST">
                @csrf
                <h1 class="mb-4" style="color: black">Create Account</h1>
                <input type="text" class="form-control" placeholder="Nama Lengkap" name="nama" required>
                <input type="text" class="form-control" placeholder="Username" name="username" required>
                <input type="password" class="form-control" placeholder="Password" name="password" required>
                <button class="mt-3" type="submit">Sign Up</button>
            </form>
        </div>
        <div class="form-container sign-in-container">
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <h1 class="mb-4" style="color: black">Sign in</h1>
                <input type="text" class="form-control" placeholder="Username" name="username"
                    value="{{ old('username') }}" required>
                @if ($errors->has('username'))
                    <div class="alert alert-danger">{{ $errors->first('username') }}</div>
                @endif
                <input type="password" class="form-control" placeholder="Password" name="password"
                    value="{{ old('password') }}" required>
                <a href="#">Forgot your password?</a>
                @if ($errors->has('password'))
                    <div class="alert alert-danger">{{ $errors->first('password') }}</div>
                @endif
                <button class="mt-3" type="submit">Sign In</button>
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <a href="{{ route('home') }}"><img src="{{ asset('assets/images/logo/logoHome.png') }}"
                            alt="Logo" style="width:9rem"></a>
                    <h2 class="font-color-home">Halo, Jumpa Lagi!</h2>
                    <p>Sudah punya akun? <br> Yuk, sign in dan nikmati layanan kami!</p>
                    <button class="ghost" id="signIn">Sign In</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <a href="{{ route('home') }}"><img src="{{ asset('assets/images/logo/logoHome.png') }}"
                            alt="Logo" style="width:9rem"></a>
                    <h2 style="color: black">Selamat Datang!</h2>
                    <p>Belum punya akun?<br>Bergabunglah dengan kami! <br> Daftar sekarang.</p>
                    <button class="ghost" id="signUp">Sign Up</button>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('assets/js/pages/home-signin-signup.js') }}"></script>
</body>

</html>
