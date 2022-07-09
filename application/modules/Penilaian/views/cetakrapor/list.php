<?php
$linkin = $this->uri->segment(1) . '/' . $this->uri->segment(2);
$no = '1';
?>
<div class="row page-title">
    <div class="col-md-12">
        <nav aria-label="breadcrumb" class="float-right mt-1">
            <!-- <ol class="breadcrumb">
                <li>
                    <?= cmb_dinamis('tahun_akademik', 'tahun_akademik', 'namaTahun', 'kodeTahun', '', 'onchange="getJadwalPerhari()" id="tahun_akademik"') ?>
                </li>
            </ol> -->

        </nav>
        <h4 class="mb-1 mt-0">Data <?= $title ?></h4>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form action="<?= base_url($linkin . '/detail/') ?>" method="post">
                    <div class="form-group mb-3">
                        <?= cmb_dinamis('kodeTahun', 'tahun_akademik', 'namaTahun', 'kodeTahun', '') ?>
                    </div>
                    <div class="form-group mb-3">
                        <?= cmb_dinamis('kodeKelas', 'kelas', 'namaKelas', 'kodeKelas', '') ?>
                    </div>
                    <button class="btn btn-primary" type="submit">Tampilkan Data</button>
                </form>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>
<!-- end row-->

<script>
    function getJadwalPerhari() {
        var tahun_akademik = $("#tahun_akademik").val()
        // var kelas = $("#kelas").val()
        console.log(tahun_akademik)
        $.ajax({
            type: 'Get',
            url: '<?= base_url("Penilaian/cetakrapor/getJadwalPerhari") ?>',
            data: 'tahun_akademik=' + tahun_akademik,
            success: function(data) {
                $('#listdata').html(data)
            }
        })
    }
</script>