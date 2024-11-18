<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="{{ asset('StyleLogin/Login/style.css') }}" rel="stylesheet">
    <link rel="shortcut icon" type="image/png" href="{{ asset('SEOdash/src/assets/images/logos/logo-sirebon-1.png') }}" />
    <title>Login Form</title>
</head>

<body>
    <div class="container-fluid ">
        <form class="mx-auto" action="{{ route('password.update') }}" method="post">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">
            <input type="hidden" name="email" value="{{ request()->email }}">

            <h4 class="text-center">Reset <span>Password</span></h4>
            <div class="mb-3 mt-5">
                <label for="password" class="form-label">Password Baru</label>
                <input type="password" class="form-control" id="password" name="password" required>
                @error('password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password-confirm" class="form-label">Konfirmasi Password Baru</label>
                <input type="password" class="form-control" id="password-confirm" name="password_confirmation" required>
            </div>

            <button type="submit" class="btn btn-primary mt-5">Simpan</button>
        </form>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>
