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
                        <label for="validationCustom01">Tahun Ajaran</label>
                        <?= cmb_dinamis('kodeTahun', 'tahun_akademik', 'namaTahun', 'kodeTahun', $selected = $row->kodeTahun, '') ?>
                        </select>
                        <div class="invalid-feedback">
                            Harus diisi!
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label for="validationCustom01">Hari</label>
                        <select class="form-control" name="namaHari">
                            <option value="">--Pilih Hari--</option>
                            <option value="Senin" <?php if ($row->namaHari == 'Senin') {
                                                        echo 'selected';
                                                    } ?>>Senin</option>
                            <option value="Selasa" <?php if ($row->namaHari == 'Selasa') {
                                                        echo 'selected';
                                                    } ?>>Selasa</option>
                            <option value="Rabu" <?php if ($row->namaHari == 'Rabu') {
                                                        echo 'selected';
                                                    } ?>>Rabu</option>
                            <option value="Kamis" <?php if ($row->namaHari == 'Kamis') {
                                                        echo 'selected';
                                                    } ?>>Kamis</option>
                            <option value="Jumat" <?php if ($row->namaHari == 'Jumat') {
                                                        echo 'selected';
                                                    } ?>>Jumat</option>
                            <option value="Sabtu" <?php if ($row->namaHari == 'Sabtu') {
                                                        echo 'selected';
                                                    } ?>>Sabtu</option>
                        </select>
                        <div class="invalid-feedback">
                            Harus diisi!
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label for="validationCustom01">Kelas</label>
                        <?= cmb_dinamis('kodeKelas', 'kelas', 'namaKelas', 'kodeKelas', $selected = $row->kodeKelas, '') ?>
                        </select>
                        <div class="invalid-feedback">
                            Harus diisi!
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label for="validationCustom01">Mata Pelajaran</label>
                        <?= cmb_dinamis('kodeMapel', 'mata_pelajaran', 'namaMapel', 'kodeMapel', $selected = $row->kodeMapel, '') ?>
                        </select>
                        <div class="invalid-feedback">
                            Harus diisi!
                        </div>
                    </div>

                    <!-- <div class="form-group mb-3">
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
                    </div> -->

                    <div class="form-group mb-6">
                        <label for="validationCustom01">Jam Mulai</label>
                        <input class="form-control" id="example-time" type="time" name="jamMulai" value="<?= $row->jamMulai ?>">
                        <div class="invalid-feedback">
                            Harus diisi!
                        </div>
                    </div>

                    <div class="form-group mb-6">
                        <label for="validationCustom01">Jam Selesai</label>
                        <input class="form-control" id="example-time" value="<?= $row->jamSelesai ?>" type="time" name="jamSelesai">
                        <div class="invalid-feedback">
                            Harus diisi!
                        </div>
                    </div>

                    <button class="btn btn-primary" type="submit">Simpan</button>
                    <a href="<?= base_url($linkin) ?>" class="btn btn-danger">Kembali</a>
                </form>
            </div> <!-- end card-body-->
        </div>
    </div>
</div>