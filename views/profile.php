<?= check_session() ?>

<div id="output-status"></div>
            <div class="row">
              <div class="col-md-4">
                <div class="card">
                  <div class="card-header">
                    <h4>Menus</h4>
                  </div>
                  <div class="card-body">
                    <ul class="nav nav-pills flex-column">
                      <li class="nav-item"><a href="<?= route('profile&sub_page=my-profile') ?>" class="nav-link <?= active_menu('my-profile') ?>">My Profile</a></li>
                      <li class="nav-item"><a href="<?= route('profile&sub_page=edit-profile') ?>" class="nav-link <?= active_menu('edit-profile') ?>">Edit Profile</a></li>
                      <li class="nav-item"><a href="<?= route('profile&sub_page=buku-ku') ?>" class="nav-link  <?= active_menu('buku-ku') ?>">Buku Ku</a></li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-md-8">
                <form id="setting-form">
                  <div class="card" id="settings-card">
                    <?php include '../core/sub_page.php';  ?>
                  </div>
                </form>
              </div>
            </div>