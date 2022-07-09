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
                                <label for="validationCustom01">Kode Mata Pelajaran</label>
                                <input type="text" class="form-control" name="kodeMapel" id="validationCustom01" required>
                                <div class="invalid-feedback">
                                    Harus diisi!
                                </div>
                            </div>

                            <div class="form-group mb-3">
                                <label for="validationCustom01">Kelompok Mata Pelajaran</label>
                                <select class="form-control" name="idKelompokMapel">
                                    <option value="">---Pilih Kelompok Mapel---</option>
                                    <?php foreach ($mapel as $mapel) { ?>
                                        <option value="<?php echo $mapel->idKelompokMapel; ?>"><?php echo $mapel->idKelompokMapel; ?> - <?= $mapel->namaKelompokMapel ?> </option>
                                    <?php } ?>
                                </select>
                                <div class="invalid-feedback">
                                    Harus diisi!
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label for="validationCustom01">Guru Pengampu</label>
                                <select class="form-control" name="nip">
                                    <option value="">---Pilih Guru Pengampu---</option>
                                    <?php foreach ($data as $row) { ?>
                                        <option value="<?php echo $row->nip; ?>"><?php echo $row->nip; ?> - <?= $row->namaGuru ?> </option>
                                    <?php } ?>
                                </select>
                                <div class="invalid-feedback">
                                    Harus diisi!
                                </div>
                            </div>
                            <!-- <div class="form-group mb-3">
                                <label for="validationCustom01">Kelompok Mata Pelajaran</label>
                                <div class="col">
                                    <?= form_dropdown('idKelompokMapel', array('1' => 'Kelompok A', '2' => 'Kelompok B'), '', 'class="form-control"'); ?>
                                </div>
                                <div class="invalid-feedback">
                                    Harus diisi!
                                </div>
                            </div> -->
                            <div class="form-group mb-3">
                                <label for="validationCustom01">Nama Mata Pelajaran</label>
                                <input type="text" class="form-control" name="namaMapel" id="validationCustom01" required>
                                <div class="invalid-feedback">
                                    Harus diisi!
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label for="validationCustom01">Jumlah Jam Mata Pelajaran</label>
                                <input type="text" class="form-control" name="jumlahJam" id="validationCustom01" required>
                                <div class="invalid-feedback">
                                    Harus diisi!
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label for="validationCustom01">Status</label>
                                <?= form_dropdown('isActive', array('0' => 'Tidak Aktif', '1' => 'Aktif'), '', 'class="form-control"') ?>
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