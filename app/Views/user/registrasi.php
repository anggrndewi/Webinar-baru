<!DOCTYPE html>
<html lang="en">
<head>
<title>Lampung Cerdas</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <!-- Icon Font Stylesheet -->   
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

  <link href="<?= base_url('css/style.css') ?>" rel="stylesheet">
  <link href="img/lampung cerdas.webp" rel="icon">
</head>

<body class="bg-registrasi-user">
    <div class="container">
        <!-- Outer Row -->
        <div class="row justify-content-center my-5">
            <div class="col-xl-9 col-lg-16 col-md-15">
                <div class="card o-hidden border-0 shadow-lg my-auto">
                    <div class="card-body mx-4">
                        <div class="row">
                            <div class="col">
                                <img class="rounded-circle img-registrasi" src="<?= base_url().'/img/lampung cerdas.webp'?>">
                            </div>
                        </div>
                        <div class="row text-registrasi-input">
                            <div class="col">
                                <div >
                                    <h1 class="h2 text-center text-registrasi mb-4">Registrasi</h1>
                                        <form method="POST" class="user" action="/tambahuser" enctype="multipart/form-data">
                                            <div class="mb-3 row">
                                                <label for="nama" class="col-sm-2 ">Nama</label>
                                                <div class="col-sm-10">
                                                    <input required type="text" class="form-control border-1" name="nama">
                                                </div>
                                            </div> 
                                            <div class="mb-3 row">
                                                <label for="email" class="col-sm-2 ">Email</label>
                                                <div class="col-sm-10">
                                                    <input required type="email" class="form-control border-1"  name="email">
                                                </div>
                                            </div> 
                                            <div class="mb-3 row">
                                                <label for="wa" class="col-sm-2 ">Nomer Hp</label>
                                                <div class="col-sm-10">
                                                    <input required type="text" class="form-control border-1" name="nomerhp">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label for="password" class="col-sm-2 ">Password</label>
                                                <div class="col-sm-10">
                                                    <input required type="password" class="form-control border-1"  name="password">
                                                </div>
                                            </div>
                                        <div class="row">
                                        <div class="mb-2 col-sm-8 text-center">
                                                <p>Sudah punya Akun ? <a class="text-primary text-decoration-none" href="/loginuser">Masuk</a></p>
                                            </div>
                                        </div>
                                            <div class="d-grid gap-2 col-2 mx-auto">
                                                <button class="btn btn-login-user d-block btn-registrasi" type="submit">Daftar</button>
                                            </div>
                                        </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>