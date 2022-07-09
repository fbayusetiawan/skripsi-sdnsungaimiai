<?php
$roleId = $this->session->userdata('roleId');
if (!empty($roleId)) :
    if ($roleId == 1) :
        redirect('admin');
    else :
        redirect('user');
    endif;
else :
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8" />
        <title>Login - Unit Produksi Grafika</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="<?= base_url() ?>/assets/assets/images/favicon.ico">

        <!-- App css -->
        <link href="<?= base_url() ?>/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url() ?>/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url() ?>/assets/css/app.min.css" rel="stylesheet" type="text/css" />

    </head>

    <body class="authentication-bg">

        <div class="account-pages mt-5 mb-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-5">
                        <div class="card">

                            <div class="card-body p-4">

                                <div class="text-center w-75 m-auto">
                                    <a href="index.html">
                                        <span><img src="<?= base_url() ?>/assets/images/grafika.png" alt="" height="100"></span>
                                    </a>
                                    <p class="text-muted mb-4 mt-3">Masukkan alamat email dan kata sandi Anda untuk mengakses panel admin.</p>
                                </div>
                                <?= $this->session->flashdata('message'); ?>

                                <form action="<?= base_url('Auth') ?>" method="POST">

                                    <div class="form-group mb-3">
                                        <label for="emailaddress">Email</label>
                                        <input class="form-control" type="text" name="email">
                                        <?= form_error('email', '<small class="text-danger">', '</small>') ?>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="password">Password</label>
                                        <input class="form-control" type="password" name="password">
                                        <?= form_error('password', '<small class="text-danger">', '</small>') ?>
                                    </div>



                                    <div class="form-group mb-0 text-center">
                                        <button class="btn btn-primary btn-block" type="submit"> Log In </button>
                                    </div>

                                </form>
                            </div> <!-- end card-body -->
                        </div>
                        <!-- end card -->



                    </div> <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end page -->


        <!-- App js -->
        <script src="<?= base_url() ?>/assets/js/vendor.min.js"></script>
        <script src="<?= base_url() ?>/assets/js/app.min.js"></script>

    </body>

    </html>
<?php endif; ?>