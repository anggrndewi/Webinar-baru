<?php
$session = session();
?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-center mb-4">
        <h1 class="h3 mb-0 text-header font-weight-bold">Dashboard</h1>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-xl-3 col-md-6 col-sm-4 mb-4">
            <div class="card bg-primary text-light shadow h-100 py-2">
                <a href="/admin/pendaftaran">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs text-center font-weight-bold text-light text-uppercase mb-1">
                                    <h6>Total Pendaftar</h6>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mt-2">
                                <div class="h3 mb-0 font-weight-bold text-light"><?= $pendaftaran->jml ?></div>
                            </div>
                            <div class="col-auto mt-2"><i class="fas fa-solid fa-user fa-2x  text-gray-300"></i></div>
                        </div>
                    </div>
                </a>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 col-sm-4 mb-4">
            <div class="card bg-primary text-light shadow h-100 py-2">
                <a href="/admin/pendaftaran">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs text-center font-weight-bold text-light text-uppercase mb-1">
                                    <h6>Jumlah Webinar</h6>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mt-2">
                                <div class="h3 mb-0 font-weight-bold text-light"><?= $webinar->jml ?></div>
                            </div>
                            <div class="col-auto mt-2"><i class="fas fa-clipboard-list fa-2x text-gray-300"></i></div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <canvas id="grafikPendaftar" width="400" height="200"></canvas>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var ctx = document.getElementById('grafikPendaftar').getContext('2d');

        // Ambil data dari PHP menggunakan PHP associative array

        var months = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'];
        var labels = [];
        months.map(function(month) {
            labels.push(month + ' ' + new Date().getFullYear());
        });
        
        var data = <?= json_encode($grafikPendaftar) ?>;

        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Jumlah Pendaftar per di bulan',
                    data: data,
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    });
</script>

<!-- Content Row -->