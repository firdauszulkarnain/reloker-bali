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
    <!-- My Style -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/auth.css">

    <!-- Toaster Notif -->
    <link href="<?= base_url() ?>assets/plugins/toastr/toastr.min.css" rel="stylesheet">

    <!-- Favicon  -->
    <link rel="icon" href="<?= base_url() ?>assets/images/icon2.png">
</head>

<body style="background-color: #0E185F;">
    <div class="container">
        <div class="row mt-5 d-flex justify-content-center">
            <div class="login-box mt-5">
                <div class="flash-data" data-flashdata="<?= $this->session->flashdata('pesan'); ?>"></div>
                <div class="card bg-light shadow p-1 mb-5 bg-white rounded">
                    <div class="pt-5 pb-3 px-4">
                        <div class=" card-body p-0">
                            <img src="<?= base_url() ?>assets/job_template/img/logo1.png" alt="" width="100%" class="tengah mt-n4">
                            <hr class="mb-4 garis">
                            <div class="error" data-error="<?= $this->session->flashdata('error'); ?>"></div>
                            <form method="POST" action="">
                                <div class="mb-3">
                                    <div class="input-group <?= (form_error('email')) ? 'is-invalid' : '' ?>">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-light"> <span class="fas fa-user warna"></span></span>
                                        </div>
                                        <input type="text" class="form-control <?= (form_error('email')) ? 'is-invalid' : '' ?>" placeholder="Email" value="<?= set_value('email') ?>" name="email" autocomplete="off" autofocus>
                                    </div>
                                    <div class="invalid-feedback">
                                        <?= form_error('email') ?>
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <div class="input-group <?= (form_error('password')) ? 'is-invalid' : '' ?>">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-light"> <span class="fas fa-lock warna"></span></span>
                                        </div>
                                        <input type="password" class="form-control <?= (form_error('password')) ? 'is-invalid' : '' ?>" placeholder="Password" name="password" autocomplete="off">
                                    </div>
                                    <div class="invalid-feedback">
                                        <?= form_error('password') ?>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-block mt-4 font-weight-bolder text-light" style="background-color: #0179E3;">MASUK</button>
                                <hr class="mb-4 garis">
                                <p class="small mt-3 text-center text-dark mb-5">Belum Punya Akun? Silahkan <a href="<?= base_url() ?>auth/register" class="text-decoration-none"><strong> REGISTRASI</strong></a></p>
                            </form>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>



    <script src="<?= base_url() ?>assets/plugins/jquery/jquery.min.js"></script>
    <script src="<?= base_url() ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url() ?>assets/js/adminlte.min.js"></script>
    <script src="<?= base_url() ?>assets/plugins/sweetalert2/sweetalert2.all.min.js"></script>
    <script src="<?= base_url() ?>assets/plugins/toastr/toastr.min.js"></script>
    <script>
        $(document).ready(function() {
            const flashData = $('.flash-data').data('flashdata');
            if (flashData) {
                Swal.fire({
                    title: 'Success',
                    text: 'Berhasil ' + flashData,
                    icon: 'success'
                });
            }
            const error = $('.error').data('error');
            if (error) {
                toastr.error(error);
            }
        });
    </script>
</body>

</html>