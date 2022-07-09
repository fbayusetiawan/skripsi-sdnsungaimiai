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
                        <label for="validationCustom01">NIK/NIP/NIH</label>
                        <input type="text" class="form-control nip" value="<?= $row->nip ?>" name="nip" id="nip" onkeyup="cek()" required>
                        <div class="invalid-feedback">
                            Harus diisi!
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="validationCustom01">Nama Lengkap</label>
                        <input type="text" class="form-control" value="<?= $row->namaLengkap ?>" name="namaLengkap" required>
                        <div class="invalid-feedback">
                            Harus diisi!
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="validationCustom01">Jenis Kelamin</label>
                        <?= form_dropdown('jk', array('1' => 'Laki-laki', '2' => 'Perempuan'), $row->jk, 'class="form-control"') ?>
                        <div class="invalid-feedback">
                            Harus diisi!
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="validationCustom01">Agama</label>
                        <?= form_dropdown('agama', array('1' => 'Islam', '2' => 'Protestan', '3' => 'Katolik', '4' => 'Hindu', '5' => 'Budha', '6' => 'Kong Hu Chu'), $row->agama, 'class="form-control"') ?>
                        <div class="invalid-feedback">
                            Harus diisi!
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="validationCustom01">e-mail</label>
                        <input type="email" class="form-control" value="<?= $row->email ?>" name="email" required>
                        <div class="invalid-feedback">
                            Harus diisi!
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="validationCustom01">Nomor Whatsapp</label>
                        <input type="text" class="form-control wa" value="<?= $row->noWa ?>" name="noWa" required>
                        <div class="invalid-feedback">
                            Harus diisi!
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="validationCustom01">Status</label>
                        <?= form_dropdown('status', array('1' => 'Pegawai Tetap', '0' => 'Pegawai Tidak Tetap'), $row->status, 'class="form-control"') ?>
                        <div class="invalid-feedback">
                            Harus diisi!
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="validationCustom01">Pangkat</label>
                        <?= cmb_dinamis('pangkat', 'pangkat', 'pangkat', 'idPangkat', $row->idPangkat) ?>
                        <div class="invalid-feedback">
                            Harus diisi!
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="validationCustom01">Golongan</label>
                        <?= cmb_dinamis('golongan', 'golongan', 'golongan', 'idGol', $row->idGolongan) ?>
                        <div class="invalid-feedback">
                            Harus diisi!
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="validationCustom01">Jabatan</label>
                        <input type="text" class="form-control" value="<?= $row->jabatan ?>" name="jabatan" required>
                        <div class="invalid-feedback">
                            Harus diisi!
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="validationCustom01">Alamat</label>
                        <textarea name="alamat" cols="30" rows="4" required class="form-control"><?= $row->alamat ?></textarea>
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