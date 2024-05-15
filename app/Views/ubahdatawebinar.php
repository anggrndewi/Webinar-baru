<?php
$session = session();
?>
  <!-- Begin Page Content -->
  <div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-center  text-header font-weight-bold">Edit Data Webinar</h1>
    <!-- Content Row -->
    <div class="row">
      <div class="col-lg-12">
        <!-- Form -->
        <form method="POST" action="/ubahdatawebinar" enctype="multipart/form-data">
          <div class="row g-3">
           <!-- Webinar Title -->
           <div class="form-group col-12 col-sm-6">
            <label for="webinarTitle">Judul</label>
            <input type="text" class="form-control" id="webinarTitle" value="<?=$data[0]['judul']?>" name="judul" placeholder="Enter webinar title" required>
          </div>
          <!-- Webinar Date -->
          <div class="form-group col-12 col-sm-6">
            <label for="webinarDate">Date</label>
            <input type="date" class="form-control" id="webinarDate" value="<?=$data[0]['waktu']?>" name="waktu" required>
          </div>
           <!-- Deskripsi Webinar -->
          <div class="form-group col-12 col-sm-6">
            <label for="deskwebinar">Deskripsi webinar</label>
            <textarea class="form-control" id="deskwebinar" name="deskwebinar" required><?=$data[0]['deskwebinar']?></textarea>
          </div>
          <!-- Nama Pemateri -->
          <div class="form-group col-12 col-sm-6">
            <label for="namapemateri">Nama Pemateri</label>
            <input type="text" class="form-control" id="namapemateri" value="<?=$data[0]['namapemateri']?>" name="namapemateri" required>
          </div>
          <!-- Deskripsi Pemateri -->
          <div class="form-group col-12 col-sm-6">
            <label for="deskpemateri">Deskripsi Pemateri</label>
            <input type="text" class="form-control" id="deskpemateri" value="<?=$data[0]['deskpemateri']?>" name="deskpemateri" required>
          </div>
          </div>
          <!-- Webinar id -->
          <div class="form-group col-12 col-sm-6">
            <input type="hidden" class="form-control" name="id" id="webinarTitle" value="<?=$data[0]['id']?>" required>
          </div>
          <!-- Submit Button -->
          <div class="col-12 text-center">
          <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- /.container-fluid -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script type="text/javascript">
      $(document).ready(function () {
        $('form').on('submit', function (e) {
          Swal.fire({
          position: "center",
          icon: "success",
          title: "Data Berhasil diubah",
          showConfirmButton: false,
          timer: 3000
        });
        })
      });
  </script>
    