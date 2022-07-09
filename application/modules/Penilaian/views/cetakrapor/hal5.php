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
    <b>B. Pengetahuan</b><br>
    <table id='tablemodul1' width=95% border=1>
        <tr>
            <th width='160px' colspan='2' rowspan='2'>
                <center>Mata Pelajaran</center>
            </th>
            <th rowspan='2'>
                <center>KKM</center>
            </th>
            <th colspan='2' style='text-align:center'>
                <center>Keterampilan</center>
            </th>
        </tr>
        <tr>
            <th>
                <center>Nilai</center>
            </th>

            <th width='360px'>
                <center>Deskripsi</center>
            </th>
        </tr>

        <?php foreach ($keter as $ket) : ?>
            <tr>
                <td align=center><?= $no++ ?></td>
                <td width='160px'> <?= $ket->namaMapel ?></td>
                <td align=center>77</td>
                <td align=center><?= $ket->rerata  ?></td>

                <td align=center><?= $ket->deskripsi ?></td>

            </tr>
        <?php endforeach ?>

    </table>
</body>

</html>
<?=
$html = ob_get_clean();
?>