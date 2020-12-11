<?php

    echo check_role();

    $query_kategori = " SELECT * FROM categories ";
    $sql_kategori   = query($query_kategori);

?>

<form action="<?= process('tambah_buku') ?>" method="post" enctype="multipart/form-data">

    <div class="card-body">

        <div class="row">
        
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="">Judul Buku</label>
                    <input type="text" name="judul" id="" class="form-control">
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
                                        <option value="'.$item['id'].'">'.ucfirst($item['nama_kategori']).'</option>
                                    ';
                                }
                            }

                        ?>

                    </select>
                </div>
            </div>

        </div>

        <div class="form-group">
            <label for="">Sinopsis</label>
            <textarea name="sinopsis" id="" cols="30" rows="10" class="form-control"></textarea>
        </div>

        <div class="form-group">
            <label for="">Isi</label>
            <textarea name="isi" class="summernote"></textarea>
        </div>

        <div class="row">
        
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="">Tags</label>
                    <input type="text" name="tags" class="form-control inputtags">
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