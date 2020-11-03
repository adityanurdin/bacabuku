<?= check_session() ?>

<div id="output-status"></div>
            <div class="row">
              <div class="col-md-4">
                <div class="card">
                  <div class="card-header">
                    <h4>Jump To</h4>
                  </div>
                  <div class="card-body">
                    <ul class="nav nav-pills flex-column">
                      <li class="nav-item"><a href="#" class="nav-link active">My Profile</a></li>
                      <li class="nav-item"><a href="#" class="nav-link">Edit Profile</a></li>
                      <li class="nav-item"><a href="#" class="nav-link">Buku Ku</a></li>
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