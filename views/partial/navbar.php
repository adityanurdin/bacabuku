<?php

$query_buku = "SELECT * FROM buku 
              WHERE status='1'
              ORDER BY created_at DESC
              LIMIT 2";
$sql_buku   = mysqli_query($koneksi, $query_buku) or die(mysqli_error($koneksi));

?>

<div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <a href="<?= route('home') ?>" class="navbar-brand sidebar-gone-hide app-name"><?= env('APP_NAME') ?></a>
        <a href="#" class="nav-link sidebar-gone-show mt-4" data-toggle="sidebar"><i class="fas fa-bars"></i></a>
        <!-- <div class="nav-collapse">
          <a class="sidebar-gone-show nav-collapse-toggle nav-link" href="#">
            <i class="fas fa-ellipsis-v"></i>
          </a>
          <ul class="navbar-nav">
            <li class="nav-item active"><a href="#" class="nav-link">Application</a></li>
            <li class="nav-item"><a href="#" class="nav-link">Report Something</a></li>
            <li class="nav-item"><a href="#" class="nav-link">Server Status</a></li>
          </ul>
        </div> -->

        <form class="form-inline ml-auto" autocomplete="off" action="<?= route('search') ?>" method="POST">
          <ul class="navbar-nav">
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
          </ul>
          <div class="search-element">
              <input class="form-control" type="search" name="keyword" placeholder="Search" aria-label="Search" data-width="250">
              <button class="btn" type="submit"><i class="fas fa-search"></i></button>
            <div class="search-backdrop"></div>
            <?php
              if(mysqli_num_rows($sql_buku) > 0) {
                while($item = mysqli_fetch_assoc($sql_buku)) {
                  echo '
                      <div class="search-result">
                      <div class="search-header">
                        Newest
                      </div>
                      <div class="search-item">
                        <a href="'.route("buku&judul=".$item['slug']."").'">
                          <img class="mr-3 rounded" width="30" src="'.asset($item['cover']).'" alt="product">
                          '.$item['judul'].'
                        </a>
                      </div>
                    </div>
                  ';
                }
              }
            ?>
          </div>
        </form>
        
        <ul class="navbar-nav navbar-right">
          
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <img alt="image" src="<?= asset('img/stisla/avatar/avatar-1.png') ?>" class="rounded-circle mr-1">
            <div class="d-sm-none d-lg-inline-block"><?= ucfirst(get_user()) ?></div></a>
            <div class="dropdown-menu dropdown-menu-right">

              <?php
                  if(isset($_SESSION['id'])) {
                    echo '
                      <a href="'.route('profile&sub_page=my-profile').'" class="dropdown-item has-icon">
                        <i class="far fa-user"></i> My Profile
                      </a>
                    ';
                  } else {
                    echo '
                      <a href="'.route('login').'" class="dropdown-item has-icon">
                        <i class="far fa-user"></i> Login
                      </a>
                      <a href="'.route('register').'" class="dropdown-item has-icon">
                        <i class="fas fa-user-plus"></i> Register
                      </a>
                    ';
                  }
              ?>

              <?php
                  if(isset($_SESSION['id'])) {
              ?>

              <div class="dropdown-divider"></div>
              <a href="<?= process('logout') ?>" class="dropdown-item has-icon text-danger">
                <i class="fas fa-sign-out-alt"></i> Logout
              </a>
            </div>

            <?php
                  }
            ?>
          </li>
        </ul>
      </nav>