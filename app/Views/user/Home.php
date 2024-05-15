<!-- Start Jumbotron -->
<section class="jumbotron text-center">
    <h1 class="text-center " data-aos="fade-up">Webinar Lampung Cerdas</h1>
    <svg viewBox="0 0 1728 240" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" clip-rule="evenodd" 
              d="M0 240L74.4369 199.091C143.557 160.909 287.114 79.0909 430.671 49.0909C574.228 16.3636 717.785 35.4545 866.658 70.9091C1010.22 106.364 1153.77 160.909 1297.33 150C1440.89 141.818 1584.44 70.9091 1653.56 35.4545L1728 0V240H1653.56C1584.44 240 1440.89 240 1297.33 240C1153.77 240 1010.22 240 866.658 240C717.785 240 574.228 240 430.671 240C287.114 240 143.557 240 74.4369 240H0Z" 
              fill="white"/>
    </svg>
</section>
<!-- end Jumbotron -->

<div class="container">
    <div class="row g-4">
        <?php
            $counter = 0;
            foreach($deskwebinar as $deskwebinar):
            $counter++;
        ?>
            <div class="col-lg-4 col-md-6 <?php if($counter > 9) echo 'd-none webinar-hidden'; ?>" data-aos="zoom-in" data-aos-delay="100">
                <div class="card shadow">
                    <div class="overflow-hidden card-home">
                        <img class="card-img-top w-100 d-block" src="<?= base_url().'assets/img/webinar/'.$deskwebinar->poster?>">
                    </div>
                    <div class="card-body">
                        <h4 class="card-text"><?= $deskwebinar->judul ?></h4>
                        <p class="card-text text-desk"><?= nl2br($deskwebinar ->deskwebinar)?></p>
                    </div>
                    <div class="d-grid gap-2 pb-3 text-center">
                        <div class="row">
                            <div class="col">
                                <button class="btn btn-primary" id="countdown_<?= $deskwebinar->id ?>">
                                    <?php
                                        // Ambil waktu mulai webinar dari data saat ini
                                        $waktuMulai = $deskwebinar->waktu;

                                        // Hitung selisih waktu antara waktu mulai dan waktu sekarang
                                        $selisihWaktu = strtotime($waktuMulai) - time();

                                        // Konversi selisih waktu ke jam, menit, dan detik
                                        $jam = floor($selisihWaktu / (60 * 60));
                                        $sisa = $selisihWaktu % (60 * 60);
                                        $menit = floor($sisa / 60);
                                        $detik = $sisa % 60;

                                        // Tampilkan countdown awal
                                        echo "<i class='fa-regular fa-clock'></i> <span id='countdown_jam_$deskwebinar->id'>$jam</span>:<span id='countdown_menit_$deskwebinar->id'>$menit</span>:<span id='countdown_detik_$deskwebinar->id'>$detik</span>";
                                    ?>
                                </button>
                                <script>
                                    // Update waktu setiap detiknya
                                    var countdownInterval_<?= $deskwebinar->id ?> = setInterval(function() {
                                        var jam = document.getElementById('countdown_jam_<?= $deskwebinar->id ?>');
                                        var menit = document.getElementById('countdown_menit_<?= $deskwebinar->id ?>');
                                        var detik = document.getElementById('countdown_detik_<?= $deskwebinar->id ?>');

                                        var nilaiJam = parseInt(jam.innerText);
                                        var nilaiMenit = parseInt(menit.innerText);
                                        var nilaiDetik = parseInt(detik.innerText);

                                        if (nilaiJam < 0 && nilaiMenit < 0 && nilaiDetik < 0) {
                                            // Jika waktu habis, ubah warna tombol menjadi merah dan ubah teks menjadi "Webinar Selesai"
                                            document.getElementById('countdown_<?= $deskwebinar->id ?>').classList.remove('btn-primary');
                                            document.getElementById('countdown_<?= $deskwebinar->id ?>').classList.add('btn-danger');
                                            document.getElementById('countdown_<?= $deskwebinar->id ?>').innerHTML = "Webinar Selesai";
                                            clearInterval(countdownInterval_<?= $deskwebinar->id ?>);
                                        } else {
                                            // Kurangi detik
                                            if (nilaiDetik == 0) {
                                                nilaiDetik = 59;
                                                // Kurangi menit jika detik sudah mencapai 0
                                                nilaiMenit--;
                                                // Kurangi jam jika menit sudah mencapai 0
                                                if (nilaiMenit < 0) {
                                                    nilaiMenit = 59;
                                                    nilaiJam--;
                                                }
                                            } else {
                                                nilaiDetik--;
                                            }

                                            // Update tampilan jam, menit, dan detik
                                            jam.innerText = nilaiJam;
                                            menit.innerText = nilaiMenit;
                                            detik.innerText = nilaiDetik;
                                        }
                                    }, 1000); // Setiap 1 detik
                                </script>
                            </div>
                            <div class="col">
                                <a href="<?= '/detail/'.$deskwebinar->id ?>" class="btn btn-primary">Selengkapnya <i class="fas fa-arrow-right-long"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
        <!-- Tombol Selengkapnya -->
        <?php if($counter > 9): ?>
            <div class="col-lg-12 text-center">
                <button id="showAllWebinars" class="btn btn-primary">Tampilkan Semua Webinar</button>
            </div>
        <?php endif; ?>
        </div>
</div>

<a href="https://linktr.ee/Lampungcerdas" target="_blank" class="wa-icon">
  <i class="fab fa-whatsapp"></i>
</a>

<script>
    document.getElementById('showAllWebinars').addEventListener('click', function() {
        // Tampilkan semua item webinar
        var hiddenWebinars = document.querySelectorAll('.webinar-hidden');
        hiddenWebinars.forEach(function(webinar) {
            webinar.classList.remove('d-none');
        });
        // Sembunyikan tombol "Selengkapnya"
        this.style.display = 'none';
    });
</script>