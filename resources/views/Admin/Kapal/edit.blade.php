<!doctype html>
<html lang="en">

<head>
    @include('Template.head')
    <style>
        .form-control,
        .form-select {
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
                            <h5 class="card-title">Edit Kapal Wajib Retribusi</h5>
                            <hr>
                            <form action="{{ route('kapal.update', $kapal->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="row mb-3">
                                    <label class="col-sm-3 col-form-label" for="id_wajib_retribusi">Pemilik Kapal</label>
                                    <div class="col-sm-9">
                                        <select name="id_wajib_retribusi" id="id_wajib_retribusi" class="form-select">
                                            @foreach($pemilikKapal as $pemilik)
                                                <option value="{{ $pemilik->id }}" {{ $kapal->id_wajib_retribusi == $pemilik->id ? 'selected' : '' }}>
                                                    {{ $pemilik->nama }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="row mb-3">
                                    <label class="col-sm-3 col-form-label">Nama Kapal</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="nama_kapal" class="form-control" value="{{ $kapal->nama_kapal }}">
                                    </div>
                                </div>
                            
                                <div class="row mb-3">
                                    <label class="col-sm-3 col-form-label" for="id_jenis_kapal">Jenis Kapal</label>
                                    <div class="col-sm-9">
                                        <select name="id_jenis_kapal" id="id_jenis_kapal" class="form-select">
                                            @foreach($jeniskapal as $jenis)
                                                <option value="{{ $jenis->id }}" {{ $kapal->id_jenis_kapal == $jenis->id ? 'selected' : '' }}>
                                                    {{ $jenis->jenis_kapal }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            
                                <div class="row mb-3">
                                    <label class="col-sm-3 col-form-label">Ukuran</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="ukuran" class="form-control" value="{{ $kapal->ukuran }}">
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
    </script>
</body>

</html>
