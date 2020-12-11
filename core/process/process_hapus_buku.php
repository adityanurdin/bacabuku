<?php

session_start();
require_once '../../database/setup.php';

$slug = mysqli_real_escape_string($koneksi, $_GET['judul']);


$query = "DELETE FROM buku WHERE slug='$slug'";
$sql   = mysqli_query($koneksi, $query) or die(mysqli_error($koneksi));

if ($sql) {
    header("location: ../../public/index.php?page=profile&sub_page=buku-ku&info=Berhasil Menghapus Buku");
} else {
    header("location: ../../public/index.php?page=profile&sub_page=buku-ku&info=Gagal Menghapus Buku");
}


        