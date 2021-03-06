<?php

  $id         = $_SESSION['id'];
  $books      = mysqli_query($koneksi, "SELECT * FROM buku WHERE id_user='$id'");
  $book_count = mysqli_num_rows($books);

?>

<div class="card-header">
    <h4>My Profile</h4>
</div>
<div class="card-body">
<div class="card profile-widget">
  <div class="profile-widget-header">                     
    <img alt="image" src="<?= asset('img/avatar/default1.png') ?>" class="rounded-circle profile-widget-picture">
    <div class="profile-widget-items">
      <div class="profile-widget-item">
        <div class="profile-widget-item-label">Book's</div>
        <div class="profile-widget-item-value"><?= $book_count ?></div>
      </div>
      <div class="profile-widget-item">
        <div class="profile-widget-item-label">Followers</div>
        <div class="profile-widget-item-value">6,8K</div>
      </div>
      <div class="profile-widget-item">
        <div class="profile-widget-item-label">Following</div>
        <div class="profile-widget-item-value">2,1K</div>
      </div>
    </div>
  </div>
  <div class="profile-widget-description">
    <!-- <div class="profile-widget-name"><?= get_user() ?> <div class="text-muted d-inline font-weight-normal"><div class="slash"></div> Web Developer</div></div> -->
    <div class="profile-widget-name"><?= get_user() ?></div>
    <?= get_user() ?> is a superhero name in <b>Indonesia</b>, especially in my family. He is not a fictional character but an original hero in my family, a hero for his children and for his wife. So, I use the name as a user in this template. Not a tribute, I'm just bored with <b>'John Doe'</b>.
  </div>
</div>
</div>