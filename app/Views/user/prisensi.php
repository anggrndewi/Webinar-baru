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
  <!-- Data AOS -->
  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

  <link href="<?= base_url('css/style.css') ?>" rel="stylesheet">
  <link href="img/lampung cerdas.webp" rel="icon">
</head>
<body class="bg-primary">
  <!-- Start Navbar -->
  <nav class="navbar shadow-sm navbar-expand-lg fixed-top">
    <div class="container-fluid">
      <a href="/"><img src="<?= base_url().'/img/lampung cerdas.webp' ?>" alt="logo" width="80"></a>
        <div class="navbar-nav ms-auto">
          <ul class="navbar-nav">
            <?php if(session()->get('loginuser')): ?>
              <li class="nav-item dropdown no-arrow">
                  <a class="nav-link dropdown-toggle" href="#" role="button"
                      data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <span class="d-lg-inline text-infologin small"><?= session()->get('nama') ?></span>
                      <img class="img-profile rounded-circle img-fluid" width="50" src="<?= base_url().'/img/undraw_profile.svg' ?>">
                  </a> 
                  <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in">
                      <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                          <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                          Logout
                      </a>
                  </div>
              </li>
            <?php else: ?>
              <li class="nav-item">
                <a class="w3-button w3-blue w3-border w3-border-white w3-round-large" href="/loginuser">Masuk</a>
              </li>
            <?php endif; ?>
          </ul>
        </div>
    </div>
</nav>
 <!-- Logout Modal-->
 <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="/logoutuser">Logout</a>
          </div>
        </div>
      </div>
    </div>
  <!-- End Navbar -->  
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card o-hidden border-0 shadow-lg mt-5">
                <div class="card-body p-0 bg-presensi" data-aos="zoom-in">
                    <div class="row">
                        <div class="col">
                            <div class="px-5">
                                <h1 class="mb-4 mt-4 form-title">Presensi</h1>
                                    <form method="POST" action="/input">
                                        <div class="mb-3 row">
                                            <label for="nama" class="col-sm-2 col-form-label-presensi">Nama</label>
                                            <div class="col-sm-10">
                                                <input required type="text" class="form-control border-1" name="nama">
                                            </div>
                                        </div> 
                                        <div class="mb-3 row">
                                            <label for="email" class="col-sm-2 col-form-label-presensi">Email</label>
                                            <div class="col-sm-10">
                                                <input required type="email" class="form-control border-1"  name="email">
                                            </div>
                                        </div> 
                                        <div class="mb-3 row">
                                            <label for="wa" class="col-sm-2 col-form-label-presensi">Whatsapp</label>
                                            <div class="col-sm-10">
                                                <input required type="text" class="form-control border-1" name="nowa">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="alamat" class="col-sm-2 col-form-label-presensi">Alamat</label>
                                            <div class="col-sm-10">
                                                <input required type="text" class="form-control border-1" name="alamat">
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <input required type="hidden" class="form-control border-0"style="height: 55px;" value="<?= $id?>" name="id_webinar">
                                        </div>
                                        <div class="col-12 text-end mb-4">
                                            <button class="btn btn-presensi w-20 " type="submit">Submit</button>
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
</div>
</body>
<!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>

    <!-- Javascript -->
    <script src="<?= base_url('js/main.js') ?>"></script>
    <script src="<?= base_url('js/sweetalert2.all.min.js') ?>"></script>
    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url().'vendor/jquery/jquery.min.js' ?>"></script>
    <script src="<?= base_url().'vendor/bootstrap/js/bootstrap.bundle.min.js'?>"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript">
        document.querySelector('form').addEventListener('submit', function(event) {
        Swal.fire({
        title: "Presensi Berhasil",
        text: "Selamat, pendaftaran anda berhasil.Silahkan cek email atau whatsapp yang anda daftarkan untuk melihat data webinar.Terimakasih'",
        icon: "success",
        timer: 1500,
        })
    });
    </script>

</html>