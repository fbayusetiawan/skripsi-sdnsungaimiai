<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Register - SMA Negeri Bumi Makmur</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="<?= base_url() ?>assets/images/favicon.ico">

    <!-- App css -->
    <link href="<?= base_url() ?>assets/css/bootstrap-dark.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>assets/css/app.min.css" rel="stylesheet" type="text/css" />

</head>

<body class="authentication-bg">

    <div class="account-pages my-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-body p-0">
                            <div class="row">
                                <div class="col-lg-12 p-5">
                                    <div class="mx-auto mb-5">
                                        <a href="index.html">
                                            <img src="<?= base_url() ?>assets/images/logo.png" alt="" height="24" />
                                            <h3 class="d-inline align-middle ml-1 text-logo">SMA Negeri Bumi Makmur</h3>
                                        </a>
                                    </div>

                                    <h6 class="h5 mb-0 mt-4">Create your account</h6>
                                    <p class="text-muted mt-0 mb-4">Create an account easily and start using the myPerpus Application.</p>

                                    <form action="<?= base_url('auth/register/add_action') ?>" method="Post" class="needs-validation authentication-form" novalidate>
                                        <div class="form-group">
                                            <label for="validationCustom01" class="form-control-label">NIS</label>
                                            <div class="input-group input-group-merge">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="icon-dual" data-feather="user"></i>
                                                    </span>
                                                </div>
                                                <input type="text" id="validationCustom01" name="nis" class="form-control" required>
                                                <div class="invalid-feedback">
                                                    Silahkan Masukkan NIS
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="validationCustom01" class="form-control-label">Nama Lengkap</label>
                                            <div class="input-group input-group-merge">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="icon-dual" data-feather="user"></i>
                                                    </span>
                                                </div>
                                                <input type="text" id="validationCustom01" name="namaLengkap" class="form-control" required>
                                                <div class="invalid-feedback">
                                                    Silahkan Masukkan Nama Lengkap
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="validationCustom01" class="form-control-label">Jenis Kelamin</label>
                                            <div class="input-group input-group-merge">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="icon-dual" data-feather="user"></i>
                                                    </span>
                                                </div>
                                                <?= form_dropdown('jk', array('1' => 'Laki-laki', '2' => 'Perempuan'), '', 'class="form-control"') ?>

                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="validationCustom01" class="form-control-label">Jurusan</label>
                                            <div class="input-group input-group-merge">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="icon-dual" data-feather="user"></i>
                                                    </span>
                                                </div>
                                                <?= cmb_dinamis('idJurusan', 'jurusan', 'namaJurusan', 'idJurusan') ?>

                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="validationCustom01" class="form-control-label">No Whatsapp</label>
                                            <div class="input-group input-group-merge">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="icon-dual" data-feather="phone"></i>
                                                    </span>
                                                </div>
                                                <input type="number" class="form-control" name="noWa" id="validationCustom01" required>
                                                <div class="invalid-feedback">
                                                    Silahkan Masukkan No Whatsapp
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group ">
                                            <label for="validationCustom01" class="form-control-label">Password</label>
                                            <div class="input-group input-group-merge">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="icon-dual" data-feather="lock"></i>
                                                    </span>
                                                </div>
                                                <input type="password" class="form-control" name="password" required id="validationCustom01">
                                                <div class="invalid-feedback">
                                                    Silahkan Masukkan Password
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group mb-4">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="checkbox-signup">
                                                <label class="custom-control-label" for="checkbox-signup">
                                                    I accept <a href="javascript: void(0);">Terms and Conditions</a>
                                                </label>
                                            </div>
                                        </div>

                                        <div class="form-group mb-0 text-center">
                                            <button class="btn btn-primary btn-block" type="submit">Sign Up</button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                        </div> <!-- end card-body -->
                    </div>
                    <!-- end card -->

                    <div class="row mt-3">
                        <div class="col-12 text-center">
                            <p class="text-muted">Already have account? <a href="<?= base_url('auth/login') ?>" class="text-primary font-weight-bold ml-1">Login</a></p>
                        </div> <!-- end col -->
                    </div>
                    <!-- end row -->

                </div> <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end page -->

    <!-- Vendor js -->
    <script src="<?= base_url() ?>assets/js/vendor.min.js"></script>

    <!-- App js -->
    <script src="<?= base_url() ?>assets/js/app.min.js"></script>

    <script src="<?= base_url() ?>assets/js/pages/form-validation.init.js"></script>

</body>

</html>