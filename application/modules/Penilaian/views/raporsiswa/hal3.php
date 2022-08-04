<?php
$linkin = $this->uri->segment(1) . '/' . $this->uri->segment(2);
$no = 1;
$now = date('Y-m-d');
ob_start();
?>


<!DOCTYPE html>
<html>

<head>
    <title>Laporan</title>
</head>

<body>
    <table width=100%>
        <tr>
            <td width=140px>Nama Sekolah</td>
            <td> : <?= $data->namaSekolah ?></td>
            <td width=140px>Kelas </td>
            <td>: <?= $row->namaKelas  ?></td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td> : <?= $data->alamat ?></td>
            <td>Semester </td>
            <td>: <?= $c->namaTahun ?></td>
        </tr>
        <tr>
            <td>Nama Peserta Didik</td>
            <td> : <b><?= $row->namaSiswa ?></b> </td>
            <td>Tahun Ajaran </td>
            <td>: <?= $c->keterangan ?></td>
        </tr>
        <tr>
            <td>No Induk/NISN</td>
            <td> : <?= $row->nis ?> / <?= $row->nisn ?></td>
            <td> </td>
        </tr>
    </table><br>

    <h2 align=center>CAPAIAN HASIL BELAJAR</h2>
    <b>A. SIKAP</b><br>
    <b>1. Sikap Spiritual</b>
    <table width=100% border=1>
        <tr>
            <th width='190px'>
                <center>Predikat</center>
            </th>
            <th>
                <center>Deskripsi</center>
            </th>
        </tr>

        <tr>
            <th style='padding:100px'><?= $c->nilaiSpiritual ?></th>
            <th style='padding:20px'> <?= $c->deskripsiSpiritual ?> </th>
        </tr>

    </table><br />
    <b>2. Sikap Sosial</b>
    <table width=100% border=1>
        <tr>
            <th width='190px'>
                <center>Predikat</center>
            </th>
            <th>
                <center>Deskripsi</center>
            </th>
        </tr>

        <tr>
            <th style='padding:100px'><?= $c->nilaiSosial ?></th>
            <th style='padding:20px'><?= $c->deskripsiSosial ?></th>
        </tr>

    </table><br />
</body>

</html>
<?=
$html = ob_get_clean();
?>