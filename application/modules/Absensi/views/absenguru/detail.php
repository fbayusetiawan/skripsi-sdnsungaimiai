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
                        <h6>Pilih Tanggal Absen Terlebih Dahulu</h6>
                        <input class="form-control col-3" type="date" id="tanggal" name="tanggal" required>
                    </div>
                    <div class="col-3 mt-3">

                    </div>
                    <table id="basic-datatable" class="table dt-responsive nowrap">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NISN / NIS</th>
                                <th>Nama Lengkap</th>
                                <th>Jenis Kelamin</th>
                                <th>Kehadiran</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data as $row) : ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $row->nisn ?>/<?= $row->nis ?></td>
                                    <td><?= $row->namaSiswa ?></td>
                                    <td><?= $row->jk == 'L' ? 'Laki-laki' : 'Perempuan' ?></td>
                                    <td> <select class="form-control" onchange="getKehadiran('<?= $row->nisn ?>','<?= $kode ?>')" name="kehadiran" id="kehadiran<?= $row->nisn ?>">
                                            <option value="">--Pilih Kehadiran--</option>
                                            <option value="H">Hadir</option>
                                            <option value="I">Izin</option>
                                            <option value="S">Sakit</option>
                                            <option value="A">Alpa</option>
                                        </select> </td>
                                    <!-- <td><select style="width: 100px;" class="form-control" name="kehadiran">
                                            <option value="H">Hadir</option>
                                            <option value="I">Izin</option>
                                            <option value="S">Sakit</option>
                                            <option value="A">Alpa</option>
                                        </select></td> -->
                                    <td></td>

                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                    <!-- <button class="btn btn-primary" type="submit">Simpan Absensi</button> -->
                    <a href="<?= base_url($linkin) ?>" class="btn btn-danger">Kembali</a>
                </form>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>
<!-- end row-->
<script>
    function getKehadiran(nisn, kode) {
        var kehadiran = $("#kehadiran" + nisn).val();
        var kodeJadwal = kode;
        var tanggal = $("#tanggal").val();
        console.log(kodeJadwal)
        $.ajax({
            type: 'Get',
            url: '<?= base_url("Absensi/absensiswa/getKehadiran") ?>',
            data: 'kehadiran=' + kehadiran + '&nisn=' + nisn + '&kodeJadwal=' + kodeJadwal + '&tanggal=' + tanggal,
            success: function(data) {
                $('#listdata').html(data)
            }
        })
    }
</script>