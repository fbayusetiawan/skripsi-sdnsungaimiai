<div class="card">
    <div class="card-body">
        <form class="needs-validation" novalidate="" action="<?= base_url('admin/user_editAction/' . $this->uri->segment(3)) ?>" method="post">

            <div class="form-group mb-3">
                <label for="validationCustom01">Nama</label>
                <?= cmb_dinamis('idKaryawan', 'karyawan', 'namaKaryawan', 'idKaryawan', $row->idKaryawan, 'id="validationCustom01" required=""') ?>
                <div class="invalid-feedback">
                    Harus di isi.
                </div>
            </div>
            <div class="form-group mb-3">
                <label for="validationCustom01">Email</label>
                <input type="email" class="form-control" value="<?= $row->email ?>" name="email" id="emailaddress" required="">
                <div class="invalid-feedback">
                    Harus di isi.
                </div>
            </div>
            <div class="form-group mb-3">
                <label for="validationCustom01">Password</label>
                <input type="text" class="form-control" name="password" id="validationCustom01" required="">
                <div class="invalid-feedback">
                    Harus di isi.
                </div>
            </div>
            <div class="form-group mb-3">
                <label for="validationCustom01">Role</label>
                <?= cmb_dinamis('roleId', 'role', 'Role', 'idRole', $row->roleId, 'id="validationCustom01" required=""') ?>
                <div class="invalid-feedback">
                    Harus di isi.
                </div>
            </div>
            <div class="form-group mb-3">
                <label for="validationCustom01">Status</label>
                <?= form_dropdown('isActive', array('1' => 'Aktif', '0' => 'Tidak Aktif'), $row->isActive, 'class="form-control"') ?>
                <div class="invalid-feedback">
                    Harus di isi.
                </div>
            </div>
            <div class="form-group mb-3">
                <label for="validationCustom01">Toko</label>
                <?= cmb_dinamis('idToko', 'toko', 'namaToko', 'idToko', $row->idToko) ?>
                <div class="invalid-feedback">
                    Harus di isi.
                </div>
            </div>

            <button class="btn btn-primary" type="submit">Simpan</button>
            <a href="<?= base_url('admin/user') ?>" class="btn btn-danger">Kembali</a>
        </form>

    </div> <!-- end card-body-->
</div>