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
                                @if (auth()->user()->level == 'admin')
                                    <h5 class="card-title">Wajib Retribusi</h5>
                                    <hr>
                                @endif
                                @if (auth()->user()->level == 'retribusi')
                                    <h5 class="card-title">Kapalku</h5>
                                    <hr>
                                @endif
                                    <div class="d-flex justify-content-between mb-2">
                                        <a href="{{ route('wajib-retribusi.create') }}" class="btn btn-primary">Tambah
                                            Data</a>
                                        <input type="text" id="searchInput" class="form-control w-25"
                                            placeholder="Cari...">
                                    </div>
                                <div class="table-responsive table-bordered">
                                    <table class="table text-nowrap align-middle mb-0 table-striped" id="dataTable">
                                        <thead>
                                            <tr class="border-2 border-bottom border-primary border-0">
                                                <th scope="col" class="text-center">No.</th>
                                                <th scope="col" class="text-center">Nama Lengkap</th>
                                                <th scope="col" class="text-center">Telepon</th>
                                                <th scope="col" class="text-center">NIK</th>
                                                <th scope="col" class="text-center">Alamat</th>
                                                <th scope="col" class="text-center">Kelurahan</th>
                                                @if (auth()->user()->level == 'admin')
                                                    <th scope="col" class="text-center">Aksi</th>
                                                @endif
                                            </tr>
                                        </thead>
                                        <tbody class="table-group-divider">
                                          @foreach ($wajibretribusi as $index => $data)
                                            <tr>
                                                    <td scope="col" class="text-center">{{ $index + 1 }}.</td>
                                                    <td scope="col" class="text-center">{{ $data->nama }}</td>
                                                    <td scope="col" class="text-center">{{ $data->no_hp }}</td>
                                                    <td scope="col" class="text-center">{{ $data->nik }}</td>
                                                    <td scope="col" class="text-center">{{ $data->alamat }}</td>
                                                    <td scope="col" class="text-center">
                                                        {{ $data->kelurahan->nama_kelurahan }}</td>
                                                    @if (auth()->user()->level == 'admin')
                                                        <td scope="col" class="text-center">
                                                            <a href="{{ route('wajib-retribusi.edit', $data->id) }}"
                                                                class="btn btn-primary btn-sm m-1">Ubah</a>

                                                            <form action="{{ route('wajib-retribusi.destroy', $data->id) }}"
                                                                method="POST" style="display:inline;">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-danger btn-sm m-1"
                                                                    onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                                                            </form>
                                                        </td>
                                                    @endif
                                                  </tr>
                                                  @endforeach
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
