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
                <form action="<?= base_url($linkin . '/addAction') ?>" method="post">
                    <div class="col-12">
                        <h6>Mata Pelajaran : </h6>

                    </div>
                    <div class="col-3 mt-3">

                    </div>
                    <table id="basic-datatable" class="table nowrap">
                        <thead class="thead-light">
                            <tr>
                                <th>No</th>
                                <th>NISN / NIS</th>
                                <th>Nama Lengkap</th>
                                <th>Pengetahuan</th>
                                <th>Keterampilan</th>
                            </tr>

                        </thead>
                        <tbody>
                            <?php foreach ($data as $row) : ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $row->nisn ?>/<?= $row->nis ?></td>
                                    <td><?= $row->namaSiswa ?></td>
                                    <td>
                                        <input style="width: 60px;" onkeyup="nilai1('<?= $row->nisn ?>','<?= $kode ?>'),gradePengetahuan('<?= $row->nisn ?>')" id="pengetahuan<?= $row->nisn ?>" type="text"> <input style="width: 60px;" type="text" id="gp<?= $row->nisn ?>" disabled>
                                    </td>

                                    <td>
                                        <input style="width: 60px;" onkeyup="insertKeterampilan('<?= $row->nisn ?>','<?= $kode ?>'),gradeKeterampilan('<?= $row->nisn ?>')" id="keterampilan<?= $row->nisn ?>" type="text"> <input style="width: 60px;" id="gk" type="text" disabled>
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
                $('#gp' + nisn).val(obj.grade)
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