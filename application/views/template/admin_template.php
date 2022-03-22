<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title ?> | RELOKER BALI</title>
    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url() ?>assets/job_template/img/favicon.png">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/adminlte.min.css">
    <!-- DATATABLE -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <!-- SELECTPICKER -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/bootstrap-select/bootstrap-select.css">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/sweetalert2/sweetalert2.min.css">
    <!-- SELECT2 -->
    <link href="<?= base_url() ?>assets/plugins/select2/css/select2.min.css" rel="stylesheet">
    <!-- TRIX EDITOR -->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/trix.css">
    <script type="text/javascript" src="<?= base_url() ?>assets/js/trix.js"></script>
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/bootstrap-datepicker/bootstrap-datepicker.css">

    <!-- MYCSS -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/admin_style.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/myselect2.css">

    <!-- jQuery -->
    <script src="<?= base_url() ?>assets/plugins/jquery/jquery.min.js"></script>
    <script src="<?= base_url() ?>assets/js/bootstrap-datepicker/bootstrap-datepicker.js"></script>
</head>

<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" data-toggle="modal" data-target="#logoutModal" class="nav-link">
                        <i class="bg- fas fa-sign-out-alt"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="<?= base_url() ?>admin" class="brand-link">
                <img src="<?= base_url() ?>assets/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-bolder">RELOKER BALI</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="<?= base_url() ?>assets/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="<?= base_url() ?>admin/profile" class="d-block"><?= $admin['nama_admin'] ?></a>
                    </div>
                </div>


                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item">
                            <a href="<?= base_url() ?>admin" class="nav-link <?= $this->uri->segment(1) == 'admin' && $this->uri->segment(2) != 'user'  ? "active" : "" ?>">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        <li class="nav-header mt-2">MASTER DATA</li>
                        <li class="nav-item">
                            <a href="<?= base_url() ?>kategori" class="nav-link <?= $this->uri->segment(1) == 'kategori' ? "active" : "" ?>">
                                <i class="nav-icon fas fa-th-list"></i>
                                <p>
                                    Kategori
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url() ?>keahlian" class="nav-link <?= $this->uri->segment(1) == 'keahlian' ? "active" : "" ?>">
                                <i class="nav-icon fas fa-fw fa-walking"></i>
                                <p>
                                    Keahlian
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url() ?>alternatif" class="nav-link <?= $this->uri->segment(1) == 'alternatif' ? "active" : "" ?>">
                                <i class="nav-icon fas fa-briefcase"></i>
                                <p>
                                    Lowongan Kerja
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url() ?>kriteria" class="nav-link <?= $this->uri->segment(1) == 'kriteria' ? "active" : "" ?>">
                                <i class="nav-icon far fa-fw fa-list-alt"></i>
                                <p>
                                    Kriteria
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url() ?>parameter" class="nav-link <?= $this->uri->segment(1) == 'parameter' ? "active" : "" ?>">
                                <i class="nav-icon fas fa-fw fa-clipboard-list"></i>
                                <p>
                                    Parameter
                                </p>
                            </a>
                        </li>



                        <li class="nav-header mt-3">INFORMATION</li>
                        <li class="nav-item">
                            <a href="<?= base_url() ?>admin/user" class="nav-link <?= $this->uri->segment(1) == 'admin' && $this->uri->segment(2) == 'user'  ? "active" : "" ?>"">
                                <i class=" nav-icon fas fa-fw fa-users"></i>
                                <p>
                                    User Pencari Kerja
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>


        <div class="content-wrapper">
            <div class="flash-data" data-flashdata="<?= $this->session->flashdata('pesan'); ?>"></div>
            <?= $contens ?>
        </div>


        <footer class="main-footer">
            <strong>Copyright &copy; <?= date('Y') ?> RELOKER BALI</strong> All rights reserved.
        </footer>
        <aside class="control-sidebar control-sidebar-dark"></aside>
    </div>



    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Logout</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Apakah anda yakin untuk keluar dari aplikasi?</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-danger" href="<?= base_url() ?>auth_admin/logout">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="<?= base_url() ?>assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url() ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url() ?>assets/js/adminlte.min.js"></script>
    <!-- DATA TABLE -->
    <script src="<?= base_url() ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url() ?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?= base_url() ?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?= base_url() ?>assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <!-- SWEETALERT2 -->
    <script src="<?= base_url() ?>assets/plugins/sweetalert2/sweetalert2.all.min.js"></script>
    <!-- SELECT PICKER -->
    <script src="<?= base_url() ?>assets/js/bootstrap-select/bootstrap-select.js"></script>
    <script src="<?= base_url() ?>assets/js/select/defaults-id_ID.min.js"></script>
    <!-- SELECT2 -->
    <script src="<?= base_url() ?>assets/plugins/select2/js/select2.full.min.js"></script>
    <!-- FileStyle -->
    <script type="text/javascript" src="<?= base_url() ?>assets/js/bootstrap-filestyle/bootstrap-filestyle.min.js"> </script>
    <!-- MYJS -->
    <script src="<?= base_url() ?>assets/js/myjs.js"></script>
    <script>
        $(document).ready(function() {
            $('.select2').select2({
                width: '100%',
                // theme: "classic",
                placeholder: "PIlih Keahlian",
                allowClear: true
            });
        });
    </script>
</body>

</html>