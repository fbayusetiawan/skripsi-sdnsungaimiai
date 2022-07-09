<?php
$ctrl = $this->uri->segment(1) . '/' . $this->uri->segment(2);
?>

<div class="row page-title">
    <div class="col-md-12">
        <nav aria-label="breadcrumb" class="float-right mt-1">
            <!-- <ol class="breadcrumb">
                <li><a href="<?= base_url($ctrl . '/add') ?>" class="btn btn-success">Tambah Data</a></li>
            </ol> -->
        </nav>
        <h4 class="mb-1 mt-0">Tambah Data <?= $title ?></h4>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <form action="<?= base_url($ctrl . '/addAction') ?>" method="post" class="needs-validation" novalidate>
                    <div class="form-group mb-3">
                        <label for="validationCustom01">NIK/NIP/NIH <small id="info"></small></label>
                        <input type="text" class="form-control nip" name="nip" id="nip" onkeyup="cek()" required>
                        <div class="invalid-feedback">
                            Harus diisi!
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="validationCustom01">Nama Lengkap</label>
                        <input type="text" class="form-control" name="namaLengkap" required>
                        <div class="invalid-feedback">
                            Harus diisi!
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="validationCustom01">Jenis Kelamin</label>
                        <?= form_dropdown('jk', array('1' => 'Laki-laki', '2' => 'Perempuan'), '', 'class="form-control"') ?>
                        <div class="invalid-feedback">
                            Harus diisi!
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="validationCustom01">Agama</label>
                        <?= form_dropdown('agama', array('1' => 'Islam', '2' => 'Protestan', '3' => 'Katolik', '4' => 'Hindu', '5' => 'Budha', '6' => 'Kong Hu Chu'), '', 'class="form-control"') ?>
                        <div class="invalid-feedback">
                            Harus diisi!
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="validationCustom01">e-mail</label>
                        <input type="email" class="form-control" name="email" required>
                        <div class="invalid-feedback">
                            Harus diisi!
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="validationCustom01">Nomor Whatsapp</label>
                        <input type="text" class="form-control wa" name="noWa" required>
                        <div class="invalid-feedback">
                            Harus diisi!
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="validationCustom01">Status</label>
                        <?= form_dropdown('status', array('1' => 'Pegawai Tetap', '0' => 'Pegawai Tidak Tetap'), '', 'class="form-control"') ?>
                        <div class="invalid-feedback">
                            Harus diisi!
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="validationCustom01">Pangkat</label>
                        <?= cmb_dinamis('pangkat', 'pangkat', 'pangkat', 'idPangkat') ?>
                        <div class="invalid-feedback">
                            Harus diisi!
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="validationCustom01">Golongan</label>
                        <?= cmb_dinamis('golongan', 'golongan', 'golongan', 'idGol') ?>
                        <div class="invalid-feedback">
                            Harus diisi!
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="validationCustom01">Jabatan</label>
                        <input type="text" class="form-control" name="jabatan" required>
                        <div class="invalid-feedback">
                            Harus diisi!
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="validationCustom01">Alamat</label>
                        <textarea name="alamat" cols="30" rows="4" required class="form-control"></textarea>
                        <div class="invalid-feedback">
                            Harus diisi!
                        </div>
                    </div>
                    <button class="btn btn-primary" type="submit">Simpan</button>
                </form>

            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div> <!-- end col-->
</div>
<script>
    function cek() {
        var nip = $("#nip").val();
        $.ajax({
            type: 'GET',
            url: '<?= base_url("datamaster/pegawai/cek") ?>',
            data: "nip=" + nip,
            success: function(data) {
                $('#info').html(data)
            }
        })
    }
</script>