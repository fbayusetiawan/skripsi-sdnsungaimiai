<?php
$linkin = $this->uri->segment(1) . '/' . $this->uri->segment(2);
$no = 1;
$now = date('Y-m-d');
$kode = $this->uri->segment(4);
$kode1 = $this->uri->segment(5);
ob_start();
?>


<!DOCTYPE html>
<html>

<head>
    <title>Laporan</title>
</head>

<body>

    <p align="center">
        <img src="<?= base_url() ?>/assets/images/tutwurihanda.png" align="left" width="75">
        <b>
            <font size="4">Sekolah Dasar Negeri Standar Nasional Sungai Miai 5</font> <br>
            <font size="2">Jl. Mahoni Blok 2 No.1, RT.33, Sungai Miai, Kec. Banjarmasin Utara, Kota Banjarmasin,</font><br>
            <font size="2">Kalimantan Selatan 70123 </font><br>
            <font size="2">Telp. (0511)3303022, Website : www.sdnsnsungaimiai5.sch.id</font><br>
            <hr size="2px" color="black">
        </b>
    </p>
    <h4>
        <center>
            <u>DATA REKAP ABSENSI SISWA</u><br>
        </center>
    </h4>
    <div class="row">
        <div class="col-sm-12">
            <div class="card-box table-responsive">
                <table border="1" cellspacing="0" cellpadding="6" width="100%">
                    <thead>
                        <tr>
                            <th>
                                <center>No</center>
                            </th>
                            <th>NISN / NIS</th>
                            <th>Nama Lengkap</th>
                            <th>
                                <center>Pertemuan</center>
                            </th>
                            <th>
                                <center>Hadir</center>
                            </th>
                            <th>
                                <center>Sakit</center>
                            </th>
                            <th>
                                <center>Izin</center>
                            </th>
                            <th>
                                <center>Alpa</center>
                            </th>

                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($data as $row) : ?>
                            <tr>
                                <td>
                                    <center><?= $no++ ?></center>
                                </td>
                                <td><?= $row->nisn ?>/<?= $row->nis ?></td>
                                <td><?= $row->namaSiswa ?></td>
                                <td>
                                    <center><?= getKehadiran($kode, $row->nisn) ?></center>
                                </td>
                                <td>
                                    <center> <?= getKehadiranWhere($kode, $row->nisn, 'H') ?></center>
                                </td>
                                <td>
                                    <center> <?= getKehadiranWhere($kode, $row->nisn, 'S') ?></center>
                                </td>
                                <td>
                                    <center><?= getKehadiranWhere($kode, $row->nisn, 'I') ?></center>
                                </td>
                                <td>
                                    <center> <?= getKehadiranWhere($kode, $row->nisn, 'A') ?></center>
                                </td>
                               
                            </tr>
                        <?php endforeach ?>
                    </tbody>

                </table>
                <br>
                <table width='40%' style='float:right'>
                    <tr>
                        <td>Banjarmasin, <?= tgl_indo($now) ?></p>


                            Kepala Sekolah,<br><br><br><br>


                            <b> <?= ttd('1')->namaGuru ?> <br>
                                NIP : <?= ttd('1')->nip ?></b>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <br>
    <br>

    <br>


</body>

</html>

<?=
$html = ob_get_clean();
?>