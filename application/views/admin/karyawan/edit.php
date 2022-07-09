<div class="card">
    <div class="card-body">
        <form class="needs-validation" novalidate="" action="<?= base_url('admin/karyawan_editAction/' . $this->uri->segment(3)) ?>" method="post">
            <div class="form-group mb-3">
                <label for="validationCustom01">No Identitas</label>
                <input type="text" class="form-control" value="<?= $row->noIdentitas ?>" name="noIdentitas" id="validationCustom01" required="">
                <div class="invalid-feedback">
                    Harus di isi.
                </div>
            </div>
            <div class="form-group mb-3">
                <label for="validationCustom01">Nama Karyawan</label>
                <input type="text" class="form-control" value="<?= $row->namaKaryawan ?>" name="namaKaryawan" id="validationCustom01" required="">
                <div class="invalid-feedback">
                    Harus di isi.
                </div>
            </div>
            <div class="form-group mb-3">
                <label for="validationCustom01">Tempat Lahir</label>
                <input type="text" class="form-control" value="<?= $row->tempatLahir ?>" name="tempatLahir" id="validationCustom01" required="">
                <div class="invalid-feedback">
                    Harus di isi.
                </div>
            </div>
            <div class="form-group mb-3">
                <label for="validationCustom01">Tanggal Lahir</label>
                <input type="date" class="form-control" value="<?= $row->tanggalLahir ?>" name="TanggalLahir" id="validationCustom01" required="">
                <div class="invalid-feedback">
                    Harus di isi.
                </div>
            </div>
            <div class="form-group mb-3">
                <label for="validationCustom01">Jenis Kelamin</label>
                <?= form_dropdown('jenkil', array('' => 'Pilih Jenis Kelamin', 'L' => 'Laki-laki', 'P' => 'Perempuan'), $row->jenkil, 'class="form-control" id="validationCustom01" required=""') ?>
                <div class="invalid-feedback">
                    Pilih Jenis Kelamin.
                </div>
            </div>
            <div class="form-group mb-3">
                <label for="validationCustom01">Agama</label>
                <select class="form-control" name="agama" id="validationCustom01" required="">
                    <option value="">Pilih Agama</option>
                    <option <?= $row->agama == '1' ? 'selected' : '' ?> value="1">Islam</option>
                    <option <?= $row->agama == '2' ? 'selected' : '' ?> value="2">Katolik</option>
                    <option <?= $row->agama == '3' ? 'selected' : '' ?> value="3">Protestan</option>
                    <option <?= $row->agama == '4' ? 'selected' : '' ?> value="4">Hindu</option>
                    <option <?= $row->agama == '5' ? 'selected' : '' ?> value="5">Budha</option>
                    <option <?= $row->agama == '6' ? 'selected' : '' ?> value="6">Kong Hu Cu</option>
                </select>
                <div class="invalid-feedback">
                    Pilih Agama.
                </div>
            </div>
            <div class="form-group mb-3">
                <label for="validationCustom01">Alamat</label>
                <input type="text" class="form-control" value="<?= $row->alamat ?>" name="alamat" id="validationCustom01" required="">
                <div class="invalid-feedback">
                    Harus di isi.
                </div>
            </div>
            <div class="form-group mb-3">
                <label for="validationCustom01">No Telepon</label>
                <input type="text" class="form-control" value="<?= $row->noTelp ?>" placeholder="08xx-xxxx-xxxx" data-toggle="input-mask" name="noTelp" data-mask-format="0000-0000-0000" maxlength="16" id="validationCustom01" required="">
                <div class="invalid-feedback">
                    Harus di isi.
                </div>
            </div>
            <div class="form-group mb-3">
                <label for="validationCustom01">Toko</label>
                <?= cmb_dinamis('idToko', 'toko', 'namaToko', 'idToko', $row->idToko, 'id="validationCustom01" required=""') ?>
                <div class="invalid-feedback">
                    Pilih Toko.
                </div>
            </div>

            <button class="btn btn-primary" type="submit">Simpan</button>
            <a href="<?= base_url('admin/karyawan') ?>" class="btn btn-danger">Kembali</a>
        </form>

    </div> <!-- end card-body-->
</div>