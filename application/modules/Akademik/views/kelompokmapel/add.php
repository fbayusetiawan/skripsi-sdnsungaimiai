<?php
$linkin = $this->uri->segment(1) . '/' . $this->uri->segment(2);
?>

<div class="row page-title">
    <div class="col-md-12">
        <nav aria-label="breadcrumb" class="float-right mt-1">
            <!-- <ol class="breadcrumb">
                <li><a href="<?= base_url($linkin . '/add') ?>" class="btn btn-success">Tambah Data</a></li>
            </ol> -->
        </nav>
        <h4 class="mb-1 mt-0">Tambah Data <?= $title ?></h4>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <form action="<?= base_url($linkin . '/addAction') ?>" method="post" class="needs-validation" enctype="multipart/form-data" novalidate>
                            <div class="form-group mb-3">
                                <label for="validationCustom01">Jenis Kelompok Mata Pelajaran</label>
                                <input type="text" class="form-control" name="jenisKelompokMapel" id="validationCustom01" required>
                                <div class="invalid-feedback">
                                    Harus diisi!
                                </div>
                            </div>

                            <div class="form-group mb-3">
                                <label for="validationCustom01">Nama Kelompok Mata Pelajaran</label>
                                <input type="text" class="form-control" name="namaKelompokMapel" id="validationCustom01" required>
                                <div class="invalid-feedback">
                                    Harus diisi!
                                </div>
                            </div>

                    </div>



                </div>
            </div>
        </div>
        <button class="btn btn-primary" type="submit">Simpan</button>
        <a href="<?= base_url($linkin) ?>" class="btn btn-danger">Kembali</a>
        </form>
    </div> <!-- end card-body -->
    </form>