<?php
$linkin = $this->uri->segment(1) . '/' . $this->uri->segment(2);
?>

<div class="row page-title">
    <div class="col-md-12">
        <nav aria-label="breadcrumb" class="float-right mt-1">
            <!-- <ol class="breadcrumb">
                <li><a href="<?= base_url($ctrl . '/add') ?>" class="btn btn-success">Tambah Data</a></li>
            </ol> -->
        </nav>
        <h4 class="mb-1 mt-0">Edit Data <?= $title ?></h4>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <form class="needs-validation" novalidate="" action="<?= base_url($linkin . '/editAction/' . $this->uri->segment(4)) ?>" method="post">

                    <div class="form-group mb-3">
                        <label for="validationCustom01">Nama Lengkap</label>
                        <input type="text" class="form-control" value="<?= $row->namaLengkap ?>" name="namaLengkap" id="validationCustom01" required>
                        <div class="invalid-feedback">
                            Harus diisi!
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="validationCustom01">Username <small id="info"></small></label>
                        <input type="text" class="form-control" value="<?= $row->username ?>" name="username" id="username" onkeyup="cekUser()" required>
                        <div class="invalid-feedback">
                            Harus diisi!
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="validationCustom01">Password</label>
                        <input type="text" class="form-control" name="password" id="validationCustom01">
                        <div class="invalid-feedback">
                            Harus diisi!
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="validationCustom01">Email</label>
                        <input type="text" class="form-control" value="<?= $row->email ?>" name="email" id="validationCustom01" required>
                        <div class="invalid-feedback">
                            Harus diisi!
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="validationCustom01">No Whatsapp</label>
                        <input type="text" class="form-control" value="<?= $row->noWa ?>" name="noWa" id="validationCustom01" required>
                        <div class="invalid-feedback">
                            Harus diisi!
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="validationCustom01">Status</label>
                        <?= form_dropdown('isActive', array('0' => 'Tidak Aktif', '1' => 'Aktif'), $row->isActive, 'class="form-control"') ?>
                        <div class="invalid-feedback">
                            Harus diisi!
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="validationCustom01">Upload Foto</label>
                        <input type="file" class="form-control" name="foto" id="validationCustom01">
                    </div>

                    <button class="btn btn-primary" type="submit">Simpan</button>
                    <a href="<?= base_url($linkin) ?>" class="btn btn-danger">Kembali</a>
                </form>
            </div> <!-- end card-body-->
        </div>
    </div>
</div>