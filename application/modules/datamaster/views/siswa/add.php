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
                                <label for="validationCustom01">NISN</label>
                                <input type="text" class="form-control" name="nisn" id="validationCustom01" required>
                                <div class="invalid-feedback">
                                    Harus diisi!
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label for="validationCustom01">NIS</label>
                                <input type="text" class="form-control" name="nis" id="validationCustom01" required>
                                <div class="invalid-feedback">
                                    Harus diisi!
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label for="validationCustom01">Password</label>
                                <input type="text" class="form-control" name="password" id="validationCustom01" required>
                                <div class="invalid-feedback">
                                    Harus diisi!
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label for="validationCustom01">Nama Lengkap</label>
                                <input type="text" class="form-control" name="namaSiswa" id="validationCustom01" required>
                                <div class="invalid-feedback">
                                    Harus diisi!
                                </div>
                            </div>

                            <div class="form-group mb-3">
                                <label for="validationCustom01">Jenis Kelamin</label>
                                <select class="form-control" name="jk">
                                    <option value="">---Pilih Jenis Kelamin---</option>
                                    <option value="L">Laki-laki</option>
                                    <option value="P">Perempuan</option>

                                </select>
                                <div class="invalid-feedback">
                                    Harus diisi!
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label for="validationCustom01">Tempat Lahir</label>
                                <input type="text" class="form-control" name="tempatLahir" id="validationCustom01" required>
                                <div class="invalid-feedback">
                                    Harus diisi!
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label for="validationCustom01">Tanggal Lahir</label>
                                <input type="date" class="form-control" name="tanggalLahir" id="validationCustom01" required>
                                <div class="invalid-feedback">
                                    Harus diisi!
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label for="validationCustom01">Status Keluarga</label>
                                <input type="text" class="form-control" name="statusKeluarga" id="validationCustom01" required>
                                <div class="invalid-feedback">
                                    Harus diisi!
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label for="validationCustom01">Anak Ke</label>
                                <input type="text" class="form-control" name="anakKe" id="validationCustom01" required>
                                <div class="invalid-feedback">
                                    Harus diisi!
                                </div>
                            </div>

                            <div class="form-group mb-3">
                                <label for="validationCustom01">Agama</label>
                                <select class="form-control" name="agama">
                                    <option value="">---Pilih Agama---</option>
                                    <option value="Islam">Islam</option>
                                    <option value="Katolik">Katolik</option>
                                    <option value="Protestan">Protestan</option>
                                    <option value="Hindu">Hindu</option>
                                    <option value="Budha">Budha</option>
                                    <option value="Lain-lain">Lain-lain</option>
                                </select>
                                <div class="invalid-feedback">
                                    Harus diisi!
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label for="validationCustom01">Alamat</label>
                                <input type="text" class="form-control" name="alamat" id="validationCustom01" required>
                                <div class="invalid-feedback">
                                    Harus diisi!
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label for="validationCustom01">RT</label>
                                <input type="text" class="form-control" name="rt" id="validationCustom01" required>
                                <div class="invalid-feedback">
                                    Harus diisi!
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label for="validationCustom01">RW</label>
                                <input type="text" class="form-control" name="rw" id="validationCustom01" required>
                                <div class="invalid-feedback">
                                    Harus diisi!
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label for="validationCustom01">Kelurahan</label>
                                <input type="text" class="form-control" name="kelurahan" id="validationCustom01" required>
                                <div class="invalid-feedback">
                                    Harus diisi!
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label for="validationCustom01">Kecamatan</label>
                                <input type="text" class="form-control" name="kecamatan" id="validationCustom01" required>
                                <div class="invalid-feedback">
                                    Harus diisi!
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label for="validationCustom01">Kabupaten</label>
                                <input type="text" class="form-control" name="kabupaten" id="validationCustom01" required>
                                <div class="invalid-feedback">
                                    Harus diisi!
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label for="validationCustom01">No. Telepom</label>
                                <input type="text" class="form-control" name="noTelp" id="validationCustom01" required>
                                <div class="invalid-feedback">
                                    Harus diisi!
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label for="validationCustom01">Upload Foto</label>
                                <input type="file" class="form-control" name="foto" id="validationCustom01" required>
                                <div class="invalid-feedback">
                                    Harus diisi!
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label for="validationCustom01">Asal TK</label>
                                <input type="text" class="form-control" name="asalTk" id="validationCustom01" required>
                                <div class="invalid-feedback">
                                    Harus diisi!
                                </div>
                            </div>
                            <div class="form-group row">

                            </div>
                    </div>
                    <div class="col">
                        <div class="form-group mb-3">
                            <label for="validationCustom01">Nama Ayah</label>
                            <input type="text" class="form-control" name="namaAyah" id="validationCustom01" required>
                            <div class="invalid-feedback">
                                Harus diisi!
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="validationCustom01">Pekerjaan Ayah</label>
                            <input type="text" class="form-control" name="pekerjaanAyah" id="validationCustom01" required>
                            <div class="invalid-feedback">
                                Harus diisi!
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="validationCustom01">Alamat Ayah</label>
                            <input type="text" class="form-control" name="alamatAyah" id="validationCustom01" required>
                            <div class="invalid-feedback">
                                Harus diisi!
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="validationCustom01">No. Telepon Ayah</label>
                            <input type="text" class="form-control" name="noHpAyah" id="validationCustom01" required>
                            <div class="invalid-feedback">
                                Harus diisi!
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="validationCustom01">Nama Ibu</label>
                            <input type="text" class="form-control" name="namaIbu" id="validationCustom01" required>
                            <div class="invalid-feedback">
                                Harus diisi!
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="validationCustom01">Pekerjaan Ibu</label>
                            <input type="text" class="form-control" name="pekerjaanIbu" id="validationCustom01" required>
                            <div class="invalid-feedback">
                                Harus diisi!
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="validationCustom01">Alamat Ibu</label>
                            <input type="text" class="form-control" name="alamatIbu" id="validationCustom01" required>
                            <div class="invalid-feedback">
                                Harus diisi!
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="validationCustom01">No. Telepon Ibu</label>
                            <input type="text" class="form-control" name="noHpIbu" id="validationCustom01" required>
                            <div class="invalid-feedback">
                                Harus diisi!
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="validationCustom01">Nama Wali</label>
                            <input type="text" class="form-control" name="namaWali" id="validationCustom01" required>
                            <div class="invalid-feedback">
                                Harus diisi!
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="validationCustom01">Alamat Wali</label>
                            <input type="text" class="form-control" name="alamatWali" id="validationCustom01" required>
                            <div class="invalid-feedback">
                                Harus diisi!
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="validationCustom01">No. Telepon Wali</label>
                            <input type="text" class="form-control" name="noHpWali" id="validationCustom01" required>
                            <div class="invalid-feedback">
                                Harus diisi!
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="validationCustom01">Angkatan</label>
                            <input type="text" class="form-control" name="angkatan" id="validationCustom01" required>
                            <div class="invalid-feedback">
                                Harus diisi!
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label for="validationCustom01">Status Siswa</label>
                            <select class="form-control" name="isActive">
                                <option value="0">Tidak Aktif</option>
                                <option value="1">Aktif</option>

                            </select>
                            <div class="invalid-feedback">
                                Harus diisi!
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="validationCustom01">Kelas</label>
                            <select class="form-control" name="kodeKelas">
                                <option value="">---Pilih Kelas---</option>
                                <?php foreach ($kelas as $kelas) { ?>
                                    <option value="<?php echo $kelas->kodeKelas; ?>"><?= $kelas->kodeKelas ?> - <?= $kelas->namaKelas ?> </option>
                                <?php } ?>
                            </select>
                            <div class="invalid-feedback">
                                Harus diisi!
                            </div>
                        </div>


                    </div>
                </div>
                <button class="btn btn-primary" type="submit">Simpan</button>
                <a href="<?= base_url($linkin) ?>" class="btn btn-danger">Kembali</a>
                </form>
            </div> <!-- end card-body -->
            </form>




        </div> <!-- end card-body-->
    </div> <!-- end card-->
</div> <!-- end col-->
</div>