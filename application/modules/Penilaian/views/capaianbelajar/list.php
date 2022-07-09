<?php
$linkin = $this->uri->segment(1) . '/' . $this->uri->segment(2);
$no = '1';
$kode = $this->uri->segment(5);

?>
<div class="row page-title">
    <div class="col-md-12">
        <!-- <nav aria-label="breadcrumb" class="float-right mt-1">
            <ol class="breadcrumb">
                <li>
                    <?= cmb_dinamis('kelas', 'kelas', 'namaKelas', 'kodeKelas', '', 'onchange="getJadwalPerhari()" id="kelas"') ?>
                </li>
            </ol>

        </nav>
        <nav aria-label="breadcrumb" class="float-right mt-1">
            <ol class="breadcrumb">
                <li>
                    <?= cmb_dinamis('tahun_akademik', 'tahun_akademik', 'namaTahun', 'kodeTahun', '', 'onchange="getJadwalPerhari()" id="tahun_akademik"') ?>
                </li>
            </ol>

        </nav> -->
        <h4 class="mb-1 mt-0">Data <?= $title ?></h4>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form action="<?= base_url($linkin . '/detail/') ?>" method="post">
                    <!-- <div class="form-group mb-3">
                        <?= cmb_dinamis('kodeTahun', 'tahun_akademik', 'namaTahun', 'kodeTahun', '') ?>
                    </div> -->
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
    // function getNilaiSpiritual(nisn, kode) {
    //     var nilaiSpiritual = $("#nilaiSpiritual" + nisn).val();
    //     var kodeKelas = kode;
    //     console.log(nilaiSpiritual);
    //     $.ajax({
    //         type: 'Get',
    //         url: '<?= base_url("Penilaian/capaianbelajar/getNilaiSpiritual") ?>',
    //         data: 'nilaiSpiritual=' + nilaiSpiritual + '&nisn=' + nisn + '&kodeKelas=' + kodeKelas,
    //         success: function(data) {
    //             $('#listdata').html(data)
    //         }
    //     })
    // }

    function getNilaiSpiritual(nisn, kode) {
        var nilaiSpiritual = $("#nilaiSpiritual" + nisn).val();
        // console.log(nilaiSpiritual)
        $.ajax({
            type: 'Get',
            url: '<?= base_url("Penilaian/capaianbelajar/GetNilaiSpiritual") ?>',
            data: 'nilaiSpiritual=' + nilaiSpiritual + '&nisn=' + nisn,
            success: function(data) {
                $('#listdata').html(data)
            }
        })
    }

    function getDeskripsiSpiritual(nisn, kode) {
        var deskripsiSpiritual = $("#deskripsiSpiritual" + nisn).val();
        var kodeKelas = kode;
        console.log(deskripsiSpiritual);
        $.ajax({
            type: 'Get',
            url: '<?= base_url("Penilaian/capaianbelajar/getKehadiran") ?>',
            data: 'deskripsiSpiritual=' + deskripsiSpiritual + '&nisn=' + nisn + '&kodeKelas=' + kodeKelas,
            success: function(data) {
                $('#listdata').html(data)
            }
        })
    }

    function getNilaiSosial(nisn, kode) {
        var nilaiSosial = $("#nilaiSosial" + nisn).val();
        var kodeKelas = kode;
        console.log(nilaiSosial);
        $.ajax({
            type: 'Get',
            url: '<?= base_url("Penilaian/capaianbelajar/getKehadiran") ?>',
            data: 'nilaiSosial=' + nilaiSosial + '&nisn=' + nisn + '&kodeKelas=' + kodeKelas,
            success: function(data) {
                $('#listdata').html(data)
            }
        })
    }

    function getDeskripsiSosial(nisn, kode) {
        var deskripsiSosial = $("#deskripsiSosial" + nisn).val();
        var kodeKelas = kode;
        console.log(deskripsiSosial);
        $.ajax({
            type: 'Get',
            url: '<?= base_url("Penilaian/capaianbelajar/getKehadiran") ?>',
            data: 'deskripsiSosial=' + deskripsiSosial + '&nisn=' + nisn + '&kodeKelas=' + kodeKelas,
            success: function(data) {
                $('#listdata').html(data)
            }
        })
    }
</script>