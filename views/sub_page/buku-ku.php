<?= check_role() ?>

<?php

$id         = $_SESSION['id'];
$query_buku = "SELECT * FROM buku
                WHERE id_user='$id'";
$sql_buku   = mysqli_query($koneksi, $query_buku);

?>

<div class="card-header">
    <h4>Buku Ku</h4>
</div>
<div class="card-body">
    <div class="table-responsive">

        <?php 
            if (isset($_GET['info'])) {

        ?>
        <div class="alert bg-info">
            <strong>Info</strong> <?= isset($_GET['info']) ? $_GET['info'] : '' ?>
        </div>

        <?php
            }
        ?>

        <div class="mt-2 mb-5 float-right">
            <a href="<?= route('tambah-buku') ?>" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah Buku</a>
        </div>
    
        <table class="table table-striped" id="table-buku-ku">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Judul Buku</th>
                    <th>Viewers</th>
                    <th>Favorited</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $no = 1;
                    if (mysqli_num_rows($sql_buku) > 0) {
                        while($item = mysqli_fetch_assoc($sql_buku)) {
                            echo '
                                <tr class="text-center">
                                    <td>'.$no++.'</td>
                                    <td class="text-left">
                                        '.ucfirst($item['judul']).' <br>
                                        <a href="'.route("buku&judul=".$item['slug']."").'">Show</a> <a href="'.route('edit-buku&judul=' . $item['slug'] ).'">Edit</a> <a href="'.process('hapus_buku', 'judul=' . $item['slug']).'" onclick="return checkDelete()">Delete</a>
                                    </td>
                                    <td>1000</td>
                                    <td>500</td>
                                </tr>
                            ';
                        }
                    } else {
                        echo '
                            <tr class="text-center">
                                <td colspan="4">Belum ada buku</td>
                            </tr>
                        ';
                    }
                ?>
            </tbody>
        </table>

    </div>
</div>

<script>

function checkDelete(){
    return confirm('Apakah kamu yakin ingin menghapus buku ini ?');
}

</script>