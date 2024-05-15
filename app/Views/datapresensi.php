<?php
$session = session();
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4 mt-4">
            <h1 class="h3 mb-2 text-header font-weight-bold">Data Presensi Webinar</h1>
            <!-- DataTales Example -->
            <?php if (count($datapresensi) > 0) { ?>
            <?php $row = $datapresensi[0]; ?>
                <a href="<?= '/exportpresensi/'.$row['id_webinar'] ?>" type="button" class="btn btn-primary">Export data</a>
            <?php } ?>          
    </div>
    
    <!-- DataTales Example -->
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>No. Whatsapp</th>
                <th>Alamat</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>No. Whatsapp</th>
                <th>Alamat</th>
                </tr>
            </tfoot>
            <tbody>
                <?php
                $nomor = 0;
                foreach($datapresensi as $row):
                    $nomor++;
                ?>
                <tr>
                    <th><?= $nomor; ?></th>
                    <td><?= $row['nama'] ?></td>
                    <td><?= $row['email'] ?></td>
                    <td><?= $row['nowa'] ?></td>
                    <td><?= $row['alamat'] ?></td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>

<!-- /.container-fluid -->