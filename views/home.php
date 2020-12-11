<?php

    $query_buku = "SELECT * FROM buku 
                    WHERE status='1'
                    ORDER BY created_at DESC
                    LIMIT 6";
    $sql_buku   = mysqli_query($koneksi, $query_buku) or die(mysqli_error($koneksi));

    if (isset($_GET['kategori'])) {
        $slug_kategori = mysqli_real_escape_string($koneksi, $_GET['kategori']);
        
        $query_kategori = "
            SELECT * FROM categories
            WHERE slug_kategori='$slug_kategori'
        ";
        $sql_kategori = mysqli_query($koneksi, $query_kategori) or die(mysqli_error($koneksi));
        $data         = mysqli_fetch_assoc($sql_kategori);
        if (!$data) {
            
            include_once 'error/404.php';
            $display = false;
        } else {
            $display = true;

            $query_buku_by_kategori = "
            SELECT * FROM buku
            WHERE status='1'
            AND id_kategori='$data[id]'
            ORDER BY created_at DESC
            ";
            $sql_buku_by_kategori = mysqli_query($koneksi, $query_buku_by_kategori) or die(mysqli_error($koneksi));
        }
    } else {
        $display = false;
    }
?>


    <?php
        if ($display == true) {

    ?>
    <div class="card">
        <div class="card-header">
            <h4>Kategori : <?= ucfirst($data['nama_kategori']) ?></h4>
        </div>
        <div class="card-body">
            <div class="row">

                <?php
                    if (mysqli_num_rows($sql_buku_by_kategori) > 0) {
                        $no = 1;
                        while($item = mysqli_fetch_assoc($sql_buku_by_kategori)) {
                            $no++;
                            echo '
                            
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
                            
                            ';
                        }
                    } else {
                        echo '
                            <div class="text-center">
                                Belum ada buku
                            </div>
                        ';
                    }
                ?>                

            </div>

        </div>
    </div>
    <?php
        }
    ?>
    
    <div class="card">
        <div class="card-header">
            <h4>Paling Popular</h4>
        </div>
        <div class="card-body">
            <div class="row">

                <?php
                    if (mysqli_num_rows($sql_buku) > 0) {
                        $no = 1;
                        while($item = mysqli_fetch_assoc($sql_buku)) {
                            if ($no === 1 OR $no === 2) {
                                $status = '<div class="article-badge-item bg-info"><i class="fas fa-fire"></i>New</div>';
                            } else {
                                $status = '';
                            }
                            $no++;
                            echo '
                            
                            <div class="col-lg-4">
                            <article class="article article-style-c">
                                <div class="article-header">
                                <div class="article-image" data-background="'.asset($item['cover']).'">
                                </div>
                                <div class="article-badge">
                                    '.$status.'
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
                            
                            ';
                        }
                    }
                ?>                

            </div>
    </div>
