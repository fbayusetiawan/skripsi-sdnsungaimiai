<?php
$linkin = $this->uri->segment(1) . '/' . $this->uri->segment(2);
$no = '1';
$kode = $this->uri->segment(4);
?>
<div class="row page-title">
    <div class="col-md-12">
        <nav aria-label="breadcrumb" class="float-right mt-1">
            <ol class="breadcrumb">
                <li>
                    <?= cmb_dinamis('idTahunAjaran', 'tahunajaran', 'tahunAjaran', 'idTahunAjaran', '', ' id="tahunajaran"') ?>
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
                <form action="<?= base_url($linkin . '/addAction') ?>" method="post">
                    <div class="col-3 mt-3">

                    </div>
                    <table id="basic-datatable" class="table nowrap">
                        <thead class="thead-light">
                            <tr>
                                <th>No</th>
                                <th>NISN / NIS</th>
                                <th>Nama Lengkap</th>
                                <th>UH</th>
                                <th>UTS</th>
                                <th>UAS</th>
                                <th>Rata2</th>
                                <!-- <th>Grade</th> -->
                                <th>Deskripsi</th>
                            </tr>

                        </thead>
                        <tbody>
                            <?php foreach ($data as $row) : ?>
                                <?php
                                $this->db->where('nisn', $row->nisn);
                                $this->db->where('kodeJadwal', $kode);
                                $hasil = $this->db->get('nilai_keterampilan')->row();
                                if (empty($hasil->idNilaiKeterampilan)) :
                                    $uhk = '';
                                    $utsk = '';
                                    $uask = '';
                                    $rk = '';
                                    $dkk = '';
                                else :
                                    $uhk = $hasil->nilaiuh;
                                    $utsk = $hasil->nilaiuts;
                                    $uask = $hasil->nilaiuas;
                                    $rk = $hasil->rerata;
                                    $dkk = $hasil->deskripsi;
                                endif;
                                ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $row->nisn ?>/<?= $row->nis ?></td>
                                    <td><?= $row->namaSiswa ?></td>
                                    <td><input style="width: 40px;" type="text" onkeyup="nilaiuhk('<?= $row->nisn ?>','<?= $kode ?>')" id="nilai1<?= $row->nisn ?>" value="<?= $uhk ?>">
                                    <td><input style="width: 40px;" type="text" onkeyup="nilaiutsk('<?= $row->nisn ?>','<?= $kode ?>')" id="nilai2<?= $row->nisn ?>" id="nilaiuts<?= $row->nisn ?>" value="<?= $utsk ?>">
                                    <td><input style="width: 40px;" type="text" onkeyup="nilaiuask('<?= $row->nisn ?>','<?= $kode ?>')" id="nilai3<?= $row->nisn ?>" id="nilaiuas<?= $row->nisn ?>" value="<?= $uask ?>">
                                    <td><input style="width: 40px;" type="text" id="rerata<?= $row->nisn ?>" value="<?= number_format(floatval($rk), 0, ',', '.')  ?>" disabled>
                                        <!-- <td><input style="width: 40px;" type="text" id="gk<?= $row->nisn ?>" disabled> -->
                                    <td>
                                        <div class="form-row align-items">

                                            <div class="col-auto">
                                                <div class="input-group">
                                                    <textarea class="form-control" rows="4" id="deskripsi<?= $row->nisn ?>"><?= $dkk ?></textarea>
                                                </div>
                                            </div>

                                        </div>
                                    </td>


                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                    <div class="text-right">
                        <!-- <button class="btn btn-primary" type="submit">Simpan</button> -->
                        <a href="<?= base_url($linkin) ?>" class="btn btn-danger">Kembali</a>
                    </div>
                </form>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>
<!-- end row-->
<script>
    function nilaiuhk(nisn, kode) {
        var tahunajaran = $("#tahunajaran").val()
        var nilai1 = $("#nilai1" + nisn).val();
        var kodeJadwal = kode;
        console.log(nilai1)
        $.ajax({
            type: 'Get',
            url: '<?= base_url("Penilaian/nilairapor/nilaiuhk") ?>',
            data: 'nilai1=' + nilai1 + '&nisn=' + nisn + '&kodeJadwal=' + kodeJadwal + '&tahunajaran=' + tahunajaran,
            success: function(data) {
                gradeReratak(nisn, kode);
            }
        })
    }

    function nilaiutsk(nisn, kode) {
        var nilai2 = $("#nilai2" + nisn).val();
        var kodeJadwal = kode;
        console.log(nilai2)
        $.ajax({
            type: 'Get',
            url: '<?= base_url("Penilaian/nilairapor/nilaiutsk") ?>',
            data: 'nilai2=' + nilai2 + '&nisn=' + nisn + '&kodeJadwal=' + kodeJadwal,
            success: function(data) {
                gradeReratak(nisn, kode);
            }
        })
    }

    function nilaiuask(nisn, kode) {
        var nilai3 = $("#nilai3" + nisn).val();
        var kodeJadwal = kode;
        console.log(nilai3)
        $.ajax({
            type: 'Get',
            url: '<?= base_url("Penilaian/nilairapor/nilaiuask") ?>',
            data: 'nilai3=' + nilai3 + '&nisn=' + nisn + '&kodeJadwal=' + kodeJadwal,
            success: function(data) {
                gradeReratak(nisn, kode);
            }
        })
    }

    function deskripsik(nisn, kode) {
        var deskripsi = $("#deskripsi" + nisn).val();
        var kodeJadwal = kode;
        console.log(deskripsi)
        $.ajax({
            type: 'Get',
            url: '<?= base_url("Penilaian/nilairapor/deskripsik") ?>',
            data: 'deskripsi=' + deskripsi + '&nisn=' + nisn + '&kodeJadwal=' + kodeJadwal,
            success: function(data) {
                $('#listdata').html(data)
            }
        })
    }

    function gradeReratak(nisn, kode) {
        var nilai1 = $("#nilai1" + nisn).val();
        var nilai2 = $("#nilai2" + nisn).val();
        var nilai3 = $("#nilai3" + nisn).val();
        var kodeJadwal = kode;


        $.ajax({

            url: '<?= base_url("Penilaian/nilairapor/gradeReratak") ?>',
            data: 'nilai1=' + nilai1 + '&nilai2=' + nilai2 + '&nilai3=' + nilai3 + '&nisn=' + nisn + '&kodeJadwal=' + kodeJadwal,
            success: function(data) {
                var json = data,
                    obj = JSON.parse(json);
                $('#rerata' + nisn).val(obj.rerata)
                $('#deskripsi' + nisn).val(obj.deskripsi)
            }
        })
    }

    // function gradeKeterampilan(nisn) {
    //     var keterampilan = $("#keterampilan" + nisn).val();

    //     console.log(keterampilan)
    //     $.ajax({

    //         url: '<?= base_url("Penilaian/nilairapor/gradeKeterampilan") ?>',
    //         data: 'keterampilan=' + keterampilan,
    //         success: function(data) {
    //             var json = data,
    //                 obj = JSON.parse(json);
    //             $('#gk' + nisn).val(obj.grade)
    //         }
    //     })
    // }
</script>