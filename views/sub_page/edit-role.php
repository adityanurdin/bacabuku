<?php

$id = mysqli_real_escape_string($koneksi, $_GET['id']);

$query = "SELECT * FROM users WHERE id='$id'";
$sql   = mysqli_query($koneksi, $query) or die(mysqli_error($koneksi));

$data  = mysqli_fetch_assoc($sql);

?>

<div class="card-header">
    <h4>Edit Role <?= ucfirst($data['nama']) ?></h4>
</div>
<div class="card-body">
    <form id="role-form">
        <div class="form-group">
            <label class="d-block">Select Role</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" value="admin" name="exampleRadios" id="exampleRadios1" <?= $data['role'] == 'admin' ? 'checked' : '' ?>>
                <label class="form-check-label" for="exampleRadios1">
                    Admin
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" value="author" name="exampleRadios" id="exampleRadios2" <?= $data['role'] == 'author' ? 'checked' : '' ?>>
                <label class="form-check-label" for="exampleRadios2">
                    Author
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" value="user" name="exampleRadios" id="exampleRadios3" <?= $data['role'] == 'user' ? 'checked' : '' ?>>
                <label class="form-check-label" for="exampleRadios3">
                    User
                </label>
            </div>
        </div>
        <button id="btn-simpan" class="btn btn-primary">Simpan</button>
    </form>
</div>