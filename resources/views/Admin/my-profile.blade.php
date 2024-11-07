<!doctype html>
<html lang="en">

<head>
    @include('Template.head')
    <style>
        .form-control {
            background: #e4e7ea;
            color: #3a4752;
        }
    </style>
</head>

<body>
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6">

        <header class="app-header">

            <nav class="navbar navbar-expand-lg navbar-light">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" onclick="window.history.back();">
                            <iconify-icon icon="tabler:arrow-back-up" class="fs-4"></iconify-icon>
                            <span class="nav-link me-2 fs-4">Kembali</span>
                        </a>
                    </li>
                </ul>
                <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
                    <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
                        <li class="nav-item">
                            <span class="nav-link me-2 fs-5">{{ auth()->user()->name }}</span>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="{{ asset('SEODash/src/assets/images/profile/user-1.jpg') }}" alt=""
                                    width="35" height="35" class="rounded-circle">
                            </a>
                            <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up"
                                aria-labelledby="drop2">
                                <div class="message-body">
                                    @if (auth()->user()->level == 'admin')
                                        <a href="{{ route('profile') }}"
                                            class="d-flex align-items-center gap-2 dropdown-item">
                                            <i class="ti ti-user fs-6"></i>
                                            <p class="mb-0 fs-3">My Profile</p>
                                        </a>
                                    @endif
                                    <a href="{{ route('logout') }}"
                                        class="btn btn-outline-primary mx-3 mt-2 d-block">Logout</a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>

        </header>

        <div class="container-fluid">
            <div class="row">


                <div class="col">
                    <div class="card profile-card">
                        <div class="card-body">
                            <h5 class="card-title">Profil</h5>
                            <hr>
                            <form>
                                <div class="row mb-3">
                                    <label class="col-sm-3 col-form-label">Username</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" value="sdadas">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-3 col-form-label">Hak Akses</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" value="Administrator">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-3 col-form-label">NIK</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" value="3424234324">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-3 col-form-label">Nama Lengkap</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" value="Faizi Rahman">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-3 col-form-label">Telepon</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" value="099076756">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-3 col-form-label">Alamat</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" value="Kalijaga">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary mt-4">Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card profile-card">

                        <div class="card-body">
                            <h5 class="card-title">Ubah Password</h5>
                            <hr>
                            @if (session('status'))
                                <div class="alert alert-success">
                                    {{ session('status') }}
                                </div>
                            @endif

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <form action="{{ route('password.ganti') }}" method="POST">
                                @csrf
                                <div class="input-group mb-3">
                                    <input type="password" name="old_password" id="old_password" class="form-control" placeholder="Password Lama">
                                    <span class="eye-icon" onclick="togglePassword('old_password')">
                                        <iconify-icon icon="uiw:eye-o"></iconify-icon>
                                    </span>
                                </div>
                                <div class="input-group mb-3">
                                    <input type="password" name="new_password" id="new_password" class="form-control" placeholder="Password Baru" required>
                                    <span class="eye-icon" onclick="togglePassword('new_password')">
                                        <iconify-icon icon="uiw:eye-o"></iconify-icon>
                                    </span>
                                </div>
                                <div class="input-group mb-3">
                                    <input type="password" name="new_password_confirmation" id="new_password_confirmation" class="form-control" placeholder="Konfirmasi Password Baru" required>
                                    <span class="eye-icon" onclick="togglePassword('new_password_confirmation')">
                                        <iconify-icon icon="uiw:eye-o"></iconify-icon>
                                    </span>
                                </div>
                            
                                <button type="submit" class="btn btn-primary mt-4">Simpan</button>
                            </form>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('Template.footer')
    </div>

    @include('Template.script')
    @if (session('login_success'))
        <script>
            Swal.fire({
                position: "center",
                icon: "success",
                title: "Login berhasil",
                showConfirmButton: false,
                timer: 1500
            });
        </script>
    @endif
    <script>
        function togglePassword(id) {
            const passwordField = document.getElementById(id);
            const eyeIcon = document.getElementById('eye_' + id);
            if (passwordField.type === "password") {
                passwordField.type = "text";
                eyeIcon.classList.remove("fa-eye");
                eyeIcon.classList.add("fa-eye-slash");
            } else {
                passwordField.type = "password";
                eyeIcon.classList.remove("fa-eye-slash");
                eyeIcon.classList.add("fa-eye");
            }
        }

        function goBack() {
            window.history.back();
        }
    </script>
</body>

</html>
