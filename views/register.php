<?= check_auth() ?>
<div class="container mt-5">
    <div class="row">
        <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">

        <div class="card">
            <div class="card-header"><h4>Register</h4></div>

            <div class="card-body">
            <?php
                if(isset($_GET['pesan'])) {
                    echo '
                        <div class="alert bg-danger">
                            <strong>Error!</strong> '.$_GET["pesan"].'
                        </div>
                    ';
                }
            ?>
            <form method="POST" action="<?= process('register') ?>" class="needs-validation" novalidate="">
                <div class="form-group">
                <label for="nama">Nama</label>
                <input id="nama" type="nama" class="form-control" name="nama" tabindex="1" required autofocus>
                <div class="invalid-feedback">
                    Please fill in your nama
                </div>
                </div>
                
                <div class="form-group">
                <label for="email">Email</label>
                <input id="email" type="email" class="form-control" name="email" tabindex="1" required autofocus>
                <div class="invalid-feedback">
                    Please fill in your email
                </div>
                </div>

                <div class="form-group">
                    <div class="d-block">
                        <label for="password" class="control-label">Password</label>
                    </div>
                    <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
                    <div class="invalid-feedback">
                        please fill in your password
                    </div>
                </div>

                <div class="form-group">
                    <div class="d-block">
                        <label for="password" class="control-label">Password Confirmation</label>
                    </div>
                    <input id="password" type="password" class="form-control" name="password_confirmation" tabindex="2" required>
                    <div class="invalid-feedback">
                        please fill in your password
                    </div>
                </div>

                <div class="form-group">
                <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                    Submit
                </button>
                </div>
            </form>

            </div>
        </div>
        </div>
    </div>
    </div>