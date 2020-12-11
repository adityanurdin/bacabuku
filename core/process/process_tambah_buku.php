<?php

session_start();
require_once '../../database/setup.php';


function slugify($text)
{
  $text = preg_replace('~[^\pL\d]+~u', '-', $text);
  $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
  $text = preg_replace('~[^-\w]+~', '', $text);
  $text = trim($text, '-');
  $text = preg_replace('~-+~', '-', $text);
  $text = strtolower($text);
  if (empty($text)) {
    return 'n-a';
  }

  require '../../database/setup.php';

  $query_check_slug = "SELECT * FROM buku WHERE slug='$text'";
  $sql_check_slug   = mysqli_query($koneksi, $query_check_slug) or die(mysqli_error($koneksi));

  if ( mysqli_num_rows($sql_check_slug) > 1 ) {
      $no = mysqli_num_rows($sql_check_slug) + 1;
      return $text . '-' . $no;
  } else {
      return $text;
  }

}


$judul = mysqli_real_escape_string($koneksi, $_POST['judul']);
$id_kategori = mysqli_real_escape_string($koneksi, $_POST['id_kategori']);
$sinopsis = mysqli_real_escape_string($koneksi, $_POST['sinopsis']);
$isi = mysqli_real_escape_string($koneksi, $_POST['isi']);
$tags = mysqli_real_escape_string($koneksi, $_POST['tags']);

$id         = $_SESSION['id'];
$query_user = " SELECT * FROM users where id='$id'";
$sql_user   = mysqli_query($koneksi , $query_user) or die(mysqli_error());
$data       = mysqli_fetch_assoc($sql_user);
$user       = $data['nama'];

$dir = "../../public/assets/img/buku/" . slugify($user) . '/';
$dir_db = "/img/buku/" . slugify($user) . '/';

if (!file_exists($dir)) {
    mkdir($dir, 0755);
}

$file_type      = strtolower(pathinfo($_FILES['fileToUpload']['name'], PATHINFO_EXTENSION));
$new_file_new   = slugify($judul).'_'.date('dmYHis').'.'.$file_type;

$target_file    = $dir . basename($new_file_new);
$status_upload  = 1;

$check = getimagesize($_FILES['fileToUpload']['tmp_name']);
if ( $check !== false ) {
    $status_upload = 1;
} else {
    $status_upload = 0;
}

if ( $status_upload == 1 ) {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        
        $slug   = slugify($judul);
        $status = 1;
        $created_at = date('Y-m-d h:m:s');
        $name_file_db = $dir_db . $new_file_new;
        $query  = "
            INSERT INTO buku (id_user, id_kategori, judul, slug, sinopsis, isi, tags, cover, status, created_at)
            VALUE ('$id', '$id_kategori', '$judul', '$slug', '$sinopsis', '$isi', '$tags', '$name_file_db', '$status', '$created_at')
        ";
        $sql    = mysqli_query($koneksi, $query) or die(mysqli_error($koneksi));
        if ($sql) {
            header("location: ../../public/index.php?page=profile&sub_page=buku-ku&info=Berhasil menambahkan buku");
        } else {
            header("location: ../../public/index.php?page=tambah-buku&info=Gagal, System Error");
        }

    } else {
        header("location: ../../public/index.php?page=tambah-buku&info=Gagal, Upload foto error");
    }
} else {
    header("location: ../../public/index.php?page=tambah-buku&info=Gagal, Foto belum diupload");
}