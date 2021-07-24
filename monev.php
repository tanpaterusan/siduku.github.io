<?php
require 'function.php';

$baru = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tb_aduan WHERE `status` ='baru'"));
$tinjut = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tb_aduan WHERE `status` ='ditindaklanjuti'"));
$stop = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tb_aduan WHERE `status` ='stop'"));
$selesai = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tb_aduan WHERE `status` ='selesai'"));

include 'templates/header.php';
include 'templates/sidebar.php';

?>


<div class="masthead align-items-center">
    <div class="container px-4 px-lg-5 text-center">

        <div class="card text-dark bg-light mb-3">
            <div class="card-header">Rekap Pengaduan Per <?= date('d F Y'); ?></div>
            <div class="card-body">
                <h5 class="card-title text-center">Halaman Monitoring</h5>
                <br>
                <table class="table table-hover table-bordered" style="text-align: center;">
                    <tr>
                        <th>Pengaduan Masuk</th>
                        <th>Pengaduan Ditindaklanjuti</th>
                        <th>Pengaduan Tidak DItindaklanjuti</th>
                        <th>Pengaduan Selesai</th>
                    </tr>
                    <tr>
                        <td><?= $baru; ?></td>
                        <td><?= $tinjut; ?></td>
                        <td><?= $stop; ?></td>
                        <td><?= $selesai; ?></td>
                    </tr>
                </table>

            </div>
        </div>

    </div>
</div>

<?php
include 'templates/footer.php';
?>