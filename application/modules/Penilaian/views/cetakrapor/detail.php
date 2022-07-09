<?php
$linkin = $this->uri->segment(1) . '/' . $this->uri->segment(2);
$no = '1';
$kode = $this->uri->segment(4);
?>
<div class="row page-title">
    <div class="col-md-12">
        <!-- <nav aria-label="breadcrumb" class="float-right mt-1">
            <ol class="breadcrumb">
                <li><a href="<?= base_url($linkin . '/add') ?>" class="btn btn-success">Tambah Data</a></li>
            </ol>
        </nav> -->
        <h4 class="mb-1 mt-0">Data <?= $title ?></h4>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">


                <table id="basic-datatable" class="table nowrap">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NISN / NIS</th>
                            <th>Nama Lengkap</th>
                            <th>
                                <center>Aksi</center>
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
                                    <center>
                                        <div class="btn-group mb-0">
                                            <a href="<?= base_url($linkin . '/cover/' . $row->nisn . '/' . $tahun) ?>" class="btn btn-success btn-sm" data-toggle="tooltip" title="Cover"><i class="uil uil-print"></i> Cover</a>
                                        </div>
                                        <div class="btn-group mb-0">
                                            <a href="<?= base_url($linkin . '/hal1/' . $row->nisn . '/' . $tahun) ?>" class="btn btn-success btn-sm" data-toggle="tooltip" title="Hal 1"><i class="uil uil-print"></i> Hal 1</a>
                                        </div>
                                        <div class="btn-group mb-0">
                                            <a href="<?= base_url($linkin . '/hal2/' . $row->nisn . '/' . $tahun) ?>" class="btn btn-success btn-sm" data-toggle="tooltip" title="Hal 2"><i class="uil uil-print"></i> Hal 2</a>
                                        </div>
                                        <div class="btn-group mb-0">
                                            <a href="<?= base_url($linkin . '/hal3/' . $row->nisn . '/' . $tahun) ?>" class="btn btn-success btn-sm" data-toggle="tooltip" title="Hal 3"><i class="uil uil-print"></i> Hal 3</a>
                                        </div>
                                        <div class="btn-group mb-0">
                                            <a href="<?= base_url($linkin . '/hal4/' . $row->nisn . '/' . $tahun) ?>" class="btn btn-success btn-sm" data-toggle="tooltip" title="Hal 4"><i class="uil uil-print"></i> Hal 4</a>
                                        </div>
                                        <div class="btn-group mb-0">
                                            <a href="<?= base_url($linkin . '/hal5/' . $row->nisn . '/' . $tahun) ?>" class="btn btn-success btn-sm" data-toggle="tooltip" title="Hal 5"><i class="uil uil-print"></i> Hal 5</a>
                                        </div>
                                        <div class="btn-group mb-0">
                                            <a href="<?= base_url($linkin . '/hal6/' . $row->nisn . '/' . $tahun) ?>" class="btn btn-success btn-sm" data-toggle="tooltip" title="Hal 6"><i class="uil uil-print"></i> Hal 6</a>
                                        </div>
                                        <div class="btn-group mb-0">
                                            <a href="<?= base_url($linkin . '/allrapor/' . $row->nisn . '/' . $tahun) ?>" class="btn btn-success btn-sm" data-toggle="tooltip" title="Cetak"><i class="uil uil-print"></i>Cetak</a>
                                        </div>
                                    </center>
                                </td>

                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
                <div class="text-right">

                    <a href="<?= base_url($linkin) ?>" class="btn btn-danger">Kembali</a>
                </div>
                </form>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>
<!-- end row-->
<script>
    function nilai1(nisn, kode) {
        var pengetahuan = $("#pengetahuan" + nisn).val();
        var kodeJadwal = kode;
        console.log(pengetahuan)
        $.ajax({
            type: 'Get',
            url: '<?= base_url("Penilaian/penilaianuts/nilai1") ?>',
            data: 'pengetahuan=' + pengetahuan + '&nisn=' + nisn + '&kodeJadwal=' + kodeJadwal,
            success: function(data) {
                $('#listdata').html(data)
            }
        })
    }

    function insertKeterampilan(nisn, kode) {
        var keterampilan = $("#keterampilan" + nisn).val();
        var kodeJadwal = kode;
        console.log(keterampilan)
        $.ajax({
            type: 'Get',
            url: '<?= base_url("Penilaian/penilaianuts/insertKeterampilan") ?>',
            data: 'keterampilan=' + keterampilan + '&nisn=' + nisn + '&kodeJadwal=' + kodeJadwal,
            success: function(data) {
                $('#listdata').html(data)
            }
        })
    }

    function gradePengetahuan(nisn) {
        var pengetahuan = $("#pengetahuan" + nisn).val();

        console.log(pengetahuan)
        $.ajax({

            url: '<?= base_url("Penilaian/penilaianuts/gradePengetahuan") ?>',
            data: 'pengetahuan=' + pengetahuan,
            success: function(data) {
                var json = data,
                    obj = JSON.parse(json);
                $('#gp').val(obj.grade)
            }
        })
    }

    function gradeKeterampilan(nisn) {
        var keterampilan = $("#keterampilan" + nisn).val();

        console.log(keterampilan)
        $.ajax({

            url: '<?= base_url("Penilaian/penilaianuts/gradeKeterampilan") ?>',
            data: 'keterampilan=' + keterampilan,
            success: function(data) {
                var json = data,
                    obj = JSON.parse(json);
                $('#gk').val(obj.grade)
            }
        })
    }
</script>