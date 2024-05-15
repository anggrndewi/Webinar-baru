<?php
$session = session();
?>
 <!-- Begin Page Content -->
  <div class="container-fluid">
    <!-- Page Heading -->
    <h1 class=" text-center text-header font-weight-bold h3 mt-4 mb-4">Tambah data notifikasi</h1>
    <!-- Form -->
    <div class="row">
      <div class="col-lg-12">
        <form method="POST" action="/tambahdatanotifikasi" enctype="multipart/form-data">
          <!-- Pilih Webinar  -->
          <div class="form-group">
            <div class="mb-3 row">
              <label for="browser" class="col-sm-2 col-form-label">Pilih Webinar</label>
                <div class="col-sm-10">
                  <select class="form-control" aria-label="Default select example" name="id_webinar">
                    <option selected>Pilih Webinar</option>
                    <?php 
                        $db = db_connect();
                        $query =$db->query('SELECT * FROM webinar')->getResult();
                        foreach ($query as $tampildata){
                      ?>
                    <option value="<?= $tampildata->id ?>"><?= $tampildata->judul ?></option>
                    <?php }?>
                  </select>
                </div>
            </div>
          
          
          <!-- Link Webinar  -->
          <div class="mb-3 row">
            <label for="link webinar" class="col-sm-2 col-form-label">Link Webinar</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="linkwebinar" name="linkwebinar" required>
            </div>
          </div>
           <!-- Link Presensi -->
          <div class="mb-3 row">
            <label for="deskwebinar" class="col-sm-2 col-form-label">Link Presensi</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="linkpresensi" name="linkpresensi" required>
            </div>
          </div>
          <!-- Pesan  Email-->
          <div class="mb-3 row">
            <label for="pesan" class="col-sm-2 col-form-label">Pesan Email</label>
            <div class="col-sm-10">
              <textarea class="form-control" id="pesan" name="pesan" required> </textarea>
            </div>
          </div>
          <!-- Pesan Whatsapp -->
          <div class="mb-3 row">
            <label for="pesan" class="col-sm-2 col-form-label">Pesan Whatsapp</label>
            <div class="col-sm-10">
              <textarea class="form-control" id="pesanwa" name="pesanwa" required> </textarea>
            </div>
          </div>
          <!-- Materi -->
          <div class="mb-3 row">
            <label for="materi" class="col-sm-2 col-form-label">Materi Webinar</label>
            <div class="col-sm-10">
              <input type="file" class="form-control" id="materi" name="materi">
            </div>
          </div>
         
          <!-- Submit Button -->
          <div class="col-sm-12 text-center"><button type="submit" class="btn btn-primary">Add Notifikasi</button></div>
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
          title: "Data Berhasil Ditambah",
          showConfirmButton: false,
        });
        })
      });
  </script>