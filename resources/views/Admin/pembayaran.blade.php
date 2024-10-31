

<!doctype html>
<html lang="en">

<head>
  @include('Template.head')
</head>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <!-- Sidebar Start -->
    @include('Template.left-sidebar')
    <!--  Sidebar End -->
    <!--  Main wrapper -->
    <div class="body-wrapper">
      <!--  Header Start -->
      <header class="app-header">
        @include('Template.navbar')
      </header>
      <!--  Header End -->
      <div class="container-fluid">
        <div class="row">
            
          <div class="col">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Pembayaran Retribusi</h5>
                <hr>
                <div class="d-flex justify-content-between mb-2">
                  <button type="button" class="btn btn-primary">Tambah Data</button>
                  <input type="text" id="searchInput" class="form-control w-25" placeholder="Cari...">
                </div>
                <div class="table-responsive table-bordered">
                  <table class="table text-nowrap align-middle mb-0 table-striped" id="dataTable">
                    <thead>
                      <tr class="border-2 border-bottom border-primary border-0"> 
                        <th scope="col" class="text-center">No.</th>
                        <th scope="col" class="text-center">Nama Lengkap</th>
                        <th scope="col" class="text-center">Rekening</th>
                        <th scope="col" class="text-center">Bukti</th>
                        <th scope="col" class="text-center">Tanggal Bayar</th>
                        <th scope="col" class="text-center">Tanggal Tindak Lanjut</th>
                        <th scope="col" class="text-center">Tindak Lanjut User</th>
                        <th scope="col" class="text-center">Aksi</th>
                      </tr>
                    </thead>
                    <tbody class="table-group-divider">
                      <tr>
                        <td scope="col" class="text-center">1.</td>
                        <td scope="col" class="text-center">Faizi Rahman Syawli</td>
                        <td scope="col" class="text-center">32131313</td>
                        <td scope="col" class="text-center">dsadaf</td>
                        <td scope="col" class="text-center">dsadaf</td>
                        <td scope="col" class="text-center">dsadaf</td>
                        <td scope="col" class="text-center">dsadaf</td>
                        <td scope="col" class="text-center">
                          <a href="" class="btn btn-success btn-sm m-1">Sesuai</a>
                          <a href="" class="btn btn-danger btn-sm m-1">Tidak Sesuai</a>
                        </td>
                      </tr>
                    </tbody>
                  </table>
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