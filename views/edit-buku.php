<?php

    echo check_role();

    $query_kategori = " SELECT * FROM categories ";
    $sql_kategori   = query($query_kategori);

    $slug       = mysqli_real_escape_string($koneksi, $_GET['judul']);
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

<form action="<?= process('edit_buku') ?>" method="post" enctype="multipart/form-data">
<input type="hidden" name="id" value="<?= $data['id'] ?>">

    <div class="card-body">

        <div class="row">
        
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="">Judul Buku</label>
                    <input type="text" value="<?= $data['judul'] ?>" name="judul" id="" class="form-control">
                </div>
            </div>

            <div class="col-lg-6">
                <div class="form-group">
                    <label for="">Kategori</label>
                    <select name="id_kategori" id="" class="form-control selectric">

                        <?php
                        
                            if (mysqli_num_rows($sql_kategori) > 0) {
                                while($item = mysqli_fetch_assoc($sql_kategori)) {
                                    echo '
                                        <option value="'.$item['id'].'" '.(($data['id_kategori'] == $item['id']) ? 'selected' : '').'  >'.ucfirst($item['nama_kategori']).'</option>
                                    ';
                                }
                            }

                        ?>

                    </select>
                </div>
            </div>

        </div>

        <div class="form-group">
            <label for="">Cover saat ini</label>
            <div class="gallery gallery-md" data-item-height="100">
                <div class="gallery-item" data-image="<?= asset($data['cover']) ?>" data-title="<?= $data['judul'] ?>"></div>
            </div>
        </div>

        <div class="form-group">
            <label for="">Sinopsis</label>
            <textarea name="sinopsis" id="" cols="30" rows="10" class="form-control"><?= $data['sinopsis'] ?></textarea>
        </div>

        <div class="form-group">
            <label for="">Isi</label>
            <textarea name="isi" class="summernote"><?= $data['isi'] ?></textarea>
        </div>

        <div class="row">
        
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="">Tags</label>
                    <input type="text" name="tags" value="<?= $data['tags'] ?>" class="form-control inputtags">
                    <small>Pisahkan dengan koma (,)</small>
                </div>
                <!-- <div class="form-group">
                    <div class="control-label">Options</div>

                    <label class="custom-switch mt-2">
                    <input type="checkbox" checked name="custom-switch-checkbox" class="custom-switch-input">
                    <span class="custom-switch-indicator"></span>
                    <span class="custom-switch-description">Simpan sebagai draft</span>
                    </label>

                </div> -->
            </div>

            <div class="col-lg-6">
                <div class="form-group">
                    <label for="">Cover Buku</label>
                    <div id="image-preview" class="image-preview">
                        <label for="fileToUpload" id="image-label">Choose File</label>
                        <input type="file" name="fileToUpload" id="fileToUpload" />
                    </div>
                </div>   
            </div>
            

        </div>

    </div>
    <div class="card-footer bg-whitesmoke text-md-right">
        <a href="<?= route('profile&sub_page=buku-ku') ?>" class="btn btn-secondary">back</a>
        <button class="btn btn-primary" type="submit">Save Changes</button>
    </div>
</form>