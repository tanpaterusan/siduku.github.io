<?php

require 'function.php';

include 'templates/header.php';

?>

<body id="page-top">
    <!-- Navigation-->
    <a class="menu-toggle rounded" href="#"><i class="fas fa-bars"></i></a>
    <nav id="sidebar-wrapper">
        <ul class="sidebar-nav">
            <li class="sidebar-brand"><a href="#">Menu</a></li>
            <li class="sidebar-nav-item"><a href="cek.php">Cek Status Aduan Saya</a></li>
            <li class="sidebar-nav-item"><a href="form.php">Buat Aduan</a></li>
        </ul>
    </nav>

    <div class="masthead d-flex align-items-center">
        <div class="container px-4 px-lg-5 text-center">

            <?php
            if (isset($_GET["submit"])) {
                $tiket = $_GET["tiket"];
                $row = mysqli_query($conn, "SELECT * FROM tb_aduan WHERE tiket = '$tiket'");
                if (mysqli_num_rows($row) === 1) {
                    $aduan = mysqli_fetch_assoc($row); ?>
                    <div class="alert alert-warning text-center" role="alert">
                        <h4 class="alert-heading">Status Pengaduan Anda Saat ini</h4>
                        <?php if ($aduan["status"] == "baru") : ?>
                            <button class="btn btn-info">Diterima</button>
                        <?php elseif ($aduan["status"] == "ditindaklanjuti") :  ?>
                            <button class="btn btn-light">Ditindaklanjuti</button>
                        <?php elseif ($aduan["status"] == "stop") : ?>
                            <button class="btn btn-danger">Tidak Ditindaklanjuti</button>
                        <?php else : ?>
                            <button class="btn btn-success">Selesai</button>
                        <?php endif; ?>
                        <p>Keterangan: <br> <?= $aduan["ket"]; ?></p>
                        <hr>
                        <p class="mb-0">Untuk informasi lebih lanjut silakan menghubungi Kantor Wilayah Direktorat Jenderal Perbendaharaan Provinsi Maluku melalui nomor 085336643226</p>
                    </div>
                <?php } else { ?>
                    <div class="alert alert-danger" role="alert">
                        Tiket yang Anda masukkan salah!
                    </div>
            <?php }
            } ?>

            <div class="card text-center">
                <div class="card-header">
                    Cek Status Pengaduan
                </div>
                <div class="card-body">
                    <h5 class="card-title">isikan nomor tiket Anda</h5>

                    <form action="" method="get">
                        <input type="text" name="tiket" id="tiket" class="form-control">
                        <br>
                        <button class="btn btn-primary" type="submit" name="submit">cek status</button>
                    </form>

                </div>
                <div class="card-footer text-muted">
                    <?= date('d F Y'); ?>
                </div>
            </div>

        </div>
    </div>


    <?php

    include 'templates/footer.php';

    ?>