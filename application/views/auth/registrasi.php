<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href='<?= base_url(); ?>/assets/img/icon/favicon.ico' rel='shortcut icon'>
    <title><?= $title; ?></title>
    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url() ?>assets/job_template/img/favicon.png">

    <!-- Google Font: Source Montserrat -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/adminlte.min.css">
    <!-- SELECTPICKER -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/bootstrap-select/bootstrap-select.css">
    <!-- My Style -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/auth.css">

    <!-- Favicon  -->
    <link rel="icon" href="<?= base_url() ?>assets/images/icon2.png">
</head>

<body style="background-color: #0E185F;">
    <div class="container mb-5">
        <div class="row mt-3 d-flex justify-content-center">
            <div class="col-lg-6">
                <!-- <div class="login-box mt-5"> -->
                <div class="card mt-5">
                    <div class="p-5">
                        <div class=" card-body p-0">
                            <div class="text-center">
                                <h1 class="h4 font-weight-bolder mb-4 warna">REGISTER RELOKER BALI</h1>
                                <hr class="mb-4 garis">
                            </div>
                            <form method="POST" action="">
                                <div class="form-group">
                                    <input type="text" class="form-control text-capitalize  <?= (form_error('nama')) ? 'border border-danger' : 'border border-secondary' ?>" id="nama" placeholder="Nama Lengkap" name="nama" autocomplete="off" value="<?= set_value('nama');  ?>">
                                    <?= form_error('nama', '<small class="form-text text-danger">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control  <?= (form_error('email')) ? 'border border-danger' : 'border border-secondary' ?>" id="email" placeholder="Email Address" name="email" autocomplete="off" value="<?= set_value('email');  ?>">
                                    <?= form_error('email', '<small class="form-text text-danger">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control  <?= (form_error('password1')) ? 'border border-danger' : 'border border-secondary' ?>" id="password1" placeholder="Password" name="password1" autocomplete="off">
                                    <?= form_error('password1', '<small class="form-text text-danger">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control  <?= (form_error('kabupaten')) ? 'border border-danger' : 'border border-secondary' ?>" id="password2" placeholder="Konfirmasi Password" name="password2" autocomplete="off">
                                    <?= form_error('password2', '<small class="form-text text-danger">', '</small>'); ?>
                                </div>
                        </div>
                        <button type="submit" class="btn btn-light btn-user btn-block font-weight-bolder text-light" style="background-color: #0179E3;">
                            SUBMIT AKUN
                        </button>
                        </form>
                        <hr class="garis">
                        <div class="text-center">
                            <p class="small text-dark">Sudah Punya Akun? Silahkan <a href="<?= base_url('auth/login') ?>" class="text-decoration-none"><span class="font-weight-bolder"> LOGIN</></a></p>
                        </div>
                    </div>
                </div>
                <!-- </div> -->
            </div>

        </div>
    </div>



    <script src="<?= base_url() ?>assets/plugins/jquery/jquery.min.js"></script>
    <script src="<?= base_url() ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- SELECT PICKER -->
    <script src="<?= base_url() ?>assets/js/bootstrap-select/bootstrap-select.js"></script>
    <script src="<?= base_url() ?>assets/js/adminlte.min.js"></script>

</body>

</html>