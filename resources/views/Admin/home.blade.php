

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
            <div class="col-4">
              <div class="card">
                <div class="card-body text-center">
                  <span class="fs-11 mt-2 d-block text-nowrap">Jumlah Sudah Bayar</span>
                  <h4 class="mb-0 mt-1">0</h4>
                </div>
              </div>
            </div>
          
            <div class="col-4">
              <div class="card">
                <div class="card-body text-center">
                    <span class="fs-11 mt-2 d-block text-nowrap">Jumlah Belum Bayar</span>
                    <h4 class="mb-0 mt-1">0</h4>
                </div>
              </div>
            </div>
          
            <div class="col-4">
              <div class="card">
                <div class="card-body text-center">
                    <span class="fs-11 mt-2 d-block text-nowrap">Jumlah Pemasukan</span>
                    <h4 class="mb-0 mt-1">Rp. 0</h4>
                </div>
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