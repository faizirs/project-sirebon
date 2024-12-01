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
                                <h5 class="card-title">Kelola User</h5>
                                <hr>
                                @if (auth()->user()->level == 'superadmin')
                                    <div class="d-flex justify-content-between mb-2">
                                        <a href="{{ route('kelola-user.create') }}"
                                            class="btn btn-primary">Tambah User</a>
                                        <input type="text" id="searchInput" class="form-control w-25"
                                            placeholder="Cari...">
                                    </div>
                                @endif
                                <div class="table-responsive table-bordered">
                                    <table class="table text-nowrap align-middle mb-0 table-striped" id="dataTable">
                                        <thead>
                                            <tr class="border-2 border-bottom border-primary border-0">
                                                <th scope="col" class="text-center">No.</th>
                                                <th scope="col" class="text-center">Nama</th>
                                                <th scope="col" class="text-center">Username</th>
                                                <th scope="col" class="text-center">Email</th>
                                                <th scope="col" class="text-center">Level</th>
                                                @if (auth()->user()->level == 'superadmin')
                                                    <th scope="col" class="text-center">Aksi</th>
                                                @endif
                                            </tr>
                                        </thead>
                                        <tbody class="table-group-divider">
                                            @foreach ($users as $index => $user)
                                                <tr>
                                                    <td scope="col" class="text-center">{{ $index + 1 }}.</td>
                                                    <td scope="col" class="text-center">{{ $user->name }}</td>
                                                    <td scope="col" class="text-center">{{ $user->username }}</td>
                                                    <td scope="col" class="text-center">{{ $user->email }}</td>
                                                    <td scope="col" class="text-center">{{ $user->level }}</td>
                                                    @if (auth()->user()->level == 'superadmin')
                                                        <td scope="col" class="text-center">
                                                            <a href="{{ route('kelola-user.edit', $user->id) }}"
                                                                class="btn btn-primary btn-sm m-1"><iconify-icon icon="tabler:edit" width="1.2em" height="1.2em"></iconify-icon></a>
                                                            <form
                                                                action="{{ route('kelola-user.destroy', $user->id) }}"
                                                                method="POST" style="display:inline;">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-danger btn-sm m-1"
                                                                    onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"><iconify-icon icon="mi:delete" width="1.2em" height="1.2em"></iconify-icon></button>
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

</body>

</html>
