<?php
$linkin = $this->uri->segment(1) . '/' . $this->uri->segment(2);
?>


<div class="row">
    <div class="col-lg-3">
        <div class="card">
            <div class="card-body">
                <div class="text-center mt-3">
                    <img src="<?= base_url(); ?>assets/images/profil/<?= $row->foto ?>" alt="" class="avatar-lg rounded-circle" />
                    <h5 class="mt-2 mb-0"><?= $row->namaSiswa ?></h5>
                    <h6 class="text-muted font-weight-normal mt-2 mb-0">NISN : <?= $row->nisn ?>
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
                                    <h4 class="font-size-14">Status Siswa :</h4>
                                    <p class="text-muted"><?= $row->isActive == '1' ? '<span class="badge badge-success">Aktif</span>' : '<span class="badge badge-danger">Tidak Aktif</span>' ?></p>
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
                    <li class="nav-item">
                        <a class="nav-link" id="pills-messages-tab" data-toggle="pill" href="#pills-messages" role="tab" aria-controls="pills-messages" aria-selected="false">
                            Data Orang Tua
                        </a>
                    </li>
                    <!-- <li class="nav-item">
                            <a class="nav-link" id="pills-projects-tab" data-toggle="pill" href="#pills-projects" role="tab" aria-controls="pills-projects" aria-selected="false">
                                Projects
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-tasks-tab" data-toggle="pill" href="#pills-tasks" role="tab" aria-controls="pills-tasks" aria-selected="false">
                                Tasks
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-files-tab" data-toggle="pill" href="#pills-files" role="tab" aria-controls="pills-files" aria-selected="false">
                                Files
                            </a>
                        </li> -->
                </ul>

                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-activity" role="tabpanel" aria-labelledby="pills-activity-tab">
                        <h5 class="mt-1"></h5>

                        <form class="row g-4 needs-validation" novalidate="" action="<?= base_url($linkin . '/editAction/' . $this->uri->segment(4)) ?>" method="post">

                            <div class="col-md-3 mt-3">
                                <label for="inputAddress" class="form-label">NISN</label>
                                <input type="text" class="form-control" id="inputAddress" name="nisn" value="<?= $row->nisn ?>" disabled>
                            </div>
                            <div class="col-md-3 mt-3">
                                <label for="inputAddress" class="form-label">NIS</label>
                                <input type="text" class="form-control" id="inputAddress" name="nis" value="<?= $row->nis ?> " disabled>
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="inputAddress" class="form-label">Password</label>
                                <input type="password" class="form-control" name="password" id="inputAddress" value="" required>
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="inputAddress" class="form-label">Nama Lengkap</label>
                                <input type="text" class="form-control" id="inputAddress" name="namaSiswa" value="<?= $row->namaSiswa ?>">
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="inputEmail4" class="form-label">Tempat Lahir</label>
                                <input type="text" class="form-control" id="inputEmail4" name="tempatLahir" value="<?= $row->tempatLahir ?>">
                            </div>
                            <!-- <div class="col-md-6 mt-3">
                                    <label for="inputEmail4" class="form-label">Tanggal Lahir</label>
                                    <input type="text" class="form-control" id="inputEmail4" value="<?= $row->tanggalLahir ?>">
                                </div> -->
                            <div class="col-md-6 mt-3">
                                <label for="validationCustom01">Tanggal Lahir</label>
                                <input type="date" class="form-control" name="tanggalLahir" id="validationCustom01" value="<?= $row->tanggalLahir ?>" required>
                                <div class="invalid-feedback">
                                    Harus diisi!
                                </div>
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="inputEmail4" class="form-label">Status Keluarga</label>
                                <input type="text" class="form-control" id="inputEmail4" name="statusKeluarga" value="<?= $row->statusKeluarga ?>">
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="inputEmail4" class="form-label">Anak Ke</label>
                                <input type="text" class="form-control" id="inputEmail4" name="anakKe" value="<?= $row->anakKe ?>">
                            </div>

                            <!-- <div class="col-md-6 mt-3">
                                    <label for="inputCity" class="form-label">Jenis Kelamin</label>
                                    <input type="text" class="form-control" id="inputCity" value="<?= $row->jk == 'L' ? 'Laki-Laki' : 'Perempuan' ?>">
                                </div> -->
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
                            <div class="col-md-6 mt-3">
                                <label for="inputAddress" class="form-label">Angkatan</label>
                                <input type="text" class="form-control" id="inputAddress" name="angkatan" value="<?= $row->angkatan ?>">
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="inputAddress" class="form-label">No. Telepon</label>
                                <input type="text" class="form-control" id="inputAddress" name="noTelp" value="<?= $row->noTelp ?>">
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="inputAddress" class="form-label">Asal SD</label>
                                <input type="text" class="form-control" name="asalSd" id="inputAddress" value="<?= $row->asalSd ?>">
                            </div>


                            <div class="col-md-6 mt-3">
                                <label for="validationCustom01" class="form-label">Upload Foto</label>
                                <input type="file" class="form-control" id="inputAddress" name="foto">
                            </div>

                            <button class="btn btn-primary col-md-12 mt-3" type="submit">Simpan</button>
                            <a href="<?= base_url($linkin) ?>" class="btn btn-danger col-md-12 mt-1">Kembali</a>
                        </form>


                    </div>

                    <!-- messages -->
                    <div class="tab-pane" id="pills-messages" role="tabpanel" aria-labelledby="pills-messages-tab">
                        <!-- <h5 class="mt-3">Messages</h5> -->
                        <div class="float-sm-left">
                            <form class="row g-4 needs-validation" action="<?= base_url($linkin . '/editAction1/' . $this->uri->segment(4)) ?>" method="post">

                                <div class="col-md-12 mt-3 ">
                                    <label for="inputNama" class="form-label">Nama Ayah</label>
                                    <input type="text" class="form-control" id="" name="namaAyah" value="<?= $row->namaAyah ?>">
                                </div>
                                <div class="col-md-12 mt-3">
                                    <label for="inputPekerjaan" class="form-label">Pekerjaan Ayah</label>
                                    <input type="text" class="form-control" id="" name="pekerjaanAyah" value="<?= $row->pekerjaanAyah ?>">
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="inputEmail4" class="form-label">Alamat Ayah</label>
                                    <input type="text" class="form-control" id="" name="alamatAyah" value="<?= $row->alamatAyah ?>">
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="inputAddress" class="form-label">No. Telepon Ayah</label>
                                    <input type="text" class="form-control" id="" name="noHpAyah" value="<?= $row->noHpAyah ?>">
                                </div>
                                <div class="col-md-12 mt-3 pt-2 border-top">
                                    <label for="inputNama" class="form-label">Nama Ibu</label>
                                    <input type="text" class="form-control" id="" name="namaIbu" value="<?= $row->namaIbu ?>">
                                </div>
                                <div class="col-md-12 mt-3">
                                    <label for="inputPekerjaan" class="form-label">Pekerjaan Ibu</label>
                                    <input type="text" class="form-control" id="" name="pekerjaanIbu" value="<?= $row->pekerjaanIbu ?>">
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="inputEmail4" class="form-label">Alamat Ibu</label>
                                    <input type="text" class="form-control" id="" name="alamatIbu" value="<?= $row->alamatIbu ?>">
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="inputAddress" class="form-label">No. Telepon Ibu</label>
                                    <input type="text" class="form-control" id="" name="noHpIbu" value="<?= $row->noHpIbu ?>">
                                </div>
                                <div class="col-md-6 mt-3 pt-2 border-top">
                                    <label for="inputNama" class="form-label">Nama Wali</label>
                                    <input type="text" class="form-control" id="" name="namaWali" value="<?= $row->namaWali ?>">
                                </div>
                                <div class="col-md-6 mt-3 pt-2 border-top">
                                    <label for="inputPekerjaan" class="form-label">Alamat Wali</label>
                                    <input type="text" class="form-control" id="" name="alamatWali" value="<?= $row->alamatWali ?>">
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="inputEmail4" class="form-label">No. Telepon Wali</label>
                                    <input type="text" class="form-control" id="" name="noHpWali" value="<?= $row->noHpWali ?>">
                                </div>

                                <!-- <button class="btn btn-primary col-md-12 mt-3" type="submit">Simpan</button>
                                    <a href="<?= base_url($linkin) ?>" class="btn btn-danger col-md-12 mt-1">Kembali</a> -->
                                <button class="btn btn-primary col-md-12 mt-3" type="submit">Simpan</button>
                                <a href="<?= base_url($linkin) ?>" class="btn btn-danger col-md-12 mt-1">Kembali</a>

                            </form>
                        </div>


                    </div>

                    <div class="tab-pane fade" id="pills-projects" role="tabpanel" aria-labelledby="pills-projects-tab">

                        <h5 class="mt-3">Projects</h5>


                        <!-- end row -->
                    </div>

                    <div class="tab-pane fade" id="pills-tasks" role="tabpanel" aria-labelledby="pills-tasks-tab">
                        <h5 class="mt-3">Tasks</h5>


                    </div>

                    <div class="tab-pane fade" id="pills-files" role="tabpanel" aria-labelledby="pills-files-tab">
                        <h5 class="mt-3">Files</h5>



                        <!-- end attachments -->
                    </div>

                </div>
            </div>
        </div>
        <!-- end card -->
    </div>
</div>
<!-- end row -->