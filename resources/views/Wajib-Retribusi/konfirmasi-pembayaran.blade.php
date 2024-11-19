<!doctype html>
<html lang="en">

<head>
    @include('Template.head')
</head>

<body>
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6">
        <!-- Sidebar -->
        @include('Template.left-sidebar')

        <div class="body-wrapper">
            <!-- Header -->
            <header class="app-header"> 
                @include('Template.navbar')
            </header>

            <div class="container-fluid">
                <div class="row">
                    <div class="col">
                        <div class="card profile-card">
                            <div class="card-body">
                                <h5 class="card-title">Konfirmasi Pembayaran Retribusi</h5>
                                <hr>

                                <!-- Menampilkan pesan error -->
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <form action="{{ route('pembayaran.store') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <!-- Field untuk jenis bank tetap -->
                                    <div class="row mb-3">
                                        <label for="id_ref_bank" class="col-sm-3 col-form-label">Jenis Bank</label>
                                        <div class="col-sm-9">
                                            <select name="id_ref_bank" class="form-select" id="choices">
                                                @foreach ($banks as $bank)
                                                    <option value="{{ $bank->id }}">{{ $bank->nama_bank }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label class="col-sm-3 col-form-label">Nomor Rekening</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="no_rekening" class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label class="col-sm-3 col-form-label">Nama Pemilik Rekening</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="nama_pemilik_rekening" class="form-control"
                                                required>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-3 col-form-label">Nominal Transfer</label>
                                        <div class="col-sm-9">
                                            <input type="number" name="biaya_retribusi" class="form-control"
                                                value="{{ $biayaRetribusi }}" readonly>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-3 col-form-label">Bukti Pembayaran</label>
                                        <div class="col-sm-9">
                                            <input type="file" name="file_bukti" class="form-control" accept=".jpg,.jpeg,.png,.pdf">
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary mt-4">Konfirmasi Pembayaran</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @include('Template.footer')
        </div>
    </div>
    @include('Template.script')


</body>

</html>
