<?php

session_start();
require_once '../../database/setup.php';

$id_user = mysqli_real_escape_string($koneksi, $_GET['id']);
$role    = mysqli_real_escape_string($koneksi, $_GET['role']);

$query   = "UPDATE users SET role='$role' WHERE id='$id_user'";
$sql     = mysqli_query($koneksi, $query) or die(mysqli_error());

if ($sql) {
    header("location: ../../public/index.php?page=profile&sub_page=users&info=Berhasil Mengubah user");
} else {
    header("location: ../../public/index.php?page=profile&sub_page=users&info=Gagal Mengubah user");
}