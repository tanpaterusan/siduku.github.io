<?php
require 'function.php';

if (isset($_POST['login'])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM tb_admin WHERE username = '$username'");
    //cek username
    if (mysqli_num_rows($result) === 1) {
        //cek password
        $row = mysqli_fetch_assoc($result);
        if ($password == $row['password']) {
            header("Location: core.php");
            exit;
        }
    }
    $error = true;
}


include 'templates/header.php';

?>


<!-- Header-->
<header class="masthead d-flex align-items-center">
    <div class="container px-4 px-lg-5 text-center">

        <?php if (isset($error)) : ?>
            <p style="color:red;">username / password salah!</p>
        <?php endif; ?>

        <!-- Button trigger modal -->
        <div class="content-end">
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#loginModal">
                login sebagai admin
            </button>
        </div>
        <br>
        <h1 class="mb-1">SIDUKU</h1>
        <h3 class="mb-5"><em>Aplikasi Pengaduan Maluku</em></h3>
        <a class="btn btn-primary btn-xl" href="form.php">buat pengaduan!</a>
    </div>
</header>

<!-- Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="loginModalLabel">Isikan Username dan Password</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" method="post">
                    <div class="row mb-3">
                        <label for="username" class="col-sm-2 col-form-label">Username</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="username" name="username">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="password" class="col-sm-2 col-form-label">password</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="password" name="password">
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" name="login" class="btn btn-secondary">login</button>
            </div>
            </form>
        </div>
    </div>
</div>

<?php

include 'templates/footer.php';

?>