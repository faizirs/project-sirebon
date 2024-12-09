<!doctype html>
<html lang="en">

<head>
    @include('Template.head')
</head>

<body>
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6">

        <header class="app-header">
            <nav class="navbar navbar-expand-lg navbar-light">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url()->previous() }}">
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
                            <h5 class="card-title">Tambah User</h5>
                            <hr>
                            <form action="{{ route('kelola-user.store') }}" method="POST">
                                @csrf
                                <!-- Input Nama -->
                                <div class="row mb-3">
                                    <label class="col-sm-3 col-form-label">Nama</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="name" class="form-control" required>
                                    </div>
                                </div>

                                <!-- Input Username -->
                                <div class="row mb-3">
                                    <label class="col-sm-3 col-form-label">Username</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="username" class="form-control" required>
                                    </div>
                                </div>

                                <!-- Input Email -->
                                <div class="row mb-3">
                                    <label class="col-sm-3 col-form-label">Email</label>
                                    <div class="col-sm-9">
                                        <input type="email" name="email" class="form-control" required>
                                    </div>
                                </div>

                                <!-- Input Password -->
                                <div class="row mb-3">
                                    <label class="col-sm-3 col-form-label">Password</label>
                                    <div class="col-sm-9">
                                        <input type="password" name="password" class="form-control" required>
                                    </div>
                                </div>

                                <!-- Input Level -->
                                <div class="row mb-3">
                                    <label class="col-sm-3 col-form-label">Level</label>
                                    <div class="col-sm-9">
                                        <select class="form-select" id="level" name="level" onchange="handleLevelChange()" required>
                                            <option value="">Pilih Level</option>
                                            <option value="admin">Admin</option>
                                            <option value="retribusi">Wajib Retribusi</option>
                                        </select>
                                        
                                        
                                    </div>
                                </div>
                                <!-- Hidden Input for ID User Group -->
                                <input type="hidden" id="id_user_group" name="id_user_group" value="">
                                

                                <!-- Input Tambahan untuk Wajib Retribusi -->
                                <div id="retribusi-inputs" style="display: none;">
                                    <div class="row mb-3">
                                        <label class="col-sm-3 col-form-label">Nama Lengkap</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="nama" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-3 col-form-label">No HP</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="no_hp" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-3 col-form-label">NIK</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="nik" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-3 col-form-label">Alamat</label>
                                        <div class="col-sm-9">
                                            <textarea name="alamat" class="form-control"></textarea>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-3 col-form-label" for="id_kelurahan">Kelurahan</label>
                                        <div class="col-sm-9">
                                            <select name="id_kelurahan" id="id_kelurahan" class="form-select">
                                                @foreach ($kelurahan as $data)
                                                    <option value="{{ $data->id }}">{{ $data->nama_kelurahan }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-3 col-form-label">Status</label>
                                        <div class="col-sm-9">
                                            <select class="form-select" name="status">
                                                <option value="A">Aktif</option>
                                                <option value="I">Non-Aktif</option>
                                            </select>
                                        </div>
                                    </div>
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
    <script>
        function handleLevelChange() {
            const level = document.getElementById('level').value;
            const retribusiInputs = document.getElementById('retribusi-inputs');
            const userGroupInput = document.getElementById('id_user_group');
    
            // Atur visibilitas input tambahan
            if (level === 'admin') {
                retribusiInputs.style.display = 'none';
                userGroupInput.value = 1; // ID group untuk admin
            } else if (level === 'retribusi') {
                retribusiInputs.style.display = 'block';
                userGroupInput.value = 2; // ID group untuk wajib retribusi
            } else {
                retribusiInputs.style.display = 'none';
                userGroupInput.value = ''; // Kosongkan jika tidak ada yang dipilih
            }
        }
    </script>
    
</body>

</html>
