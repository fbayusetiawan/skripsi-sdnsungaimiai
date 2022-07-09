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
                <form class="needs-validation" novalidate="" action="<?= base_url($linkin . '/d_editAction/' . $this->uri->segment(4)) ?>" method="post">

                    <div class="form-group mb-3">
                        <label for="validationCustom01">Nama Ekstrakurikuler</label>
                        <?= cmb_dinamis('idEks', 'ekstrakulikuler', 'namaEks', 'idEks', $row->idEks) ?>
                        <div class="invalid-feedback">
                            Harus diisi!
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="validationCustom01">Keterangan Kegiatan</label>
                        <input type="text" name="namaKegiatan" value="<?= $row->namaKegiatan ?>" required class="form-control">
                        <div class="invalid-feedback">
                            Harus diisi!
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="validationCustom01">Lama Kegiatan</label>
                        <input type="number" value="<?= $row->lamaKegiatan ?>" name="lamaKegiatan" required class="form-control">
                        <div class="invalid-feedback">
                            Harus diisi!
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="validationCustom01">Biaya</label>
                        <input type="text" name="biaya" value="<?= $row->biaya ?>" required class="form-control uang">
                        <div class="invalid-feedback">
                            Harus diisi!
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="validationCustom01">Dari Dana</label>
                        <?= form_dropdown('jenisDana', array('1' => 'Bosda', '2' => 'Bosnas'), $row->jenisDana, 'class="form-control"') ?>
                        <div class="invalid-feedback">
                            Harus diisi!
                        </div>
                    </div>
                    <button class="btn btn-primary" type="submit">Simpan</button>
                    <a href="<?= base_url($linkin . '/detail') ?>" class="btn btn-danger">Kembali</a>
                </form>
            </div> <!-- end card-body-->
        </div>
    </div>
</div>