<?php
$this->db->where('status', '1');
$ta = $this->db->get('tahunajaran')->row();

$array = array(
    'idta' => $ta->idTahunAjaran
);

$this->session->set_userdata($array);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>SD Negeri SN Sungai Miai 5 Banjarmasin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="<?= base_url() ?>assets/images/tutwurihanda.png">

    <!-- plugins -->
    <!-- <link href="<?= base_url() ?>assets/libs/flatpickr/flatpickr.min.css" rel="stylesheet" type="text/css" /> -->

    <!-- App css -->
    <link href="<?= base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>assets/css/app.min.css" rel="stylesheet" type="text/css" />

    <!-- plugin Datatables -->
    <link href="<?= base_url() ?>assets/libs/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>assets/libs/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>assets/libs/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>assets/libs/datatables/select.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <!-- Kalender css -->
    <link href="<?= base_url() ?>assets/libs/fullcalendar-core/main.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>assets/libs/fullcalendar-daygrid/main.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>assets/libs/fullcalendar-bootstrap/main.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>assets/libs/fullcalendar-timegrid/main.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>assets/libs/fullcalendar-list/main.min.css" rel="stylesheet" type="text/css" />

</head>

<body>
    <!-- Begin page -->
    <div id="wrapper">

        <!-- Topbar Start -->
        <div class="navbar navbar-expand flex-column flex-md-row navbar-custom">
            <div class="container-fluid">
                <!-- LOGO -->
                <a href="index.html" class="navbar-brand mr-0 mr-md-2 logo">
                    <span class="logo-lg">
                        <img src="<?= base_url() ?>assets/images/tutwurihanda.png" alt="" height="50" />
                        <span class="d-inline h5 ml-1 text-logo">Sekolah Dasar Negeri Standar Nasional Sungai Miai 5 Banjarmasin</span>
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
                </ul>
            </div>

        </div>
        <!-- end Topbar -->

        <?php include('sidebar.php') ?>

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="content-page">
            <div class="content">
                <div class="container-fluid">
                    <br>
                    <?= $this->session->flashdata('message'); ?>

                    <?= $contents ?>
                </div>
            </div>



            <!-- Footer Start -->
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            2022 &copy; SD Negeri Standar Nasional Sungai Miai 5 Banjarmasin. All Rights Reserved.
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
    <!-- END wrapper -->



    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>

    <!-- Vendor js -->
    <script src="<?= base_url() ?>assets/js/vendor.min.js"></script>

    <!-- optional plugins -->
    <script src="<?= base_url() ?>assets/libs/moment/moment.min.js"></script>
    <script src="<?= base_url() ?>assets/libs/apexcharts/apexcharts.min.js"></script>
    <script src="<?= base_url() ?>assets/libs/flatpickr/flatpickr.min.js"></script>

    <!-- page js -->
    <!-- <script src="<?= base_url() ?>assets/js/pages/dashboard.init.js"></script> -->

    <!-- App js -->
    <script src="<?= base_url() ?>assets/js/app.min.js"></script>
    <script src="<?= base_url() ?>assets/mask/vendor/igorescobar/jquery-mask-plugin/dist/jquery.mask.min.js"></script>
    <script src="<?= base_url() ?>assets/sweetalert/dist/sweetalert2.all.min.js"></script>
    <!-- datatable js -->
    <script src="<?= base_url() ?>assets/libs/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url() ?>assets/libs/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="<?= base_url() ?>assets/libs/datatables/dataTables.responsive.min.js"></script>
    <script src="<?= base_url() ?>assets/libs/datatables/responsive.bootstrap4.min.js"></script>

    <script src="<?= base_url() ?>assets/libs/datatables/dataTables.buttons.min.js"></script>
    <script src="<?= base_url() ?>assets/libs/datatables/buttons.bootstrap4.min.js"></script>
    <script src="<?= base_url() ?>assets/libs/datatables/buttons.html5.min.js"></script>
    <script src="<?= base_url() ?>assets/libs/datatables/buttons.flash.min.js"></script>
    <script src="<?= base_url() ?>assets/libs/datatables/buttons.print.min.js"></script> -->

    <script src="<?= base_url() ?>assets/libs/datatables/dataTables.keyTable.min.js"></script>
    <script src="<?= base_url() ?>assets/libs/datatables/dataTables.select.min.js"></script>

    <!-- Datatables init -->
    <script src="<?= base_url() ?>assets/js/pages/datatables.init.js"></script>

    <!-- plugin js -->
    <script src="<?= base_url() ?>assets/libs/moment/moment.min.js"></script>
    <script src="<?= base_url() ?>assets/libs/fullcalendar-core/main.min.js"></script>
    <script src="<?= base_url() ?>assets/libs/fullcalendar-bootstrap/main.min.js"></script>
    <script src="<?= base_url() ?>assets/libs/fullcalendar-daygrid/main.min.js"></script>
    <script src="<?= base_url() ?>assets/libs/fullcalendar-timegrid/main.min.js"></script>
    <script src="<?= base_url() ?>assets/libs/fullcalendar-list/main.min.js"></script>
    <script src="<?= base_url() ?>assets/libs/fullcalendar-interaction/main.min.js"></script>

    <!-- Calendar init -->
    <script src="<?= base_url() ?>assets/js/pages/calendar.init.js"></script>



    <script>
        $(document).ready(function() {
            $('.uang').mask('000.000.000', {
                reverse: true
            });

            $('.wa').mask('0000-0000-00000');
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