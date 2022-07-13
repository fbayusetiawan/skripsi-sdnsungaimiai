<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>SD Negeri Standar Nasional Sungai Miai 5 Banjarmasin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="<?= base_url() ?>assets/images/tutwurihanda.png">

    <!-- plugins -->
    <link href="<?= base_url() ?>assets/libs/flatpickr/flatpickr.min.css" rel="stylesheet" type="text/css" />

    <!-- App css -->
    <link href="<?= base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>assets/css/app.min.css" rel="stylesheet" type="text/css" />

    <link href="<?= base_url() ?>assets/libs/bootstrap-tagsinput/bootstrap-tagsinput.css" rel="stylesheet" />
    <link href="<?= base_url() ?>assets/libs/select2/select2.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>assets/libs/multiselect/multi-select.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>assets/libs/flatpickr/flatpickr.min.css" rel="stylesheet" type="text/css" />
    <!-- <link href="<?= base_url() ?>assets/libs/bootstrap-colorpicker/bootstrap-colorpicker.min.css" rel="stylesheet" type="text/css" /> -->
    <link href="<?= base_url() ?>assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.css" rel="stylesheet" type="text/css" />


</head>

<body data-layout="topnav">
    <!-- Begin page -->
    <div class="wrapper">

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <!-- Topbar Start -->
        <div class="navbar navbar-expand flex-column flex-md-row navbar-custom">
            <div class="container-fluid">
                <!-- LOGO -->
                <a href="index.html" class="navbar-brand mr-0 mr-md-2 logo">
                    <span class="logo-lg">
                        <img src="<?= base_url() ?>assets/images/tutwurihanda.png" alt="" height="24" />
                        <span class="d-inline h5 ml-1 text-logo">SD Negeri Standar Nasional Sungai Miai 5 Banjarmasin</span>
                    </span>
                    <span class="logo-sm">
                        <img src="<?= base_url() ?>assets/images/tutwurihanda.png" alt="" height="24">
                    </span>
                </a>

                <ul class="navbar-nav bd-navbar-nav flex-row list-unstyled menu-left mb-0">
                    <li class="">
                        <button class="button-menu-mobile open-left disable-btn">
                            <i data-feather="menu" class="menu-icon"></i>
                            <i data-feather="x" class="close-icon"></i>
                        </button>
                    </li>
                </ul>

                <ul class="navbar-nav flex-row ml-auto d-flex list-unstyled topnav-menu float-right mb-0">
                    <!-- <li class="d-none d-sm-block">
                        <div class="app-search">
                            <form>
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search...">
                                    <span data-feather="search"></span>
                                </div>
                            </form>
                        </div>
                    </li> -->

                    <li class="dropdown notification-list align-self-center profile-dropdown">
                        <a class="nav-link dropdown-toggle nav-user mr-0" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                            <div class="media user-profile ">
                                <img src="<?= base_url() ?>assets/images/tutwurihanda.png" alt="user-image" class="rounded-circle align-self-center" />
                                <div class="media-body text-left">
                                    <h6 class="pro-user-name ml-2 my-0">
                                        <span><?= $row->namaSiswa ?></span>
                                        <span class="pro-user-desc text-muted d-block mt-1">NISN : <?= $this->session->userdata('nisn') ?> </span>
                                    </h6>
                                </div>
                                <span data-feather="chevron-down" class="ml-2 align-self-center"></span>
                            </div>
                        </a>
                        <div class="dropdown-menu profile-dropdown-items dropdown-menu-right">


                            <a href="<?= base_url('Auth/Logout') ?>" class="dropdown-item notify-item">
                                <i data-feather="log-out" class="icon-dual icon-xs mr-2"></i>
                                <span>Logout</span>
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <!-- end Topbar -->

        <div class="topnav shadow-sm">
            <div class="container-fluid">
                <nav class="navbar navbar-light navbar-expand-lg topbar-nav">
                    <div class="collapse navbar-collapse" id="topnav-menu-content">
                        <ul class="metismenu" id="menu-bar">
                            <li class="menu-title">Navigation</li>

                            <li>
                                <a href="<?= base_url('Home/Dashboard') ?>">
                                    <i data-feather="home"></i>
                                    <span class="badge badge-success float-right">1</span>
                                    <span> Dashboard </span>
                                </a>
                            </li>
                            <li>
                                <a href="<?= base_url('Home/Jadwalsiswa') ?>">
                                    <i data-feather="book"></i>
                                    <span class="badge badge-success float-right">1</span>
                                    <span> Jadwal Pelajaran </span>
                                </a>
                            </li>
                            <li class="menu-title">Apps</li>
                            <li>
                                <a href="<?= base_url('Home/Nilairaporsiswa') ?>">
                                    <i data-feather="printer"></i>
                                    <span>Laporan Nilai Siswa</span>

                                </a>
                            </li>
                            <!-- <?php if ($cek->validate == '0') : ?> -->

                        <?php else : ?>
                            <li>
                                <a href="javascript: void(0);">
                                    <i data-feather="briefcase"></i>
                                    <span>Hibah</span>
                                    <span class="menu-arrow"></span>
                                </a>

                               
                            </li>
                            <!-- <li>
                                            <a href="<?= base_url('Home/Cekplagiat') ?>">
                                                <i data-feather="home"></i>
                                                <span class="badge badge-success float-right">1</span>
                                                <span> Cek Plagiat </span>
                                            </a>
                                        </li> -->
                        <?php endif ?>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>


        <div class="content-page">
            <div class="content">
                <!-- Start Content-->
                <div class="container-fluid">
                    <div class="row page-title">
                        <div class="col-sm-4 col-xl-6">
                            <h4 class="mb-1 mt-0"><?= $pageTitle ?></h4>
                        </div>
                    </div>
                    <?= $this->session->flashdata('message'); ?>

                    <?= $contents ?>

                </div>
            </div>
            <!-- Footer Start -->
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <center> &copy; SMP Negeri 2 Muara Uya. All Rights Reserved.</center>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- end Footer -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->
    </div>
    <div class=" rightbar-overlay"></div>

    <script src="<?= base_url() ?>assets/js/vendor.min.js"></script>
    <script src="<?= base_url() ?>assets/libs/moment/moment.min.js"></script>
    <script src="<?= base_url() ?>assets/sweetalert/dist/sweetalert2.all.min.js"></script>
    <script src="<?= base_url() ?>assets/libs/flatpickr/flatpickr.min.js"></script>
    <!-- App js -->
    <script src="<?= base_url() ?>assets/js/app.min.js"></script>
    <script src="<?= base_url() ?>assets/mask/vendor/igorescobar/jquery-mask-plugin/dist/jquery.mask.min.js"></script>

    <!-- <script src="<?= base_url() ?>assets/libs/bootstrap-colorpicker/bootstrap-colorpicker.min.js"></script> -->
    <!-- <script src="<?= base_url() ?>assets/libs/bootstrap-tagsinput/bootstrap-tagsinput.min.js"></script> -->
    <script src="<?= base_url() ?>assets/libs/select2/select2.min.js"></script>
    <script src="<?= base_url() ?>assets/libs/multiselect/jquery.multi-select.js"></script>
    <script src="<?= base_url() ?>assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
    <!-- <script src="<?= base_url() ?>assets/js/pages/form-advanced.init.js"></script> -->
    <script>
        $(document).ready(function() {
            $('.uang').mask('000.000.000', {
                reverse: true
            });

            $('.wa').mask('62-000-0000-00000');
            $('.nip').mask('00000000000000000000');
        })
        $('.delete-data').on('click', function(e) {
            e.preventDefault();
            const href = $(this).attr('href');
            const na = $(this).attr('id');
            swal({
                title: 'Apakah Anda Yakin?',
                text: "Semua Data Yang Berhubungan Dengan " + na + " Akan Di Hapus...",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Hapus'
            }).then((result) => {
                if (result.value) {
                    document.location.href = href;
                }
            })
        });
    </script>
</body>

</html>