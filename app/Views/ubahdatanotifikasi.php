<?php
$session = session();
?>
<!-- Begin Page Content -->
<div class="container">
  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-center  text-header font-weight-bold">Edit Data Notifikasi</h1>    
  <div class="row">
    <div class="col-lg-12">   
      <form method="POST" action="/ubahdatanotifikasi" enctype="multipart/form-data">
        <!-- Content Row -->
        <div class="form-group">
          <div class="mb-3 row">
            <label for="browser" class="col-sm-2 col-form-label">Pilih Webinar</label>
            <div class="col-sm-10">
              <select class="form-control" aria-label="Default select example" name="id_webinar">
                  <option selected>Pilih Webinar</option>
                  <?php 
                      $db = db_connect();
                      $query =$db->query('SELECT * FROM webinar')->getResult();
                      foreach ($query as $ubahdata){
                  ?>
                  <option value="<?=$data[0]['id']?>"><?= $ubahdata->judul ?></option>
                  <?php }?>
              </select>
            </div>
          </div>
           <!-- Link Webinar -->
          <div class="mb-3 row">
            <label for="linkwebinar" class="col-sm-2 col-form-label">Link Webinar</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="linkwebinar" value="<?=$data[0]['linkwebinar']?>" name="linkwebinar" placeholder="Enter link webinar" required>
            </div>
          </div>
          
         <!-- Link Presensi -->
          <div class="mb-3 row">
            <label for="linkpresensi" class="col-sm-2 col-form-label">Link Presensi</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="linkpresensi" value="<?=$data[0]['linkpresensi']?>" name="linkpresensi" required>
            </div>
          </div>
      
          <!-- Pesan Email -->
          <div class="mb-3 row">
            <label for="pesan" class="col-sm-2 col-form-label">Pesan Email</label>
            <div class="col-sm-10">
              <textarea class="form-control" id="pesan" value="<?=$data[0]['pesan']?>" name="pesan" required></textarea>
            </div>
          </div>
          <!-- Pesan Whatsapp -->
          <div class="mb-3 row">
            <label for="pesan" class="col-sm-2 col-form-label">Pesan Whatsapp</label>
            <div class="col-sm-10">
              <textarea class="form-control" id="pesan" value="<?=$data[0]['pesanwa']?>" name="pesan" required></textarea>
            </div>
          </div>
          <div class="mb-3 row">
            <!-- Webinar id -->
            <div class="form-group">
              <input type="hidden" class="form-control" name="id" id="webinarTitle" value="<?=$data[0]['id']?>" required>
            </div>
          </div>
          <!-- Submit Button -->
          <div class="col-sm-12 text-center">
            <button type="submit" class="btn btn-primary">Simpan Notifikasi</button>
          </div>
      </div>
    </div>
      </form>
</div>
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
        });
        })
      });
  </script>
 
