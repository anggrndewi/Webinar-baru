
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-lg-5 my-5 mx-auto">
                <div class="card bg-notif mt-5">
                    <svg class="justify-content-center mt-2" width="60" height="60" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg" style="display: block; margin: 0 auto;">
                        <path d="M60 30C60 46.5686 46.5686 60 30 60C13.4314 60 0 46.5686 0 30C0 13.4314 13.4314 0 30 0C46.5686 0 60 13.4314 60 30ZM26.5299 45.8848L48.788 23.6267C49.5438 22.8709 49.5438 21.6454 48.788 20.8896L46.0508 18.1524C45.295 17.3965 44.0695 17.3965 43.3136 18.1524L25.1613 36.3046L16.6864 27.8297C15.9306 27.0739 14.7051 27.0739 13.9492 27.8297L11.212 30.5669C10.4562 31.3227 10.4562 32.5482 11.212 33.304L23.7927 45.8846C24.5486 46.6406 25.774 46.6406 26.5299 45.8848Z" fill="#2DA656"/>
                    </svg>
                    <h3 class="text-center font-weight-bold">
                        <?= $tema ?>
                    </h3>
                    <div class="card-body">
                        <p class="text-center"><?= $deskripsi ?></p>
                        <div class="d-grid gap-2 pt-3 text-center pt-0">
                            <div class="row">
                                <div class="col-sm-6 pb-3"> 
                                    <a class="btn btn-primary w-20" href="/download/materi/<?= $id_webinar ?>">Download Materi</a>
                                </div>
                                <div class="col-sm-6"> 
                                <?php  { 
                                    if($waktu >= date('Y-m-d')){
                                ?>
                                    <button class="btn btn-primary w-20 " onclick="generatePDF()">Download Sertifikat</button>
                                <?php }else{ ?>
                                    <button class="btn btn-danger w-20 ">Download Sertifikat</button>
                                <?php } } ?>                   
                                </div>
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid text-dark footer pt-5 mt-5" style="background-color: #e2edff;">
        <div class="container py-2">
            <div class="row g-3">
                <div class="col-lg-5 col-md-6">
                    <h4 class="mb-4">Lampung Cerdas</h4>
                    <p> Lampung Cerdas adalah Perusahaan yang bergerak dibidang edukasi
                        dan training khusus pada pelajar, mahasiswa dan millenial.
                        perusahaan kami bergerak dalam hal training, E-course, dan
                        Pendampingan pada millenial.
                    </p>
                    
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="mb-4">Program</h4>
                    <li><a class="btn btn-link text-reset text-decoration-none" href="https://lampungcerdas.com/ktt/">Kuliah Tanpa Tes</a></li>
                    <li><a class="btn btn-link text-reset text-decoration-none" href="https://lampungcerdas.com/sekolahpublicspeaking/">Sekolah Public Speaking</a></li>
                    <li><a class="btn btn-link text-reset text-decoration-none" href="https://lampungcerdas.com/life-mentoring/">Life Mentoring</a></li>
                </div>
               
                <div class="col-lg-4 col-md-6">
                    <h4 class="mb-4">Alamat</h4>
                    <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>Jl. Soekarno Hatta, Gg. Sawah Baru, Kp. Baru, Kec. Kedaton, Kota Bandar Lampung, Lampung 35141</p>
                    <p class="mb-2"><i class="fa fa-envelope me-3"></i>it@lampungcerdas.com</p>
                    <div class="d-flex pt-2">
                        <a class="btn btn-outline-dark btn-social rounded-circle" href="https://twitter.com/cerdaslampung"><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-outline-dark btn-social rounded-circle" href="https://www.linkedin.com/company/pt-lampung-cerdas-mendunia"><i class="fab fa-linkedin"></i></a>
                        <a class="btn btn-outline-dark btn-social rounded-circle" href="https://www.youtube.com/@lampungcerdas"><i class="fab fa-youtube"></i></a>
                        <a class="btn btn-outline-dark btn-social rounded-circle" href="https://instagram.com/lampungcerdas"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="copyright">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        &copy;Copyright <strong><span>Lampungcerdas</span>. All Rights Reserved

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->
    </body>
    
    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.debug.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.3.2/html2canvas.min.js"></script>
    <script src="<?= base_url('js/main.js') ?>"></script>
    <script type="text/javascript">
    function generatePDF() {
        var nama = "<?php echo $nama ?>";
        var judul = "<?php echo $judul ?>";

        var waktu = "<?php echo date('d F Y') ?>";
    
        // Membuat instance jsPDF baru dengan orientasi lanskap
        var doc = new jsPDF('landscape');
    
        // Menambahkan logo
        var logo = new Image();
        logo.crossOrigin = "Anonymous";
        logo.src = "<?= base_url().'img/Sertifikat.jpg'?>"; // Ganti dengan path file logo di proyek Anda
    
        // Menunggu logo selesai dimuat sebelum menggambar di PDF
        logo.onload = function() {
        var canvasWidth = doc.internal.pageSize.getWidth();
        var canvasHeight = doc.internal.pageSize.getHeight();
    
        var logoWidth = canvasWidth; // Lebar gambar logo sama dengan lebar kertas
        var logoHeight = logo.height * logoWidth / logo.width; // Menghitung tinggi gambar logo sesuai aspek ratio
    
        var logoX = 0; // Posisi X gambar logo dimulai dari kiri
        var logoY = (canvasHeight - logoHeight) / 2; // Mengatur posisi Y agar gambar logo berada di tengah vertikal
    
        // Menggambar logo di PDF
        doc.addImage(logo, 'JPEG', logoX, logoY, logoWidth, logoHeight);
    
        // Mengatur font Poppins
        doc.setFont('Poppins');

        // Mengatur ukuran font dan mengatur teks ke tengah
        doc.setFontSize(16);
        doc.text('Sebagai Peserta dalam Webinar Spesial dengan Tema', canvasWidth / 2, 110, null, null, 'center');

        // Mengatur ukuran font dan mengatur teks ke tengah
        doc.setFontSize(14);
        doc.text('" ' + judul + ' "', canvasWidth / 2, 118, null, null, 'center');

        // Mengatur ukuran font dan mengatur teks ke tengah
        doc.setFontSize(16);
        doc.text('yang dilaksanakan oleh Lampung Cerdas ', canvasWidth / 2, 126, null, null, 'center');        

        // Mengatur ukuran font dan mengatur teks ke tengah
        doc.setFontSize(16);
        doc.text('Bandar Lampung, ' + waktu, canvasWidth / 2, 148, null, null, 'center');

        // Mengatur ukuran font dan mengatur teks ke tengah
        doc.setFontSize(30);
        doc.text(nama, canvasWidth / 2, 95, null, null, 'center');
    
        // Simpan PDF dengan nama unik
        doc.save('sertifikat.pdf');
        };
    }

  </script>

    <!-- Template Javascript -->
   
   