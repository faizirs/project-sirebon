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
                                <h5 class="card-title">Laporan Pembayaran Retribusi</h5>
                                <hr>
                                <div class="d-flex justify-content-between mb-2">
                                    <input type="text" id="searchInput" class="form-control w-25"
                                        placeholder="Cari...">
                                    <!-- Tombol Cetak -->
                                    <button onclick="printReport()" class="btn btn-success">Cetak Laporan</button>
                                </div>
                                <div class="table-responsive table-bordered">
                                    <table class="table text-nowrap align-middle mb-0 table-striped" id="dataTable">
                                        <thead>
                                            <tr class="border-2 border-bottom border-primary border-0">
                                                <th scope="col" class="text-center">No.</th>
                                                <th scope="col" class="text-center">Nama Pemilik Rekening</th>
                                                <th scope="col" class="text-center">No. Rekening</th>
                                                <th scope="col" class="text-center">Biaya Retribusi</th>
                                                <th scope="col" class="text-center">Bukti Pembayaran</th>
                                                <th scope="col" class="text-center">Tanggal Bayar</th>
                                                <th scope="col" class="text-center">Tanggal Tindak Lanjut</th>
                                                <th scope="col" class="text-center">Tindak Lanjut User</th>
                                                <th scope="col" class="text-center">Keterangan</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table-group-divider">
                                            @forelse ($pembayaran as $data)
                                                <tr>
                                                    <td class="text-center">{{ $loop->iteration }}</td>
                                                    <td class="text-center">{{ $data->nama_pemilik_rekening }}</td>
                                                    <td class="text-center">{{ $data->no_rekening }}</td>
                                                    <td class="text-center">
                                                        Rp {{ number_format($data->biaya_retribusi, 2, ',', '.') }}
                                                    </td>
                                                    <td class="text-center">
                                                        <img src="{{ asset('bukti_pembayaran/' . $data->file_bukti) }}"
                                                            alt="{{ $data->nama_pemilik_rekening }}" class="rounded"
                                                            style="width: 100px">
                                                    </td>
                                                    <td class="text-center">
                                                        {{ $data->created_at->format('d-m-Y') }}
                                                    </td>
                                                    <td class="text-center">
                                                        {{ $data->tanggal_tindak_lanjut ? \Carbon\Carbon::parse($data->tanggal_tindak_lanjut)->format('d-m-Y') : 'Belum Ditindak' }}
                                                    </td>
                                                    <td class="text-center">
                                                        {{ $data->tindak_lanjut_user ?? 'Belum Ada' }}
                                                    </td>
                                                    <td class="text-center">
                                                        @if ($data->status == 'Y')
                                                            <span class="badge bg-success">Sesuai</span>
                                                        @elseif ($data->status == 'N')
                                                            <span class="badge bg-danger">Tidak Sesuai</span>
                                                        @else
                                                            <span class="badge bg-warning">Belum Diverifikasi</span>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="9" class="text-center">Tidak ada data pembayaran.</td>
                                                </tr>
                                            @endforelse
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
        @if (session('success'))
            <script>
                Swal.fire({
                    position: "center",
                    icon: "success",
                    title: "{{ session('success') }}",
                    showConfirmButton: false,
                    timer: 1500
                });
            </script>
        @endif

        <!-- Script Cetak -->
        <script>
            function printReport() {
                window.print();
            }
        </script>
</body>

</html>
