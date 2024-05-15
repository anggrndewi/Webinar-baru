 <!-- Start Jumbotron -->
 <section class="jumbotron">
 <div class="container">
    <div class="row g-3">
        <div class="text-center mb-4">
            <h1 class="display-6 text-bold" data-aos="fade-up"><?= $deskwebinar[0]['judul'] ?></h1>
        </div>
        <div class="col-lg-3" data-aos="zoom-in-down">
            <div class="card">

                <img src="<?= base_url().'assets/img/webinar/'.$deskwebinar[0]['poster']?>" alt="Deskripsi Gambar" class="img-fluid" >
            </div>
        </div>
        <div class="col-lg-5" data-aos="fade-right" data-aos-delay="1000">
            <h2 style="font-size: 20px;">Deskripsi</h2>
            <p><?= nl2br($deskwebinar[0]['deskwebinar'])?></p>
        </div>   
        <div class="col-lg-3" data-aos="fade-left" data-aos-delay="1000">
            <h2 style="font-size: 20px;">Waktu</h2>
            <p><i class="fa-solid fa-business-time"></i> <?= $deskwebinar[0]['waktu']?></p>
        </div>
    </div>
 </div>
    <svg  viewBox="0 0 1721 296" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path 
        fill-rule="evenodd" clip-rule="evenodd" 
        d="M0 296L74.4369 245.545C143.557 198.455 287.114 97.5455 430.671 60.5455C574.228 20.1818 717.785 43.7273 866.658 87.4545C1010.22 131.182 1153.77 198.455 1297.33 185C1440.89 174.909 1584.44 87.4545 1653.56 43.7273L1728 0V296H1653.56C1584.44 296 1440.89 296 1297.33 296C1153.77 296 1010.22 296 866.658 296C717.785 296 574.228 296 430.671 296C287.114 296 143.557 296 74.4369 296H0Z" 
        fill="white" fill-opacity="1"/>
    </svg>
 </section>
    <!-- end Jumbotron -->
<div class="container">
    <div class="row g-3 mb-3">
        <div class="col-lg-8">
            <h2 class="mb-2" style="font-size: 20px;" data-aos="fade-right" data-aos-easing="ease-in-sine">Pemateri</h2>
            <img src="<?= base_url().'assets/img/webinar/'.$deskwebinar[0]['foto_pemateri']?>" alt="Gambar Pemateri" style="max-width: 200px;" data-aos="flip-left">
            <p class="nama-pemateri" style="font-weight: bold;" data-aos="fade-right" data-aos-easing="ease-in-sine" data-aos-delay="1000"><?= $deskwebinar[0]['namapemateri']?></p>
            <p class="mb-4" data-aos="fade-right" data-aos-easing="ease-in-sine" data-aos-delay="1000"><?= $deskwebinar[0]['deskpemateri']?></p>
        </div>
        <div class="col-lg-3">
            <h2 class="mb-2" style="font-size: 20px;" data-aos="fade-left" data-aos-easing="ease-in-sine">Keuntungan Mengikuti Webinar</h2>
            <li data-aos="fade-left" data-aos-easing="ease-in-sine" data-aos-delay="1000">Mendapat Ilmu Bermanfaaar</li>
            <li data-aos="fade-left" data-aos-easing="ease-in-sine" data-aos-delay="1500">Kesempatan Sharing dan Diskusi</li>
            <li data-aos="fade-left" data-aos-easing="ease-in-sine" data-aos-delay="2000">Memperluas Jaringan</li>
            <li data-aos="fade-left" data-aos-easing="ease-in-sine" data-aos-delay="2500">Dan Masih Banyak Lagi</li>
        </div>
    </div>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-6 text-center">
            <div class="d-flex flex-column align-items-center">
                <?php foreach ($deskwebinar as $data) { 
                        if($deskwebinar[0]['waktu'] >= date('Y-m-d')){
                    ?>
                        <a class="btn btn-primary btn-lg my-2" href="<?= '/pendaftaran/' . $data['id'] ?>">Join Sekarang</a>
                    <?php }else{ ?>
                    <a class="btn btn-danger btn-lg my-2" href="#">Ditutup</a>
                <?php } } ?>
            </div>
        </div>
    </div>
</div>

