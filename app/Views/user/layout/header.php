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
  <!-- Bootstrap core JavaScript-->
  <script src="<?= base_url().'vendor/jquery/jquery.min.js' ?>"></script>
  <script src="<?= base_url().'vendor/bootstrap/js/bootstrap.bundle.min.js'?>"></script>
  <!-- End Navbar -->