<?php
$linkin = $this->uri->segment(1) . '/' . $this->uri->segment(2);
$no = '1';
// $kode = $this->uri->segment(4);

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
        <h4 class="mb-1 mt-0">Data <?= $title ?></h4>
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
                                    Nilai
                                </th>
                                <th>
                                    <center>Kegiatan Ekstrakulikuler</center>
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


                                        <input type="text" class="form-control" style="width: 80px;" onkeyup="getNilaiEkstrakulikuler('<?= $row->nisn ?>','<?= $row->kodeKelas ?>')" name="nilaiEkstrakulikuler" id="nilaiEkstrakulikuler<?= $row->nisn ?>">


                                    </td>
                                    <td>
                                        <div class="col-auto">
                                            <div class="input-group">
                                                <textarea class="form-control" rows="2" onkeyup="getKegiatan('<?= $row->nisn ?>','<?= $row->kodeKelas ?>')" name="kegiatan" id="kegiatan<?= $row->nisn ?>" placeholder="kegiatan"></textarea>
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
    function getNilaiEkstrakulikuler(nisn, kode) {
        var tahun_akademik = $("#tahun_akademik").val()
        var nilaiEkstrakulikuler = $("#nilaiEkstrakulikuler" + nisn).val();
        var kodeKelas = kode;
        console.log(nilaiEkstrakulikuler);
        $.ajax({
            type: 'Get',
            url: '<?= base_url("Penilaian/ekstrakulikuler/getNilaiEkstrakulikuler") ?>',
            data: 'nilaiEkstrakulikuler=' + nilaiEkstrakulikuler + '&nisn=' + nisn + '&kodeKelas=' + kodeKelas + '&tahun_akademik=' + tahun_akademik,
            success: function(data) {
                $('#listdata').html(data)
            }
        })
    }

    function getKegiatan(nisn, kode) {
        var tahun_akademik = $("#tahun_akademik").val()
        var kegiatan = $("#kegiatan" + nisn).val();
        var kodeKelas = kode;
        // console.log(kegiatan);
        $.ajax({
            type: 'Get',
            url: '<?= base_url("Penilaian/ekstrakulikuler/getKegiatan") ?>',
            data: 'kegiatan=' + kegiatan + '&nisn=' + nisn + '&kodeKelas=' + kodeKelas + '&tahun_akademik=' + tahun_akademik,
            success: function(data) {
                $('#listdata').html(data)
            }
        })
    }
</script>