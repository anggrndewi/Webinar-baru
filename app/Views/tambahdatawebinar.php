<?php
$session = session();
?>
  <!-- Begin Page Content -->
  <div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-center text-header font-weight-bold">Tambah Data Webinar</h1>
    <!-- Content Row -->
    <div class="row">
      <div class="col-lg-12">
        <!-- Form -->
        <form method="POST" action="/tambahdatawebinar" enctype="multipart/form-data">
          <div class="row g-3">
          <div class="form-group col-12 col-sm-6">
            <label for="webinarTitle">Judul Webinar</label>
            <input type="text" class="form-control" id="webinarTitle" name="judul" placeholder="Enter webinar title" required>
          </div>
          <!-- Webinar Date -->
          <div class="form-group col-12 col-sm-6">
            <label for="webinarDate">Date</label>
            <input type="date" class="form-control" id="webinarDate"  name="waktu" required>
          </div>
           <!-- Deskripsi Webinar -->
          <div class="form-group col-12 col-sm-6">
            <label for="deskwebinar">Deskripsi webinar</label>
            <textarea class="form-control" id="deskwebinar"  name="deskwebinar" required></textarea>
          </div>
          <!-- Nama Pemateri -->
          <div class="form-group col-12 col-sm-6">
            <label for="namapemateri">Nama Pemateri</label>
            <input type="text" class="form-control" id="namapemateri"  name="namapemateri" required>
          </div>
          <!-- Foto Pemateri -->
          <div class="form-group col-12 col-sm-6">
            <label for="deskpemateri">Foto Pemateri</label>
            <input type="file" class="form-control" id="foto_pemateri"  name="foto_pemateri" required>
          </div>
          <!-- Deskripsi Pemateri -->
          <div class="form-group col-12 col-sm-6">
            <label for="deskpemateri">Deskripsi Pemateri</label>
            <input type="text" class="form-control" id="deskpemateri"  name="deskpemateri" required>
          </div>
           <!-- Poster -->
           <div class="form-group col-12 col-sm-6">
            <label for="deskpemateri">Poster Webinar</label>
            <input type="file" class="form-control" id="poster"  name="poster" required>
          </div>
          </div>
          <!-- Submit Button -->
         <div class="col-12 text-center">
         <button type="submit" class="btn btn-primary">Submit</button>
         </div>
        </form>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script type="text/javascript">
      $(document).ready(function () {
        $('form').on('submit', function (e) {
          Swal.fire({
          position: "center",
          icon: "success",
          title: "Data Berhasil Ditambah",
          showConfirmButton: false,
        });
        })
      });
  </script>
  <!-- /.container-fluid -->
  