<!DOCTYPE html>
<html>

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">


  <title>Lampung Cerdas - Dashboard</title>

  <!-- Custom fonts for this template-->
  <link href="<?= base_url('vendor/fontawesome-free/css/all.min.css') ?>" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-2qrDOyxeg4okYgoNUoXg7Z0dL6ctfIy0O8Bwfd5vIj8UdjbyLQaAu9NPBsRXmCjghTpV9q5H7J9iWchSesQ5A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- Custom styles for this template-->
  <link href="<?= base_url('css/admin.min.css') ?>" rel="stylesheet">
  <link href="<?= base_url() . 'vendor/datatables/dataTables.bootstrap4.css' ?>" rel="stylesheet">
  <link href="img/lampung cerdas.webp" rel="icon">
  <style>
    @media screen and (max-width: 767px) {

      div.dataTables_wrapper div.dataTables_length,
      div.dataTables_wrapper div.dataTables_filter,
      div.dataTables_wrapper div.dataTables_info,
      div.dataTables_wrapper div.dataTables_paginate {
        text-align: left;
      }

      div.table-responsive>div.dataTables_wrapper>div.row>div[class^="col-"]:last-child {
        padding-left: 0;
      }
    }
  </style>
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center">
        <div class="mx-3 d-md-block"><img src="<?= base_url() . '/img/lampung cerdas.webp' ?>" width="80%"></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="/dashboard">
          <i class=" fas fa-fw  fa-house-chimney"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Nav Item - Data Webinar -->
      <li class="nav-item active">
        <a class="nav-link" href="/datawebinar">
          <i class="fas fa-fw fa-calendar-days"></i>
          <span>Webinar</span></a>
      </li>

      <!-- Nav Item - Data Peserta -->
      <li class="nav-item active">
        <a class="nav-link collapsed" href="/datapeserta" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-users fa-sm fa-fw mr-2 text-gray-400"></i>
          <span>Peserta</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <?php
            $db = db_connect();
            $query = $db->query('SELECT * FROM webinar order By id desc')->getResult();
            foreach ($query as $tampildata) {
            ?>
              <a class="collapse-item" href="<?= '/datapeserta/' . $tampildata->id ?>"><?= $tampildata->judul ?></a>
            <?php } ?>
          </div>
        </div>
      </li>

      <!-- Nav Item - Data Presensi -->
      <li class="nav-item active">
        <a class="nav-link collapsed" href="/datapresensi" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-user-check fa-sm fa-fw mr-2 text-gray-400"></i>
          <span>Presensi</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <?php
            $db = db_connect();
            $query = $db->query('SELECT * FROM webinar order By id desc')->getResult();
            foreach ($query as $tampildata) {
            ?>
              <a class="collapse-item" href="<?= '/datapresensi/' . $tampildata->id ?>"><?= $tampildata->judul ?></a>
            <?php } ?>
          </div>
        </div>
      </li>

      <!-- Nav Item - Data Notifikasi -->
      <li class="nav-item active">
        <a class="nav-link collapsed" href="/datanotifikasi" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-bell"></i>
          <span>Notifikasi</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <?php
            $db = db_connect();
            $query = $db->query('SELECT * FROM webinar order By id desc ')->getResult();
            foreach ($query as $tampildata) {
            ?>
              <a class="collapse-item" href="<?= '/datanotifikasi/' . $tampildata->id ?>"><?= $tampildata->judul ?></a>
            <?php } ?>
          </div>
        </div>
      </li>

      <!-- Nav Item - Tambah Data Notifikasi -->
      <li class="nav-item active">
        <a class="nav-link" href="/tambahdatanotifikasi">
          <i class="fas fa-fw fa-plus"></i>
          <span>Tambah Data Notifikasi</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="/logout" data-toggle="modal" data-target="#logoutModal">
          <i class="fas fa-fw fa-up-right-from-square"></i> <span>logout</span></a>
      </li>
      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

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
            <a class="btn btn-primary" href="/logout">Logout</a>
          </div>
        </div>
      </div>
    </div>