<?php

    $query = "SELECT * FROM users";
    $sql   = mysqli_query($koneksi, $query) or die(mysqli_error($koneksi));

?>

<div class="card-header">
    <h4>Users</h4>
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

    <table class="table table-striped" id="table-users">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Role</th>
            </tr>
        </thead>
        <tbody>
            <?php
                if (mysqli_num_rows($sql) > 0) {
                    $no = 1;
                    while($item = mysqli_fetch_assoc($sql)) {
                        echo '
                            <tr>
                                <td class="text-center">'.$no++.'</td>
                                <td>'.ucfirst($item['nama']).'</td>
                                <td>'.$item['email'].'</td>
                                <td>
                                    '.ucfirst($item['role']).' <br>
                                    <a href="'.route('profile&sub_page=edit-role&id='.$item['id']).'">Edit</a>
                                </td>
                            </tr>
                        ';
                    }
                }
            ?>
        </tbody>
    </table>
    
    </div>
</div>