<?php
$session = session();
?>
        <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- Page Heading -->
          <h1 class="h3 mt-4 mb-4 text-header font-weight-bold">Data Notifikasi</h1>
          <!-- Content Row -->
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Link Webinar</th>
                    <th scope="col">Link Presensi</th>
                    <th scope="col">Pesan</th>
                    <th scope="col">Pesan whatsapp</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                  $nomor = 0;
                  foreach($datanotifikasi as $row):
                      $nomor++;
                ?>
                <tr>
                  <th><?= $nomor; ?></th>
                  <td><?=$row['linkwebinar'] ?></td>
                  <td><?=$row['linkpresensi'] ?></td>
                  <td><?=$row['pesan'] ?></td>
                  <td><?=$row['pesanwa'] ?></td>
                  <td>
                    <div class="d-flex">
                        <!-- Btn Ubah Data -->
                        <a href="<?='/ubahdatanotifikasi/'.$row['id']?>" class="btn">
                            <svg width="29" height="28" viewBox="0 0 29 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_175_115)">
                                    <path d="M26.5833 5.3L23.6027 2.525C23.3465 2.29758 23.0061 2.17072 22.6522 2.17072C22.2982 2.17072 21.9578 2.29758 21.7016 2.525L19.0513 5H4.83328C4.40599 5 3.99619 5.15804 3.69405 5.43934C3.39191 5.72065 3.22217 6.10218 3.22217 6.5V23C3.22217 23.3978 3.39191 23.7794 3.69405 24.0607C3.99619 24.342 4.40599 24.5 4.83328 24.5H22.5555C22.9828 24.5 23.3926 24.342 23.6947 24.0607C23.9969 23.7794 24.1666 23.3978 24.1666 23V9.32L26.5833 7.07C26.8351 6.83517 26.9766 6.51687 26.9766 6.185C26.9766 5.85314 26.8351 5.53484 26.5833 5.3ZM15.1686 15.5975L11.7933 16.295L12.5988 13.1825L20.2919 6.005L22.8938 8.4275L15.1686 15.5975ZM23.7638 7.5725L21.1619 5.15L22.6522 3.7625L25.2541 6.185L23.7638 7.5725Z" fill="#1F8DCB"/>
                                </g>
                                <defs>
                                    <clipPath id="clip0_175_115">
                                        <rect width="29" height="27" fill="white" transform="translate(0 0.5)"/>
                                    </clipPath>
                                </defs>
                            </svg>
                        </a>
                        <!-- Btn Hapus Data -->
                        <a href="<?='/hapusdatanotifikasi/'.$row['id'] ?>" id="btn-hapus" class="btn btn-del" data-toggle="modal" data-target="#deleteModal">
                            <svg width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M6.49984 20.5833C6.49984 21.775 7.47484 22.75 8.6665 22.75H17.3332C18.5248 22.75 19.4998 21.775 19.4998 20.5833V7.58333H6.49984V20.5833ZM9.16484 12.87L10.6923 11.3425L12.9998 13.6392L15.2965 11.3425L16.824 12.87L14.5273 15.1667L16.824 17.4633L15.2965 18.9908L12.9998 16.6942L10.7032 18.9908L9.17567 17.4633L11.4723 15.1667L9.16484 12.87ZM16.7915 4.33333L15.7082 3.25H10.2915L9.20817 4.33333H5.4165V6.5H20.5832V4.33333H16.7915Z" fill="#F70707"/>
                            </svg>
                        </a>
                      </div>
                  </td>
                </tr>
                  <?php endforeach ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <!-- /.container-fluid -->
      </div>
      <!-- End of Main Content -->
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script type="text/javascript">
          $(document).ready(function () {
            $('.btn-del').on('click', function (e) {
              e.preventDefault();
              const href = $(this).attr('href');
            Swal.fire({
              title: "Apakah Yakin ingin Dihapus?",
              icon: "warning",
              showCancelButton: true,
              confirmButtonColor: "#3085d6",
              cancelButtonColor: "#d33",
              confirmButtonText: "Iya"
            }).then((result) => {
              if (result.isConfirmed) {
                document.location.href = href;
              }
            });
            })
          });
      </script>