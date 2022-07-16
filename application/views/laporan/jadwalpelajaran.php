<?php
$no = 1;
$now = date('Y-m-d');

?>

<script type="text/javascript">
    window.print();
</script>

<!DOCTYPE html>
<html>

<head>
    <title>LAPORAN</title>
    <link rel="shortcut icon" href="<?= base_url() ?>assets/images/tutwurihanda.png">
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

    <h3>
        <center>
            JADWAL PELAJARAN
        </center>
    </h3>
    <div class="row">
        <div class="col-sm-12">
            <div class="card-box table-responsive">
                <table border="1" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Hari</th>
                            <th>Kelas</th>
                            <th>Jam Mulai / Selesai</th>
                            <th>Nama Pelajaran</th>
                            <th>Nama Guru</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($data as $row) : ?>
                            <td> <?= $no++  ?> </td>
                            <td> <?= $row->namaHari ?> </td>
                            <td> <?= $row->namaKelas ?> </td>
                            <td> <?= $row->jamMulai ?> / <?= $row->jamSelesai ?> </td>
                            <td> <?= $row->namaMapel ?> </td>
                            <td> <?= $row->namaGuru ?> </td>
                        <?php endforeach; ?>
                    </tbody>

                </table>

            </div>
        </div>
    </div>
    <br>

    <br>
    <table width="100%">
        <tr>
            <td width="40%"></td>
            <td width="20%"></td>
            <td align="center">Banjarmasin, <?= tgl_indo($now) ?></td>
        </tr>
        <tr>
            <td align="center">Bendahara<br><br><br></td>
            <td></td>
            <td align="center">Kepala Sekolah <br><br><br></td>
        </tr>
        <tr>
            <td align="center"><?= ttd('3')->namaGuru ?> <br>NIP.<?= ttd('3')->nip ?></td>
            <td></td>
            <td align="center"><?= ttd('1')->namaGuru ?><br>NIP.<?= ttd('1')->nip ?></td>
        </tr>
    </table>
</body>

</html>