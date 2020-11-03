<?php

session_start();
require_once '../../database/setup.php';

$nama      = mysqli_real_escape_string($koneksi, $_POST['nama']);
$email      = mysqli_real_escape_string($koneksi, $_POST['email']);
$password   = mysqli_real_escape_string($koneksi, $_POST['password']);
$password_confirmation   = mysqli_real_escape_string($koneksi, $_POST['password_confirmation']);

// validasi password match
if ($password != $password_confirmation) {
    header("location: ../../public/index.php?page=register&pesan=Password tidak cocok");
}

// cek email user
$sql    = " SELECT * FROM users where email='$email'";
$query  = mysqli_query($koneksi , $sql);
$check  = mysqli_num_rows($query);
if ($check > 0) {
    header("location: ../../public/index.php?page=register&pesan=Email yang anda masukan sudah digunakan");
}

// membuat passowrd hash
$option = [
    'cost' => 10
];
$password   = password_hash($password, PASSWORD_BCRYPT, $option);

$role   = 'user';

// input user ke DB
$query = "INSERT INTO users (nama, email , password, role) VALUE ('$nama', '$email' , '$password', '$role')";
$insert = mysqli_query($koneksi, $query) or die(mysqli_error($koneksi));
if ($insert) {
    header("location: ../../public/index.php?page=login&info=Registrasi berhasil, silahkan login");
} else {
    header("location: ../../public/index.php?page=register&pesan=Registrasi gagal");
}

