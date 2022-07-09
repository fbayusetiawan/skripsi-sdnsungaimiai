<?php
$linkin = $this->uri->segment(1) . '/' . $this->uri->segment(2);

?>

<div class="row page-title">
    <div class="col-md-12">


        <h4 class="mb-1 mt-0">Edit Data <?= $title ?></h4>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-3">
            <div class="card">
                <div class="card-body">
                    <div class="text-center mt-3">
                        <img src="<?= base_url('upload/' . $row->foto) ?>" alt="" class="avatar-lg rounded-circle" />
                        <h5 class="mt-2 mb-0"><?= $row->namaGuru ?></h5>
                        <h6 class="text-muted font-weight-normal mt-2 mb-0">NIP : <?= $row->nip ?>
                            <h6 class="text-muted font-weight-normal mt-2 mb-0">Jabatan : <?= $row->jenisPtk ?>
                            </h6>
                            <!-- <h6>
                            <th scope="row">Status Siswa :</th>
                        </h6> -->
                            <!-- <h6 class="text-muted font-weight-normal mt-1 mb-4">San Francisco, CA</h6> -->

                            <!-- <a href="<?= base_url($linkin . '/edit/' . $row->idSiswa) ?>"> <button type="button" class="btn btn-primary btn-sm mr-1">Edit Profil</button></a> -->

                            <!-- <button type="button" class="btn btn-white btn-sm">Message</button> -->
                    </div>
                    <div class="mt-3 pt-2 border-top">
                        <!-- <h4 class="mb-3 font-size-15">Contact Information</h4> -->
                        <div class="table-responsive">
                            <table class="table table-borderless mb-0 text-muted">
                                <tbody>
                                    <tr>
                                        <th scope="row">Status Guru :</th>
                                        <td><?= $row->statusGuru == '1' ? 'Aktif' : 'Tidak Aktif' ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
            <!-- end card -->

        </div>

        <div class="col-lg-9">
            <div class="card">
                <div class="card-body">
                    <ul class="nav nav-pills navtab-bg nav-justified" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="pills-activity-tab" data-toggle="pill" href="#pills-activity" role="tab" aria-controls="pills-activity" aria-selected="true">
                                Data Diri
                            </a>

                        </li>

                    </ul>

                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-activity" role="tabpanel" aria-labelledby="pills-activity-tab">
                            <h5 class="mt-1"></h5>

                            <form class="row g-4 needs-validation" novalidate="" action="<?= base_url($linkin . '/editAction/' . $this->uri->segment(4)) ?>" id="mydata" method="post">

                                <div class="col-md-6 mt-3">
                                    <label for="inputAddress" class="form-label">NIP</label>
                                    <input type="text" class="form-control" name="nip" value="<?= $row->nip ?>" required>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="inputAddress" class="form-label">NIK</label>
                                    <input type="text" class="form-control" name="nik" value="<?= $row->nik ?>" required>
                                </div>
                                <!-- <div class="col-md-6 mt-3">
                                    <label for="inputAddress" class="form-label">Password</label>
                                    <input type="password" class="form-control" name="password" value="" required>
                                </div> -->
                                <div class="col-md-6 mt-3">
                                    <label for="inputAddress" class="form-label">Nama Lengkap</label>
                                    <input type="text" class="form-control" name="namaGuru" value="<?= $row->namaGuru ?>" required>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="inputEmail4" class="form-label">Tempat Lahir</label>
                                    <input type="text" class="form-control" name="tempatLahir" value="<?= $row->tempatLahir ?>" required>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="inputEmail4" class="form-label">Tanggal Lahir</label>
                                    <input type="date" class="form-control" name="tanggalLahir" value="<?= $row->tanggalLahir ?>" required>
                                </div>

                                <div class="col-md-6 mt-3">
                                    <label for="validationCustom01">Jenis Kelamin</label>
                                    <select class="form-control" name="jk" value="<?= $row->jk ?>" required>
                                        <option value="">---Pilih Jenis Kelamin---</option>
                                        <option value="L" <?php if ($row->jk == 'L') {
                                                                echo 'selected';
                                                            } ?>>Laki-laki</option>
                                        <option value="P" <?php if ($row->jk == 'P') {
                                                                echo 'selected';
                                                            } ?>>Perempuan</option>

                                    </select>
                                    <div class="invalid-feedback">
                                        Harus diisi!
                                    </div>
                                </div>
                                <div class="col-md-4 mt-3">
                                    <label for="inputCity" class="form-label">Alamat</label>
                                    <input type="text" class="form-control" id="inputCity" name="alamat" value="<?= $row->alamat ?>">
                                </div>

                                <div class="col-md-1 mt-3">
                                    <label for="inputZip" class="form-label">RT</label>
                                    <input type="text" class="form-control" id="inputZip" name="rt" value="<?= $row->rt ?>">
                                </div>
                                <div class="col-md-1 mt-3">
                                    <label for="inputZip" class="form-label">RW</label>
                                    <input type="text" class="form-control" id="inputZip" name="rw" value="<?= $row->rw ?>">
                                </div>
                                <div class="col-md-3 mt-3">
                                    <label for="inputCity" class="form-label">Kelurahan</label>
                                    <input type="text" class="form-control" id="inputCity" name="kelurahan" value="<?= $row->kelurahan ?>">
                                </div>
                                <div class="col-md-3 mt-3">
                                    <label for="inputCity" class="form-label">Kecamatan</label>
                                    <input type="text" class="form-control" id="inputCity" name="kecamatan" value="<?= $row->kecamatan ?>">
                                </div>
                                <div class="col-md mt-3">
                                    <label for="inputCity" class="form-label">Kabupaten</label>
                                    <input type="text" class="form-control" id="inputCity" name="kabupaten" value="<?= $row->kabupaten ?>">
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="validationCustom01">Agama</label>
                                    <select class="form-control" name="agama" required>
                                        <option value="">---Pilih Agama---</option>
                                        <option value="Islam" <?php if ($row->agama == 'Islam') {
                                                                    echo 'selected';
                                                                } ?>>Islam</option>
                                        <option value="Katolik" <?php if ($row->agama == 'Katolik') {
                                                                    echo 'selected';
                                                                } ?>>Katolik</option>
                                        <option value="Protestan" <?php if ($row->agama == 'Protestan') {
                                                                        echo 'selected';
                                                                    } ?>>Protestan</option>
                                        <option value="Hindu" <?php if ($row->agama == 'Hindu') {
                                                                    echo 'selected';
                                                                } ?>>Hindu</option>
                                        <option value="Budha" <?php if ($row->agama == 'Budha') {
                                                                    echo 'selected';
                                                                } ?>>Budha</option>
                                        <option value="Lain-lain" <?php if ($row->agama == 'Lain-lain') {
                                                                        echo 'selected';
                                                                    } ?>>Lain-lain</option>

                                    </select>
                                    <div class="invalid-feedback">
                                        Harus diisi!
                                    </div>
                                </div>
                                <!-- <div class="col-md-6 mt-3">
                                    <label for="inputAddress" class="form-label">Angkatan</label>
                                    <input type="text" class="form-control" id="inputAddress" value="<?= $row->angkatan ?>">
                                </div> -->
                                <div class="col-md-6 mt-3">
                                    <label for="inputAddress" class="form-label">No. Telepon</label>
                                    <input type="text" class="form-control" id="inputAddress" name="noTelp" value="<?= $row->noTelp ?>">
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="inputAddress" class="form-label">Email</label>
                                    <input type="text" class="form-control" id="inputAddress" name="email" value="<?= $row->email ?>">
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="inputAddress" class="form-label">Tugas Tambahan</label>
                                    <input type="text" class="form-control" id="inputAddress" name="tugasTambahan" value="<?= $row->tugasTambahan ?>">
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="validationCustom01">Status Guru</label>
                                    <select class="form-control" name="statusGuru" required>
                                        <option value="0" <?php if ($row->statusGuru == '0') {
                                                                echo 'selected';
                                                            } ?>>Tidak Aktif</option>
                                        <option value="1" <?php if ($row->statusGuru == '1') {
                                                                echo 'selected';
                                                            } ?>>Aktif</option>

                                    </select>
                                    <div class="invalid-feedback">
                                        Harus diisi!
                                    </div>
                                </div>

                                <div class="col-md-6 mt-3">
                                    <label for="validationCustom01">Jabatan</label>
                                    <?= cmb_dinamis('idJenisPtk', 'jenis_ptk', 'jenisPtk', 'idJenisPtk', $selected = $row->idJenisPtk, '') ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        Harus diisi!
                                    </div>
                                </div>

                                <button class="btn btn-primary col-md-12 mt-3" type="submit">Simpan</button>
                                <a href="<?= base_url($linkin) ?>" class="btn btn-danger col-md-12 mt-1">Kembali</a>
                            </form>


                        </div>

                        <!-- messages -->
                        <div class="tab-pane" id="pills-messages" role="tabpanel" aria-labelledby="pills-messages-tab">
                            <!-- <h5 class="mt-3">Messages</h5> -->



                        </div>

                    </div>
                </div>
            </div>
            <!-- end card -->
        </div>
    </div>
    <!-- end row -->

</div> <!-- container-fluid -->