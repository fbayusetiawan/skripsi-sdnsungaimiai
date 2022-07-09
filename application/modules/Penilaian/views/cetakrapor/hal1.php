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
    <h1 align=center>RAPORT <br>SEKOLAH MENENGAH PERTAMA <br> (SMP)</h1><br>

    <table style='font-size:23px' width='100%'>
        <tr>
            <td width='180px'>Nama Sekolah</td>
            <td width='10px'> : </td>
            <td> <?= $data->namaSekolah  ?></td>
        </tr>
        <tr>
            <td width='180px'>NPSN</td>
            <td width='10px'> : </td>
            <td> <?= $data->npsn  ?></td>
        </tr>
        <tr>
            <td width='180px'>NSS</td>
            <td width='10px'> : </td>
            <td> -</td>
        </tr>
        <tr>
            <td width='180px'>Alamat Sekolah</td>
            <td width='10px'> : </td>
            <td> <?= $data->alamat  ?></td>
        </tr>
        <tr>
            <td width='180px'></td>
            <td width='10px'> </td>
            <td> Kode Pos <?= $data->kodePos  ?>, Telp. <?= $data->noTelp  ?></td>
        </tr>
        <tr>
            <td width='180px'>Kelurahan</td>
            <td width='10px'> : </td>
            <td> <?= $data->kelurahan  ?></td>
        </tr>
        <tr>
            <td width='180px'>Kecamatan</td>
            <td width='10px'> : </td>
            <td> <?= $data->kecamatan  ?></td>
        </tr>
        <tr>
            <td width='180px'>Kabupaten/Kota</td>
            <td width='10px'> : </td>
            <td> <?= $data->kabupaten  ?></td>
        </tr>
        <tr>
            <td width='180px'>Provinsi</td>
            <td width='10px'> : </td>
            <td> Kalimantan Selatan</td>
        </tr>
        <tr>
            <td width='180px'>Website</td>
            <td width='10px'> : </td>
            <td> <?= $data->website  ?></td>
        </tr>
        <tr>
            <td width='180px'>E-Mail</td>
            <td width='10px'> : </td>
            <td> <?= $data->email  ?></td>
        </tr>
    </table>
</body>

</html>
<?=
$html = ob_get_clean();
?>