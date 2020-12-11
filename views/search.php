<?php

if(!isset($_POST['keyword'])) {
    include_once 'error/400.php';
    exit;
}

$keyword = mysqli_real_escape_string($koneksi, $_POST['keyword']);


$query = "SELECT * FROM buku WHERE judul LIKE '%$keyword%'";
$sql   = mysqli_query($koneksi, $query) or die(mysqli_error($koneksi));

if (mysqli_num_rows($sql) > 0) {

    while($item = mysqli_fetch_assoc($sql)) {
        echo '                
        <div class="row">
                <div class="col-lg-4">
                <article class="article article-style-c">
                    <div class="article-header">
                    <div class="article-image" data-background="'.asset($item['cover']).'">
                    </div>
                    </div>
                    <div class="article-details">
                        <div class="article-category"><a href="'.route('home&kategori=' . get_kategori($item['id_kategori'])).'">'.get_kategori($item['id_kategori']).'</a> <div class="bullet"></div> <a href="#">'.date('d M, Y', strtotime($item['created_at'])).'</a></div>
                    <div class="article-title">
                        <h2><a href="'.route("buku&judul=".$item['slug']."").'">'.$item['judul'].'</a></h2>
                    </div>
                    <p style="height: 100px;">'.substr($item['sinopsis'], 0, 161).' ...</p>
                    <div class="article-user">
                        <img alt="image" src="'.asset('img/avatar/default1.png').'">
                        <div class="article-user-details">
                        <div class="user-detail-name">
                            <span class="text-primary" style="font-weight: 600;">'.ucfirst(get_user_by_id($item['id_user'])).'</span>
                        </div>
                        <div class="text-job">'.get_role_by_id($item['id_user']).'</div>
                        </div>
                    </div>
                    </div>
                </article>
            </div>
        </div>
            
            ';
    }

} else {
    include_once 'error/404.php';
    exit;
}