<?php
$linkin = $this->uri->segment(1) . '/' . $this->uri->segment(2);
$no = '1';
$kode = $this->uri->segment(5);

?>
<div class="row page-title">
    <div class="col-md-12">
        <nav aria-label="breadcrumb" class="float-right mt-1">
            <ol class="breadcrumb">
                <li>
                    <?= cmb_dinamis('kodeTahun', 'tahun_akademik', 'namaTahun', 'kodeTahun', '', ' id="tahun_akademik"') ?>
                </li>
            </ol>

        </nav>
        <h4 class="mb-1 mt-0"><?= $title ?></h4>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form action="">
                    <table id="basic-datatable" class="table nowrap">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NISN / NIS</th>
                                <th>Nama Lengkap</th>
                                <th>
                                    <center>Sikap Spiritual</center>
                                </th>
                                <th>
                                    <center>Sikap Sosial</center>
                                </th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data as $row) : ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $row->nisn ?> / <?= $row->nis  ?> </td>
                                    <td><?= $row->namaSiswa ?></td>
                                    <td>
                                        <div class="form-row align-items">
                                            <div class="">
                                                <input type="text" class="form-control" style="width: 80px;" onkeyup="getNilaiSpiritual('<?= $row->nisn ?>','<?= $row->kodeKelas ?>')" name="nilaiSpiritual" id="nilaiSpiritual<?= $row->nisn ?>" PLACEHOLDER="Predikat">
                                            </div>
                                            <div class="col-auto">
                                                <div class="input-group">
                                                    <textarea class="form-control" rows="2" onkeyup="getDeskripsiSpiritual('<?= $row->nisn ?>','<?= $row->kodeKelas ?>')" name="deskripsiSpiritual" id="deskripsiSpiritual<?= $row->nisn ?>" PLACEHOLDER="Deskripsi"></textarea>
                                                </div>
                                            </div>

                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-row align-items">
                                            <div class="">
                                                <input type="text" class="form-control" style="width: 80px;" onkeyup="getNilaiSosial('<?= $row->nisn ?>','<?= $row->kodeKelas ?>')" name="nilaiSosial" id="nilaiSosial<?= $row->nisn ?>" PLACEHOLDER="Predikat">
                                            </div>
                                            <div class="col-auto">
                                                <div class="input-group">
                                                    <textarea class="form-control" rows="2" onkeyup="getDeskripsiSosial('<?= $row->nisn ?>','<?= $row->kodeKelas ?>')" name="deskripsiSosial" id="deskripsiSosial<?= $row->nisn ?>" PLACEHOLDER="Deskripsi"></textarea>
                                                </div>
                                            </div>

                                        </div>
                                    </td>

                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                    <a href="<?= base_url($linkin) ?>" class="btn btn-danger">Kembali</a>
                </form>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>
<!-- end row-->

<script>
    function getNilaiSpiritual(nisn, kode) {
        var tahun_akademik = $("#tahun_akademik").val()
        var nilaiSpiritual = $("#nilaiSpiritual" + nisn).val();
        var kodeKelas = kode;
        console.log(tahun_akademik);
        $.ajax({
            type: 'Get',
            url: '<?= base_url("Penilaian/capaianbelajar/getNilaiSpiritual") ?>',
            data: 'nilaiSpiritual=' + nilaiSpiritual + '&nisn=' + nisn + '&kodeKelas=' + kodeKelas + '&tahun_akademik=' + tahun_akademik,
            success: function(data) {
                $('#listdata').html(data)
            }
        })
    }

    function getNilaiSosial(nisn, kode) {
        // var tahun_akademik = $("#tahun_akademik").val()
        var nilaiSosial = $("#nilaiSosial" + nisn).val();
        var kodeKelas = kode;
        console.log(nilaiSosial);
        $.ajax({
            type: 'Get',
            url: '<?= base_url("Penilaian/capaianbelajar/getNilaiSosial") ?>',
            data: 'nilaiSosial=' + nilaiSosial + '&nisn=' + nisn + '&kodeKelas=' + kodeKelas,
            success: function(data) {
                $('#listdata').html(data)
            }
        })
    }

    function getDeskripsiSpiritual(nisn, kode) {
        // var tahun_akademik = $("#tahun_akademik").val()
        var deskripsiSpiritual = $("#deskripsiSpiritual" + nisn).val();
        var kodeKelas = kode;
        console.log(deskripsiSpiritual);
        $.ajax({
            type: 'Get',
            url: '<?= base_url("Penilaian/capaianbelajar/getDeskripsiSpiritual") ?>',
            data: 'deskripsiSpiritual=' + deskripsiSpiritual + '&nisn=' + nisn + '&kodeKelas=' + kodeKelas,
            success: function(data) {
                $('#listdata').html(data)
            }
        })
    }

    function getDeskripsiSosial(nisn, kode) {
        // var tahun_akademik = $("#tahun_akademik").val()
        var deskripsiSosial = $("#deskripsiSosial" + nisn).val();
        var kodeKelas = kode;
        console.log(deskripsiSosial);
        $.ajax({
            type: 'Get',
            url: '<?= base_url("Penilaian/capaianbelajar/getDeskripsiSosial") ?>',
            data: 'deskripsiSosial=' + deskripsiSosial + '&nisn=' + nisn + '&kodeKelas=' + kodeKelas,
            success: function(data) {
                $('#listdata').html(data)
            }
        })
    }
</script>