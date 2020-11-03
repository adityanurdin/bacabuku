<?php

session_start();
require_once '../../database/setup.php';

$email      = mysqli_real_escape_string($koneksi, $_POST['email']);
$password   = mysqli_real_escape_string($koneksi, $_POST['password']);

$sql    = " SELECT * FROM users where email='$email'";
$query  = mysqli_query($koneksi , $sql);

$check  = mysqli_num_rows($query);

if ($check > 0) {
    $data = mysqli_fetch_assoc($query);
    
    // verifikasi password 
    if (password_verify($password, $data['password'])) {
        
        // set sesi user login
        $_SESSION['id'] = $data['id'];

        // validasi role
        if ($data['role'] == 'user') {
            header("location: ../../public/index.php?page=home");
        } else if ($data['role'] == 'author') {
            header("location: ../../public/index.php?page=home");
        }

    } else {
        $pesan = 'Password anda salah';
        header("location: ../../public/index.php?page=login&pesan=" . $pesan);
    }
} else {

        $pesan = 'Email anda salah';
        header("location: ../../public/index.php?page=login&pesan=" . $pesan);

}