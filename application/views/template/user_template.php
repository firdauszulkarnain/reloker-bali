<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?= $title ?> | RELOKER BALI</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url() ?>assets/job_template/img/favicon.png">


    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <link href="<?= base_url() ?>assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url() ?>assets/job_template/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/job_template/css/magnific-popup.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/job_template/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/job_template/css/themify-icons.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/job_template/css/flaticon.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/job_template/css/gijgo.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/job_template/css/animate.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/job_template/css/slicknav.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/bootstrap-select/bootstrap-select.css">
    <link href="<?= base_url() ?>assets/plugins/select2/css/select2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url() ?>assets/job_template/css/style.css">
    <link href="<?= base_url() ?>assets/css/style.css" rel="stylesheet">
    <script src="<?= base_url() ?>assets/plugins/jquery/jquery.min.js"></script>
    <link href="<?= base_url() ?>assets/css/myselect2.css" rel="stylesheet">
</head>

<body>
    <header>
        <div class="header-area ">
            <div id="sticky-header" class="main-header-area">
                <div class="container-fluid ">
                    <div class="header_bottom_border">
                        <div class="row align-items-center">
                            <div class="col-xl-3 col-lg-2">
                                <div class="logo">
                                    <a href="<?= base_url() ?>">
                                        <img src="<?= base_url() ?>assets/job_template/img/logo.png" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-7">
                                <div class="main-menu  d-none d-lg-block">
                                    <nav>
                                        <ul id="navigation">
                                            <li><a href="<?= base_url() ?>" class="<?= $this->uri->segment(1) == '' ||  $this->uri->segment(1) == 'home' ? "aktif" : "" ?>">home</a></li>

                                            <li><a href="<?= base_url() ?>loker" class="<?= $this->uri->segment(1) == 'loker' ? "aktif" : "" ?>">Lowongan</a></li>
                                            <?php if ($this->session->userdata('user')) : ?>
                                                <li><a href="<?= base_url() ?>rekomendasi" class="<?= $this->uri->segment(1) == 'rekomendasi' ? "aktif" : "" ?>">Rekomendasi</a></li>
                                            <?php else : ?>
                                                <li><a href="<?= base_url() ?>auth/login">Rekomendasi</a></li>
                                            <?php endif ?>
                                            <li><a href="<?= base_url() ?>tentang" class="<?= $this->uri->segment(1) == 'tentang' ? "aktif" : "" ?>">Tentang Kami</a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-3 d-none d-lg-block">
                                <div class="Appointment">
                                    <div class="d-none d-lg-block">
                                        <?php if ($this->session->userdata('user')) : ?>
                                            <a class="btn btn-light btn-sm dropdown-toggle px-4" style="color: #0E185F; font-family: 'Roboto';" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-expanded="false"><i class="fas fa-user"></i> <?= $user['username'] ?></a>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                <a class="dropdown-item" href="<?= base_url() ?>user/profile">Profile</a>
                                                <a class="dropdown-item" href="<?= base_url() ?>auth/logout">Logout</a>
                                            </div>
                                        <?php else : ?>
                                            <a class="btn btn-light btn-sm px-4" style="color: #0E185F; font-family: 'Roboto';" href="<?= base_url() ?>auth/login">Login</a>
                                        <?php endif ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mobile_menu d-block d-lg-none"></div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </header>
    <!-- header-end -->
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('pesan'); ?>"></div>
    <?= $contens ?>



    <!-- footer start -->
    <footer class="footer">
        <div class="copy-right_text wo py-3">
            <div class="container">
                <div class="footer_border"></div>
                <div class="row">
                    <div class="col-xl-12">
                        <p class="copy_right text-center">
                            Copyright &copy; <?= date('Y') ?> All Rights Reserved RELOKER BALI
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>


    <script src="<?= base_url() ?>assets/job_template/js/vendor/modernizr-3.5.0.min.js"></script>
    <script src="<?= base_url() ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="<?= base_url() ?>assets/job_template/js/owl.carousel.min.js"></script>
    <script src="<?= base_url() ?>assets/job_template/js/isotope.pkgd.min.js"></script>
    <script src="<?= base_url() ?>assets/job_template/js/jquery.counterup.min.js"></script>
    <script src="<?= base_url() ?>assets/job_template/js/imagesloaded.pkgd.min.js"></script>
    <script src="<?= base_url() ?>assets/job_template/js/scrollIt.js"></script>
    <script src="<?= base_url() ?>assets/job_template/js/jquery.scrollUp.min.js"></script>
    <script src="<?= base_url() ?>assets/job_template/js/wow.min.js"></script>
    <script src="<?= base_url() ?>assets/job_template/js/jquery.slicknav.min.js"></script>
    <script src="<?= base_url() ?>assets/job_template/js/jquery.magnific-popup.min.js"></script>
    <script src="<?= base_url() ?>assets/job_template/js/main.js"></script>
    <script src="<?= base_url() ?>assets/js/bootstrap-select/bootstrap-select.js"></script>
    <script src="<?= base_url() ?>assets/js/select/defaults-id_ID.min.js"></script>
    <script src="<?= base_url() ?>assets/plugins/select2/js/select2.full.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="<?= base_url() ?>assets/js/job.js"></script>
    <script>
        $(document).ready(function() {
            $('.select2').select2({
                width: '100%',
                placeholder: "Cari Keahlian",
                allowClear: true,
            });
        });
    </script>
</body>

</html>