<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="{{ asset('StyleLogin/style.css')}}" rel="stylesheet" >
    <title>Login Form</title>
  </head>
  <body>
        <div class="container-fluid ">
            <form class="mx-auto" action="{{ route('postlogin') }}" method="post">
                @csrf
                
                <!-- Tambahkan gambar profil disini -->
                <img src="{{ asset('Pict/logo.jpg') }}" alt="Profile Image" class="profile-img">

                <h4 class="text-center">Login <span>SiRebon</span></h4>
                <div class="mb-3 mt-5">
                  <label for="exampleInputEmail1" class="form-label">Email</label>
                  <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
                </div>
                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label">Password</label>
                  <input type="password" class="form-control" id="exampleInputPassword1" name="password">
                  <div id="emailHelp" class="form-text mt-3">Lupa password ?</div>
                </div>
              
                <button type="submit" class="btn btn-primary mt-5">Login</button>
              </form>
        </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  </body>
</html>