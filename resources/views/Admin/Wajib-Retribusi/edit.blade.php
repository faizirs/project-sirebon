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
                            <h5 class="card-title">Edit Wajib Retribusi</h5>
                            <hr>
                            <form action="{{ route('wajib-retribusi.update', $wajibRetribusi->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <!-- Nama Lengkap -->
                                <div class="row mb-3">
                                    <label class="col-sm-3 col-form-label">Nama</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="name" class="form-control" value="{{ $user->name }}" required>
                                    </div>
                                </div>

                                <!-- Username -->
                                <div class="row mb-3">
                                    <label class="col-sm-3 col-form-label">Username</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="username" class="form-control" value="{{ $user->username }}" required>
                                    </div>
                                </div>

                                <!-- Email -->
                                <div class="row mb-3">
                                    <label class="col-sm-3 col-form-label">Email</label>
                                    <div class="col-sm-9">
                                        <input type="email" name="email" class="form-control" value="{{ $user->email }}" required>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-3 col-form-label">Nama Lengkap</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="nama" class="form-control" value="{{ $wajibRetribusi->nama }}" required>
                                    </div>
                                </div>
                                <!-- Nomor HP -->
                                <div class="row mb-3">
                                    <label class="col-sm-3 col-form-label">Nomor HP</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="no_hp" class="form-control" value="{{ $wajibRetribusi->no_hp }}" required>
                                    </div>
                                </div>

                                <!-- NIK -->
                                <div class="row mb-3">
                                    <label class="col-sm-3 col-form-label">NIK</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="nik" class="form-control" value="{{ $wajibRetribusi->nik }}" required>
                                    </div>
                                </div>

                                <!-- Alamat -->
                                <div class="row mb-3">
                                    <label class="col-sm-3 col-form-label">Alamat</label>
                                    <div class="col-sm-9">
                                        <textarea name="alamat" class="form-control" required>{{ $wajibRetribusi->alamat }}</textarea>
                                    </div>
                                </div>

                                <!-- Kelurahan -->
                                <div class="row mb-3">
                                    <label class="col-sm-3 col-form-label">Kelurahan</label>
                                    <div class="col-sm-9">
                                        <select name="id_kelurahan" class="form-select" required>
                                            @foreach ($kelurahan as $data)
                                                <option value="{{ $data->id }}" {{ $wajibRetribusi->id_kelurahan == $data->id ? 'selected' : '' }}>
                                                    {{ $data->nama_kelurahan }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <!-- Status -->
                                <div class="row mb-3">
                                    <label class="col-sm-3 col-form-label">Status</label>
                                    <div class="col-sm-9">
                                        <select name="status" class="form-select" required>
                                            <option value="A" {{ $wajibRetribusi->status == 'A' ? 'selected' : '' }}>Aktif</option>
                                            <option value="B" {{ $wajibRetribusi->status == 'B' ? 'selected' : '' }}>Tidak Aktif</option>
                                        </select>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary mt-4">Simpan Perubahan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('Template.footer')
    </div>

    @include('Template.script')
</body>

</html>
