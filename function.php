<?php

$conn = mysqli_connect("localhost", "root", "", "siduku");


function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}

function form($data)
{
    global $conn;

    $jenis = htmlspecialchars($data['jenis']);
    $perihal = $data['perihal'];
    $tempat = htmlspecialchars($data['tempat']);
    $waktu = $data['waktu'];
    $uraian = $data['uraian'];
    $pelapor = $data["pelapor"];
    $terlapor = $data["terlapor"];
    $telp = $data["telp"];
    $tgl_masuk = time();
    $tiket = time() . $data["jenis"];
    $status = "baru";
    $ket = "";

    $query = "INSERT INTO tb_aduan 
              VALUES
              ('', '$jenis', '$perihal', '$tempat', '$waktu', '$uraian', '$pelapor', '$terlapor', '$telp', '$tgl_masuk', '$tiket', '$status', '$ket')
              ";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function verif($data)
{
    global $conn;

    $id = $data["id"];
    $status = $data["status"];
    $ket = $data["ket"];


    $query = "UPDATE tb_aduan SET
              `status` = '$status', `ket` = '$ket'
              WHERE `id` = '$id'
              ";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function tinjut($data)
{
    global $conn;

    $id = $data["id"];
    $status = $data["status"];
    $ket = $data["ket"];

    $query = "UPDATE tb_aduan SET 
             `status` = '$status', `ket` = '$ket'
             WHERE `id` = '$id'
             ";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}
