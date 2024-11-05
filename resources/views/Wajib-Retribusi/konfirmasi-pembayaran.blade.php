<!doctype html>
<html lang="en">

<head>
    @include('Template.head')
    <style>
      .form-control, .form-select {
        background: #e4e7ea;
        color: #3a4752;
      }
    </style>
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
                                <form>
                                    <div class="row mb-3">
                                        <label class="col-sm-3 col-form-label">Jenis Bank</label>
                                        <div class="col-sm-9">
                                          <select class="form-select" id="choices" name="choices">
                                              <option value="Pilihan 1">Pilihan 1</option>
                                              <option value="Pilihan 2">Pilihan 2</option>
                                              <option value="Pilihan 3">Pilihan 3</option>
                                          </select>
                                      </div>
                                      
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-3 col-form-label">Nominal Transfer</label>
                                        <div class="col-sm-9">
                                            <input type="number" class="form-control" value="10000000">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-3 col-form-label">Nomor Rekening</label>
                                        <div class="col-sm-9">
                                            <input type="number" class="form-control" value="3424234324">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-3 col-form-label">Bukti Pembayaran</label>
                                        <div class="col-sm-9">
                                            <input type="file" class="form-control" value="">
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary mt-4">Kirim</button>
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
