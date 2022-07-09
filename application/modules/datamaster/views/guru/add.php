<?php
$linkin = $this->uri->segment(1) . '/' . $this->uri->segment(2);
$noPtk = '1';
?>

<div class="row page-title">
    <div class="col-md-12">
        <nav aria-label="breadcrumb" class="float-right mt-1">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_add_new">
                Tambah Jabatan
            </button>
            <!-- <div class="pull-right"><a class="btn btn-info" data-toggle="modal" data-target="#modal_add_new">Tambah Jenis PTK</a></div>    -->

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
                            <div class="form-group">
                                <label class="col col-form-label" for="simpleinput">NIP</label>

                                <input type="text" class="form-control" id="nip" name="nip" value="" required>

                            </div>
                            <!-- <div class="form-group">
                                <label class="col col-form-label" for="example-password">Password</label>

                                <input type="password" class="form-control" name="password" value="" required>
                                <span class="help-block"><small>Password wajib diisi</small></span>

                            </div> -->
                            <div class="form-group">
                                <label class="col col-form-label" for="simpleinput">NIK</label>

                                <input type="text" class="form-control" id="nik" name="nik" value="" required>
                            </div>

                            <div class="form-group">
                                <label class="col col-form-label" for="simpleinput">Nama</label>

                                <input type="text" class="form-control" id="namaGuru" name="namaGuru" value="" required>
                            </div>

                            <div class="form-group">
                                <label class="col col-form-label">Jenis Kelamin</label>

                                <?= form_dropdown('jk', array('L' => 'Laki-laki', 'P' => 'Perempuan'), '', 'class="form-control"'); ?>
                            </div>

                            <div class="form-group">
                                <label class="col col-form-label" for="simpleinput">Tempat Lahir</label>

                                <input type="text" class="form-control" name="tempatLahir" id="tempatLahir" value="" required>
                            </div>

                            <div class="form-group">
                                <label class="col col-form-label" for="example-date">Tanggal Lahir</label>

                                <input class="form-control" id="tanggalLahir" type="date" name="tanggalLahir" required>
                            </div>

                            <div class="form-group">
                                <label class="col col-form-label">Agama</label>

                                <?= form_dropdown('agama', array('Islam' => 'Islam', 'Katolik' => 'Katolik', 'Protestan' => 'Protestan', 'Hindu' => 'Hindu', 'Budha' => 'Budha', 'Lain-lain' => 'Lain-lain'), '', 'class="form-control"'); ?>
                            </div>

                            <div class="form-group">
                                <label class="col col-form-label" for="simpleinput">Alamat</label>

                                <input type="text" class="form-control" name="alamat" id="alamat" value="" required>
                            </div>

                            <div class="form-group">
                                <label class="col col-form-label" for="simpleinput">RT</label>

                                <input type="text" class="form-control" name="rt" id="rt" name="" required>
                            </div>

                            <div class="form-group">
                                <label class="col col-form-label" for="simpleinput">RW</label>

                                <input type="text" class="form-control" id="rw" name="rw" required>
                            </div>

                            <div class="form-group">
                                <label class="col col-form-label" for="simpleinput">Kelurahan</label>

                                <input type="text" class="form-control" id="kelurahan" name="kelurahan" required>
                            </div>

                            <div class="form-group">
                                <label class="col col-form-label" for="simpleinput">Kecamatan</label>

                                <input type="text" class="form-control" id="kecamatan" name="kecamatan" required>
                            </div>

                            <div class="form-group">
                                <label class="col" for="simpleinput">Kabupaten</label>

                                <input type="text" class="form-control" id="kabupaten" name="kabupaten" required>
                            </div>

                            <div class="form-group">
                                <label class="col" for="simpleinput">No. Telepon</label>

                                <input type="text" class="form-control" id="noTelp" name="noTelp" required>
                            </div>

                            <div class="form-group">
                                <label class="col" for="simpleinput">Email</label>

                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>

                            <div class="form-group">
                                <label class="col" for="simpleinput">Tugas Tambahan</label>

                                <input type="text" class="form-control" id="tugasTambahan" name="tugasTambahan">

                            </div>
                            <div class="form-group">
                                <label for="validationCustom01">Jabatan</label>
                                <select class="form-control" name="idJenisPtk" required>

                                    <option value="">---Pilih Jenis Jabatan---</option>
                                    <?php foreach ($ptk as $ptk) { ?>
                                        <option value="<?php echo $ptk->idJenisPtk ?>"><?= $ptk->jenisPtk ?> </option>
                                    <?php } ?>
                                </select>

                                <div class="invalid-feedback">
                                    Harus diisi!
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col col-form-label">Status Guru</label>

                                <?= form_dropdown('statusGuru', array('0' => 'Tidak Aktif', '1' => 'Aktif'), '', 'class="form-control"'); ?>

                            </div>
                            <div class="form-group">
                                <label class="col" for="simpleinput">Upload Foto</label>

                                <input type="file" class="form-control" id="foto" name="foto" required>

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
<div class="modal fade" id="modal_add_new" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="myModalLabel">Tambah Jabatan</h3>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
            </div>
            <form action="">
                <table class="table  nowrap">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Jenis PTK</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($jnsptk as $jnsptk) : ?>
                            <tr>
                                <td><?= $noPtk++ ?></td>
                                <td><?= $jnsptk->jenisPtk ?></td>
                                <td>
                                    <div class="btn-group mb-0">

                                        <a href="<?= base_url($linkin . '/deletePtk/' . $jnsptk->idJenisPtk) ?>" id="<?= $jnsptk->jenisPtk ?>" class="delete-data btn btn-info btn-sm" data-toggle="tooltip" title="Hapus"><i class="uil uil-trash-alt"></i></a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </form>
            <form class="form-horizontal" method="post" action="<?= base_url($linkin . '/addActionPtk') ?>">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label col-xs-3">Jenis PTK</label>
                        <div class="col-xs-8">
                            <input name="jenisPtk" class="form-control" type="text" placeholder="" required>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                    <button class="btn btn-info">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!--END MODAL ADD PTK-->

<script>
    $(document).ready(function() {
        $('#mydata').DataTable();
    });
</script>