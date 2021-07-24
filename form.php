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
    <!-- Header-->
    <header class="masthead d-flex align-items-center">
        <a href="index.php">
            <img src="assets/img/back.jpg" class="rounded float-start" style="width:10rem">
        </a>

        <div class="container col-lg-4">
            <div class="card text-dark bg-light mb-3">
                <div class="card-header">Detail pengaduan</div>
                <div class="card-body">
                    <h5 class="card-title">Detail Pengaduan</h5>
                    <br>
                    <form action="" method="post">
                        <div class="mb-3">
                            <label for="perihal" class="form-label">Jenis Aduan</label>
                            <select class="form-select" name="jenis" id="jenis" aria-label="Default select example">
                                <option selected>--pilih jenis aduan--</option>
                                <option value="Fraud">Fraud</option>
                                <option value="Pelayanan">Pelayanan</option>
                                <option value="Kode Etik">Kode Etik</option>
                                <option value="Lainnya">Lainnya</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="perihal" class="form-label">Perihal Aduan</label>
                            <input type="text" class="form-control" name="perihal" id="perihal">
                        </div>
                        <div class="mb-3">
                            <label for="tempat" class="form-label">Tempat</label>
                            <input type="text" class="form-control" name="tempat" id="tempat">
                        </div>
                        <div class="mb-3">
                            <label for="waktu" class="form-label">Waktu</label>
                            <input type="text" class="form-control" name="waktu" id="waktu">
                        </div>
                        <div class="mb-3">
                            <label for="uraian" class="form-label">Uraian Pengaduan</label>
                            <textarea class="form-control" name="uraian" id="uraian"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="terlapor" class="form-label">Nama Terlapor</label>
                            <input type="text" class="form-control" name="terlapor" id="terlapor">
                        </div>
                        <div class="mb-3">
                            <label for="pelapor" class="form-label">Nama Pelapor</label>
                            <input type="text" class="form-control" name="pelapor" id="pelapor">
                        </div>
                        <div class="mb-3">
                            <label for="telp" class="form-label">Nomor Telepon yang Dapat Dihubungi</label>
                            <input type="text" class="form-control" name="telp" id="telp">
                        </div>
                        <br>
                        <div class="col-sm-3">
                            <button class="btn btn-primary" type="submit" name="submit">submit</button>
                        </div>
                    </form>
                </div>

            </div>
    </header>

    <?php

    if (isset($_POST["submit"])) {
        if (form($_POST) > 0) {
            $tiket = time() . $_POST["jenis"];
            echo "
            <script>
                alert('data berhasil ditambahkan! Nomor tiket Anda adalah $tiket');
                window.location.href='form.php';
            </script>
            ";
        } else {
            echo "
            <script>
                alert('data gagal ditambahkan!');
            </script>
            ";
        }
    }


    include 'templates/footer.php';

    ?>