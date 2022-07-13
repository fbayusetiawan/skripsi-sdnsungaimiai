<?php
$linkin = $this->uri->segment(1) . '/' . $this->uri->segment(2);
?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <form action="<?= base_url($linkin . '/setup_action/') ?>" method="post" class="needs-validation" enctype="multipart/form-data" novalidate>
                    <div class="form-group mb-3">
                        <label for="validationCustom01">NIK </label>
                        <input type="text" name="" value="<?= $row->nik ?>" class="form-control" readonly required>
                        <div class="invalid-feedback">
                            Harus diisi!
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="validationCustom01">Nama </label>
                        <input type="text" name="nama" value="<?= $row->nama ?>" class="form-control" required>
                        <div class="invalid-feedback">
                            Harus diisi!
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="validationCustom01">NIDN </label>
                        <input type="text" name="nidn" value="<?= $row->nidn ?>" class="form-control" required>
                        <div class="invalid-feedback">
                            Harus diisi!
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="validationCustom01">Homebase </label>
                        <input type="text" name="homebase" value="<?= $row->homebase ?>" class="form-control" required>
                        <div class="invalid-feedback">
                            Harus diisi!
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="validationCustom01">Penempatan </label>
                        <input type="text" name="penempatan" value="<?= $row->penempatan ?>" class="form-control" required>
                        <div class="invalid-feedback">
                            Harus diisi!
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="validationCustom01">No WhatsApp <span><small>langsung mulai dari angka 8</small></span> </label>
                        <input type="text" name="noWa" value="<?= $row->noWa ?>" class="form-control wa" required>
                        <div class="invalid-feedback">
                            Harus diisi!
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="validationCustom01">Email </label>
                        <input type="email" name="email" value="<?= $row->email ?>" class="form-control" required>
                        <div class="invalid-feedback">
                            Harus diisi!
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="validationCustom01">Password </label>
                        <input type="password" name="password" value="" class="form-control" required>
                        <div class="invalid-feedback">
                            Harus diisi!
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="validationCustom01">Rumpun Ilmu</label>
                        <select name="kodeRumpun" id="rumpun" onchange="getSubRumpun()" required class="form-control">
                            <option value="">SILAHKAN PILIH RUMPUN ILMU</option>
                            <?php foreach ($rumpun as $rumpun) : ?>
                                <option value="<?= $rumpun->kodeRumpun ?>"><?= $rumpun->kodeRumpun ?> - <?= $rumpun->rumpun ?></option>
                            <?php endforeach ?>
                        </select>
                        <div class="invalid-feedback">
                            Harus dipilih!
                        </div>
                    </div>
                    <div id="subRumpunData"></div>
                    <div id="bidangIlmuData"></div>
                    <button class="btn btn-primary" type="submit">Simpan</button>
                    <!-- <a href="<?= base_url($linkin . '/detail/' . $this->uri->segment(4)) ?>" class="btn btn-danger">Kembali</a> -->
                </form>
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div> <!-- end col-->
</div>
<script>
    function getSubRumpun() {
        var rumpun = $("#rumpun").val();
        $.ajax({
            type: 'GET',
            url: '<?= base_url("Home/Hibah/ajaxRumpun") ?>',
            data: "rumpun=" + rumpun,
            success: function(data) {
                $('#subRumpunData').html(data)
            }
        })
    }

    function getBidangIlmu() {
        var SubRumpun = $("#SubRumpun").val();
        $.ajax({
            type: 'GET',
            url: '<?= base_url("Home/Hibah/ajaxSubRumpun") ?>',
            data: "SubRumpun=" + SubRumpun,
            success: function(data) {
                $('#bidangIlmuData').html(data)
            }
        })
    }
</script>