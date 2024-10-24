<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

    <title>Product</title>
    <style>
        body{
            background-color: #c9c9c9;
        }
        .sidebar {
            height: 100vh;
            position: fixed;
            width: 250px;
            background-color: #f8f9fa;
            padding-top: 20px;
        }
        .content {
            margin-left: 270px;
            padding: 20px;
        }
        .list-group-item.active {
            background-color: #007bff;
            border-color: #007bff;
        }
    </style>
</head>
<body>

<div class="sidebar">
    <ul class="list-group">
        <li class="list-group-item active">MAIN MENU</li>
        {{-- <a href="{{ route('product.index') }}" class="list-group-item" style="color: #212529;">Product</a> --}}
        <li class="list-group-item">Profile</li>
        <a href="{{ route('logout') }}" class="list-group-item" style="color: #212529;">Logout</a>
    </ul>
</div>

<div class="content">
    <div class="card">
        <div class="card-body">
            <label><h3>Dashboard</h3></label>
            <hr>
            <b>Selamat Datang di halaman home</b>
        </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
{{-- <script>
    //message with sweetalert
    @if(session('success'))
        Swal.fire({
            icon: "success",
            title: "BERHASIL",
            text: "{{ session('success') }}",
            showConfirmButton: false,
            timer: 2000
        });
    @elseif(session('error'))
        Swal.fire({
            icon: "error",
            title: "GAGAL!",
            text: "{{ session('error') }}",
            showConfirmButton: false,
            timer: 2000
        });
    @endif
</script> --}}

</body>
</html>
