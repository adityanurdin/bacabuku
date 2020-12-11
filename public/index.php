<?php include_once('../core/helper/helper.php') ?>
<?php

    echo check_role();

    $query_kategori = " SELECT * FROM categories ";
    $sql_kategori   = query($query_kategori);

?>


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

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

     <!-- icon -->
    <link rel="shortcut icon" href="<?= asset('img/logo/logo.jpg') ?>" type="image/x-icon">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="<?= asset('dataTables/css/jquery.dataTables.min.css') ?>">
    <link rel="stylesheet" href="<?= asset('dataTables/css/dataTables.bootstrap4.min.css') ?>">
    <link rel="stylesheet" href="<?= asset('css/select2.min.css') ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link rel="stylesheet" href="https://demo.getstisla.com/assets/modules/summernote/summernote-bs4.css">
    <link rel="stylesheet" href="https://demo.getstisla.com/assets/modules/jquery-selectric/selectric.css">
    <link rel="stylesheet" href="https://demo.getstisla.com/assets/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.css">
    <link rel="stylesheet" href="https://demo.getstisla.com/assets/modules/chocolat/dist/css/chocolat.css">


    <!-- Template CSS -->
    <link rel="stylesheet" href="<?= asset('css/style.css') ?>">
    <link rel="stylesheet" href="<?= asset('css/components.css') ?>">

    <style>
      .app-name {
        font-family: 'Poppins', sans-serif !important;
        font-weight: 600 !important;
      }
    </style>

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

            <li class="nav-item dropdown">
              <a href="#" data-toggle="dropdown" class="nav-link has-dropdown"><i class="fas fa-list"></i><span>Categories</span></a>
              <ul class="dropdown-menu">
              <?php
              
              if (mysqli_num_rows($sql_kategori) > 0) {
                while($item = mysqli_fetch_assoc($sql_kategori)) {
                  echo '
                    <li class="nav-item"><a href="'.route('home&kategori=' . $item['slug_kategori']).'" class="nav-link">'.ucfirst($item['nama_kategori']).'</a></li>
                  ';
                }
              }
              
              ?>
              </ul>
            </li>

            <!-- <li class="nav-item <?= active_menu('categories') ?>">
              <a href="<?= route('categories') ?>" class="nav-link"><i class="fas fa-list"></i><span>Categories</span></a>
            </li> -->

            <!-- <li class="nav-item <?= active_menu('author') ?>">
              <a href="<?= route('author') ?>" class="nav-link"><i class="fas fa-users"></i><span>Author</span></a>
            </li> -->

            <li class="nav-item <?= active_menu('tentang-kami') ?>">
              <a href="<?= route('tentang-kami') ?>" class="nav-link"><i class="fas fa-info"></i><span>About Us</span></a>
            </li>


          </ul>
        </div>
      </nav>

      <!-- Main Content -->
      <div class="main-content">

      <section class="section">
                <!-- <div class="section-header" id="nav-title">
                  <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Layout</a></div>
                    <div class="breadcrumb-item">Top Navigation</div>
                  </div>
                </div> -->
                  
                  <div class="section-body">

                    <?php include "../core/page.php" ?>

                  </div>
                </section>


      </div>

      <footer class="main-footer">
        <div class="footer-left">
          Copyright &copy; <?= date('Y') ?>  <div class="bullet"></div> Develop By <a href="<?= route('tentang-kami') ?>">Baca Buku Teams</a>
        </div>
        <div class="footer-right">
          Version 0.2
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
    <script src="https://demo.getstisla.com/assets/modules/summernote/summernote-bs4.js"></script>
    <script src="https://demo.getstisla.com/assets/modules/jquery-selectric/jquery.selectric.min.js"></script>
    <script src="https://demo.getstisla.com/assets/modules/upload-preview/assets/js/jquery.uploadPreview.min.js"></script>
    <script src="https://demo.getstisla.com/assets/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
    <script src="https://demo.getstisla.com/assets/modules/chocolat/dist/js/jquery.chocolat.min.js"></script>

    <!-- JS -->
    <script>
      $('#table-buku-ku').DataTable({
        "bLengthChange": false,
        "iDisplayLength": 25,
      })
      $('#table-users').DataTable({
        "bLengthChange": false,
        "iDisplayLength": 25,
      })
    </script>
    <script>
      $("select").selectric();
      $.uploadPreview({
        input_field: "#fileToUpload",   // Default: .image-upload
        preview_box: "#image-preview",  // Default: .image-preview
        label_field: "#image-label",    // Default: .image-label
        label_default: "Choose File",   // Default: Choose File
        label_selected: "Change File",  // Default: Change File
        no_label: false,                // Default: false
        success_callback: null          // Default: null
      });
      $(".inputtags").tagsinput('items');
    </script>
    <script>
      $('#btn-simpan').on('click', function(e) {
        e.preventDefault()
        var radios = document.getElementsByName('exampleRadios');

        for (var i = 0, length = radios.length; i < length; i++) {
          if (radios[i].checked) {
            location.href = '../core/process/process_edit_role.php?id=<?=$data['id']?>&role=' + radios[i].value
            break;
          }
        }
      })
    </script>
</body>
</html>

