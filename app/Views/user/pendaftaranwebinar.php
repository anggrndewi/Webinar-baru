<?php
$session = session();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Lampung Cerdas</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link href="<?= base_url('vendor/fontawesome-free/css/all.min.css') ?>" rel="stylesheet" type="text/css">
    <!-- Icon Font Stylesheet -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

  <!-- Data AOS -->
  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

  <link href="<?= base_url('css/style.css') ?>" rel="stylesheet">
  <link href="img/lampung cerdas.webp" rel="icon">
</head>
<body>
  <!-- Start Navbar -->
  <nav class="navbar shadow-sm navbar-expand-lg fixed-top">
    <div class="container-fluid">
        <img src="<?= base_url().'/img/lampung cerdas.webp' ?>" alt="logo" width="80">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <div class="navbar-nav ms-auto">
            <ul class="navbar-nav">
              <?php if(session()->get('loginuser')): ?>
                <li class="nav-item">
                  <a class="w3-button w3-blue w3-border w3-border-white w3-round-large" href="#"><?= session()->get('nama') ?></a>
                </li>
                <li class="nav-item">              
                  <a class="w3-button w3-blue w3-border w3-border-white w3-round-large" href="/logoutuser">Keluar</a>
                </li>
              <?php else: ?>
                <li class="nav-item">
                  <a class="w3-button w3-blue w3-border w3-border-white w3-round-large" href="/loginuser">Masuk</a>
                </li>
              <?php endif; ?>
            </ul>
          </div>
        </div>
    </div>
</nav>
    <!-- End Navbar -->    
<div class="container my-5 px-0">
    <div class="row justify-content-center my-5">
        <div class="col-xl-9 col-lg-16 col-md-15">
            <div class="card o-hidden border-0 shadow-lg mt-5 my-auto">
                <div class="card-body p-0 bg-pendaftaran">
                    <div class="row">
                        <div class="col">
                            <div class="p-5">
                                <h1 class="mb-4 text-center">Pendaftaran</h1>
                                <form method="POST" action="/daftar">
                                    <div class="mb-3 row">
                                        <label for="nama" class="col-sm-2 col-form-label-pendaftaran">Nama</label>
                                        <div class="col-sm-10">
                                            <input required type="text" class="form-control border-1" name="nama">
                                        </div>
                                    </div> 
                                    <div class="mb-3 row">
                                        <label for="email" class="col-sm-2 col-form-label-pendaftaran">Email</label>
                                        <div class="col-sm-10">
                                            <input required type="email" class="form-control border-1" name="email">
                                        </div>
                                    </div> 
                                    <div class="mb-3 row">
                                        <label for="wa" class="col-sm-2 col-form-label-pendaftaran">Whatsapp</label>
                                        <div class="col-sm-10">
                                            <input required type="text" class="form-control border-1" name="nowa">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="alamat" class="col-sm-2 col-form-label-pendaftaran">Alamat</label>
                                        <div class="col-sm-10">
                                            <input required type="text" class="form-control border-1" name="alamat">
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <input required type="hidden" class="form-control border-0"style="height: 55px;" value="<?= $id?>" name="id_webinar">
                                    </div>
                                    <div class="col-12 text-center">
                                        <button class="btn btn-primary w-20 py-3" type="submit">Daftar</button>
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
</body>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript">
    document.querySelector('form').addEventListener('submit', function(event) {
    Swal.fire({
      title: "Pendaftaran Berhasil",
      text: "Selamat, pendaftaran anda berhasil.Silahkan cek email atau whatsapp yang anda daftarkan untuk melihat data webinar.Terimakasih'",
      icon: "success",
      timer: 1500,
    })
  });
</script>

</html>