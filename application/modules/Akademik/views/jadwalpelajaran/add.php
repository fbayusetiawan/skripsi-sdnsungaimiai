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
                                <label for="validationCustom01">Tahun Ajaran</label>
                                <select class="form-control" name="kodeTahun">
                                    <option value="">--Tahun Ajaran--</option>
                                    <?php foreach ($tahun as $tahun) { ?>
                                        <option value="<?php echo $tahun->idTahunAjaran; ?>"><?php echo $tahun->idTahunAjaran; ?> - <?= $tahun->tahunAjaran ?> </option>
                                    <?php } ?>
                                </select>
                                <div class="invalid-feedback">
                                    Harus diisi!
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label for="validationCustom01">Hari </label>
                                <?= form_dropdown('namaHari', fd_hari(), '', 'class="form-control"') ?>
                                <div class="invalid-feedback">
                                    Harus diisi!
                                </div>
                            </div>

                            <div class="form-group mb-3">
                                <label for="validationCustom01">Kelas</label>
                                <select class="form-control" name="kodeKelas">
                                    <option value="">--Pilih Kelas--</option>
                                    <?php foreach ($kelas as $kelas) { ?>
                                        <option value="<?php echo $kelas->kodeKelas; ?>"><?= $kelas->namaKelas ?> </option>
                                    <?php } ?>
                                </select>
                                <div class="invalid-feedback">
                                    Harus diisi!
                                </div>
                            </div>

                            <div class="form-group mb-3">
                                <label for="validationCustom01">Mata Pelajaran</label>
                                <select class="form-control" name="kodeMapel">
                                    <option value="">--Pilih Mata Pelajaran--</option>
                                    <?php foreach ($mapel as $mapel) { ?>
                                        <option value="<?php echo $mapel->kodeMapel; ?>"><?php echo $mapel->kodeMapel; ?> - <?= $mapel->namaMapel ?> - (<?= $mapel->nip ?>) <?= $mapel->namaGuru ?> </option>
                                    <?php } ?>
                                </select>
                                <div class="invalid-feedback">
                                    Harus diisi!
                                </div>
                            </div>

                            <div class="form-group mb-6">
                                <label for="validationCustom01">Jam Mulai</label>
                                <input class="form-control" id="example-time" type="time" name="jamMulai">
                                <div class="invalid-feedback">
                                    Harus diisi!
                                </div>
                            </div>

                            <div class="form-group mb-6">
                                <label for="validationCustom01">Jam Selesai</label>
                                <input class="form-control" id="example-time" type="time" name="jamSelesai">
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