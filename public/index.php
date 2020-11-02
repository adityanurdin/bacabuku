<?php include_once('../core/helper/helper.php') ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= page_title() ?> &mdash; <?= env('APP_NAME') ?></title>
    <meta name="csrf-token" content="<?= csrf_token() ?>">

    <!-- General CSS Files -->
    <link rel="stylesheet" href="<?= asset('bootstrap/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">

     <!-- icon -->
    <link rel="shortcut icon" href="<?= asset('img/logo/logo.jpg') ?>" type="image/x-icon">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="<?= asset('dataTables/css/jquery.dataTables.min.css') ?>">
    <link rel="stylesheet" href="<?= asset('dataTables/css/dataTables.bootstrap4.min.css') ?>">
    <link rel="stylesheet" href="<?= asset('css/select2.min.css') ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

    <!-- Template CSS -->
    <link rel="stylesheet" href="<?= asset('css/style.css') ?>">
    <link rel="stylesheet" href="<?= asset('css/components.css') ?>">

</head>
<body class="layout-3">


<div id="app">
    <div class="main-wrapper container">
      
      <?php include "../views/partial/navbar.php" ?>

      <nav class="navbar navbar-secondary navbar-expand-lg">
        <div class="container">
          <ul class="navbar-nav">
          <li class="nav-item <?= active_menu('home') ?>">
              <a href="<?= route('home') ?>" class="nav-link"><i class="fas fa-home"></i><span>Home</span></a>
          </li>
          <li class="nav-item <?= active_menu('categories') ?>">
            <a href="<?= route('categories') ?>" class="nav-link"><i class="fas fa-list"></i><span>Categories</span></a>
          </li>
          <li class="nav-item <?= active_menu('author') ?>">
            <a href="<?= route('author') ?>" class="nav-link"><i class="fas fa-users"></i><span>Author</span></a>
          </li>
          <!-- <li class="nav-item dropdown">
            <a href="#" data-toggle="dropdown" class="nav-link has-dropdown"><i class="far fa-clone"></i><span>Multiple Dropdown</span></a>
            <ul class="dropdown-menu">
              <li class="nav-item"><a href="#" class="nav-link">Not Dropdown Link</a></li>
              <li class="nav-item dropdown"><a href="#" class="nav-link has-dropdown">Hover Me</a>
                <ul class="dropdown-menu">
                  <li class="nav-item"><a href="#" class="nav-link">Link</a></li>
                  <li class="nav-item dropdown"><a href="#" class="nav-link has-dropdown">Link 2</a>
                    <ul class="dropdown-menu">
                      <li class="nav-item"><a href="#" class="nav-link">Link</a></li>
                      <li class="nav-item"><a href="#" class="nav-link">Link</a></li>
                      <li class="nav-item"><a href="#" class="nav-link">Link</a></li>
                    </ul>
                  </li>
                  <li class="nav-item"><a href="#" class="nav-link">Link 3</a></li>
                </ul>
              </li> -->
              </ul>
            </li>
          </ul>
        </div>
      </nav>

      <!-- Main Content -->
      <div class="main-content">

        <?php include "../core/page.php" ?>

      </div>

      <footer class="main-footer">
        <div class="footer-left">
          Copyright &copy; 2018 <div class="bullet"></div> Design By <a href="https://nauval.in/">Muhamad Nauval Azhar</a>
        </div>
        <div class="footer-right">
          
        </div>
      </footer>

    </div>
  </div>

    
    

    <script src="<?= asset('bootstrap/js/jquery-3.3.1.min.js') ?>"></script>
    <script src="<?= asset('js/app.min.js').'?'.rand(1234567, 23456789)  ?>"></script>
    <script src="<?= asset('bootstrap/js/bootstrap.min.js') ?>"></script>
    <script src="<?= asset('bootstrap/js/jquery.nicescroll.min.js') ?>"></script>
    <script src="<?= asset('bootstrap/js/moment.min.js') ?>"></script>
    <script src="<?= asset('js/stisla.js') ?>"></script>
    <script src="<?= asset('js/scripts.js') ?>"></script>

    <!-- JS Libraries -->
    <script src="<?= asset('dataTables/js/jquery.dataTables.min.js') ?>"></script>
    <script src="<?= asset('dataTables/js/dataTables.bootstrap4.min.js') ?>"></script>
    <script src="<?= asset('js/select2.full.min.js') ?>"></script>
</body>
</html>

