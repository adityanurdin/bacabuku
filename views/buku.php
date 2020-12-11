<?php

$slug = mysqli_real_escape_string($koneksi, $_GET['judul']);
$query_buku = "SELECT * FROM buku where slug='$slug'";
$sql_buku   = mysqli_query($koneksi, $query_buku) or die(mysqli_error($koneksi));

$data = mysqli_fetch_assoc($sql_buku);
if (!$data) {

    include_once 'error/404.php';
    $display = 'none;';
} else {
    $display = '';
}

?>


<div class="card" style="display: <?= $display ?>;">
    <div class="card-header">
        <h4><?= $data['judul'] ?></h4>
    </div>
    <div class="card-body">

        <div class="p-3">
            <?= $data['isi'] ?>
        </div>
    </div>
</div>