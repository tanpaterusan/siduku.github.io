<?php

require 'function.php';
$aduan = query("SELECT * FROM tb_aduan");

if (isset($_POST["submit"])) {
    if (verif($_POST) > 0) {
        echo  "
        <script>
        alert('verifikasi berhasil');
        window.location.href='core.php';
        </script>
        ";
    } else {
        echo "
        <script>
        alert('Verifikasi gagal');
        </script>    
        ";
    }
}

include 'templates/header.php';
include 'templates/sidebar.php';
?>

<div class="masthead align-items-center">
    <div class="container col-lg-6">

        <div class="card text-dark bg-light mb-3">
            <div class="card-header">Pengaduan Masuk Per <?= date('d F Y'); ?></div>
            <div class="card-body">
                <h5 class="card-title text-center">Halaman Verifikasi</h5>
                <br>
                <table class="table table-hover table-bordered" style="text-align: center;">
                    <tr>
                        <th>No Tiket</th>
                        <th>Tanggal Masuk Pengaduan</th>
                        <th>Action</th>
                        <th>Status</th>
                    </tr>
                    <?php foreach ($aduan as $a) : ?>
                        <tr>
                            <td><?= $a["tiket"]; ?></td>
                            <td><?= date('d F Y', $a["tgl_masuk"]); ?></td>
                            <td>
                                <a class="btn btn-success detail" data-bs-toggle="modal" data-bs-target="#detailModal" data-id="<?= $a['id']; ?>" data-jenis="<?= $a['jenis']; ?>" data-perihal="<?= $a['perihal']; ?>" data-tempat="<?= $a['tempat']; ?>" data-waktu="<?= $a['waktu']; ?>" data-uraian="<?= $a['uraian']; ?>" data-pelapor="<?= $a['pelapor']; ?>" data-terlapor="<?= $a['terlapor']; ?>" data-telp="<?= $a['telp']; ?>"> detail </a>
                                <a class="btn btn-warning verif" data-bs-toggle="modal" data-bs-target="#verifModal" data-id="<?= $a['id']; ?>" data-status="<?= $a['status']; ?>"> verifikasi </a>
                            </td>
                            <td>
                                <?php if ($a["status"] == "baru") : ?>
                                    <button class="btn btn-info ket" data-bs-toggle="modal" data-bs-target="#ketModal" data-ket="<?= $a['ket']; ?>">Baru</button>
                                <?php elseif ($a["status"] == "ditindaklanjuti") :  ?>
                                    <button class="btn btn-light ket" data-bs-toggle="modal" data-bs-target="#ketModal" data-ket="<?= $a['ket']; ?>">Ditindaklanjuti</button>
                                <?php elseif ($a["status"] == "stop") : ?>
                                    <button class="btn btn-danger ket" data-bs-toggle="modal" data-bs-target="#ketModal" data-ket="<?= $a['ket']; ?>">Tidak Ditindaklanjuti</button>
                                <?php else : ?>
                                    <button class="btn btn-success ket" data-bs-toggle="modal" data-bs-target="#ketModal" data-ket="<?= $a['ket']; ?>">Selesai</button>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>

            </div>
        </div>

    </div>
</div>



<!-- Modal Detail -->
<div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detailModalLabel">Detail Aduan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body table-responsive" id="detail-modal">

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Jenis Pengaduan</th>
                            <td><span id="jenis"></span></td>
                        </tr>
                        <tr>
                            <th>Perihal Pengaduan</th>
                            <td><span id="perihal"></span></td>
                        </tr>
                        <tr>
                            <th>Tempat</th>
                            <td><span id="tempat"></span></td>
                        </tr>
                        <tr>
                            <th>Waktu</th>
                            <td><span id="waktu"></span></td>
                        </tr>
                        <tr>
                            <th>Uraian</th>
                            <td><span id="uraian"></span></td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th>Nama Pelapor</th>
                            <td><span id="pelapor"></span></td>
                        </tr>
                        <tr>
                            <th>Nama Terlapor</th>
                            <td><span id="terlapor"></span></td>
                        </tr>
                        <tr>
                            <th>No Telepon Aktif</th>
                            <td><span id="telp"></span></td>
                        </tr>
                    </tbody>
                </table>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<!-- Modal Verif -->
<div class="modal fade" id="verifModal" tabindex="-1" aria-labelledby="verifModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="verifModalLabel">Verifikasi Aduan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="verif-modal">
                <form action="" method="post">
                    <input type="hidden" name="id" id="id">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" id="ditindaklanjuti" value="ditindaklanjuti">
                        <label class="form-check-label" for="ditindaklanjuti">
                            Tindak Lanjuti
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" id="stop" value="stop">
                        <label class="form-check-label" for="stop">
                            Kembalikan Pengaduan
                        </label>
                    </div>
                    <div class="form-floating">
                        <textarea class="form-control" id="ket" name="ket" style="height: 100px"></textarea>
                        <label for="ket">Tulis keterangan/alasan..</label>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" name="submit" id="submit" class="btn btn-secondary">Verif</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Keterangan -->
<div class="modal fade" id="ketModal" tabindex="-1" aria-labelledby="ketModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ketModalLabel">Keterangan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="ket-modal">
                <p id="keterangan"></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" aria-has-popup="close">Close</button>
            </div>
        </div>
    </div>
</div>

<?php
include 'templates/footer.php';
?>