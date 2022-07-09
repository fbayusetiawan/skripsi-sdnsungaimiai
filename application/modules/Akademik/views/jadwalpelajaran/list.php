<?php
$linkin = $this->uri->segment(1) . '/' . $this->uri->segment(2);
$no = '1';
?>
<div class="row page-title">
    <div class="col-md-12">
        <nav aria-label="breadcrumb" class="float-right mt-1">
            <ol class="breadcrumb">
                <li><a href="<?= base_url($linkin . '/add') ?>" class="btn btn-success">Tambah Data</a></li>
            </ol>
        </nav>
        <nav aria-label="breadcrumb" class="float-right mt-1">
            <ol class="breadcrumb">
                <li>
                    <?= cmb_dinamis('kelas', 'kelas', 'namaKelas', 'kodeKelas', '', 'onchange="getJadwalPerhari()" id="kelas"') ?>
                </li>
            </ol>

        </nav>
        <nav aria-label="breadcrumb" class="float-right mt-1">
            <ol class="breadcrumb">
                <li>
                    <?= cmb_dinamis('tahunajaran', 'tahunajaran', 'tahunAjaran', 'idTahunAjaran', '', 'onchange="getJadwalPerhari()" id="tahunajaran"') ?>
                </li>
            </ol>

        </nav>

        <h4 class="mb-1 mt-0">Data <?= $title ?></h4>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div id="listdata">

                </div>
               
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>
<!-- end row-->
<script>
    function getJadwalPerhari() {
        var tahunajaran = $("#tahunajaran").val()
        var kelas = $("#kelas").val()
        // console.log(tahunajaran)
        $.ajax({
            type: 'Get',
            url: '<?= base_url("Akademik/jadwalpelajaran/getJadwalPerhari") ?>',
            data: 'kelas=' + kelas + '&tahunajaran=' + tahunajaran,
            success: function(data) {
                $('#listdata').html(data)
            }
        })
    }
</script>