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
    <h1 align=center>IDENTITAS PESERTA DIDIK</h1><br>

    <table style='font-size:15px' width='100%'>
        <tr>
            <td width='25px'>1.</td>
            <td width='190px'>Nama Lengkap Peserta Didik</td>
            <td width='10px'> : </td>
            <td> <?php echo $row->namaSiswa  ?></td>
        </tr>
        <tr>
            <td>2.</td>
            <td width='190px'>Nomor Induk/NISN</td>
            <td width='10px'> : </td>
            <td> <?php echo $row->nis  ?>/<?php echo $row->nisn  ?></td>
        </tr>
        <tr>
            <td>3.</td>
            <td width='190px'>Tempat,Tanggal Lahir</td>
            <td width='10px'> : </td>
            <td> <?php echo $row->tempatLahir  ?>, <?php echo tgl_indo($row->tanggalLahir) ?></td>
        </tr>
        <tr>
            <td>4.</td>
            <td width='190px'>Jenis Kelamin</td>
            <td width='10px'> : </td>
            <td> <?= $row->jk == 'L' ? 'Laki-Laki' : 'Perempuan' ?> </td>
        </tr>
        <tr>
            <td>5.</td>
            <td width='190px'>Agama</td>
            <td width='10px'> : </td>
            <td> <?= $row->agama ?></td>
        </tr>
        <tr>
            <td>6.</td>
            <td width='190px'>Status dalam Keluarga</td>
            <td width='10px'> : </td>
            <td> <?= $row->statusKeluarga ?></td>
        </tr>
        <tr>
            <td>7.</td>
            <td width='190px'>Anak ke</td>
            <td width='10px'> : </td>
            <td> <?= $row->anakKe ?></td>
        </tr>
        <tr>
            <td>8.</td>
            <td width='190px'>Alamat Peserta Didik</td>
            <td width='10px'> : </td>
            <td> <?= $row->alamat ?>, RT.<?= $row->rt ?>, RW.<?= $row->rw ?>, Kel.<?= $row->kelurahan ?></td>
        </tr>
        <tr>
            <td></td>
            <td width='190px'>Kecamatan/Kabupaten</td>
            <td width='10px'> : </td>
            <td> Kec.<?= $row->kecamatan ?> / Kab.<?= $row->kabupaten ?></td>
        </tr>
        <tr>
            <td>9.</td>
            <td width='190px'>Nomor Telepon Rumah</td>
            <td width='10px'> : </td>
            <td> <?= $row->noTelp ?></td>
        </tr>
        <tr>
            <td>10.</td>
            <td width='190px'>Sekolah Asal</td>
            <td width='10px'> : </td>
            <td> <?= $row->asalSd ?></td>
        </tr>
        <!-- <tr>
            <td>11.</td>
            <td width='190px'>Diterima di sekolah ini</td>
            <td width='10px'> </td>
            <td> </td>
        </tr>
        <tr>
            <td></td>
            <td width='190px'>Di Kelas</td>
            <td width='10px'> : </td>
            <td> <?= $row->namaKelas ?></td>
        </tr> -->

        <tr>
            <td>11.</td>
            <td width='190px'>Orang Tua</td>
            <td width='10px'> </td>
            <td> </td>
        </tr>
        <tr>
            <td></td>
            <td width='190px'>a. Nama Ayah</td>
            <td width='10px'> : </td>
            <td> <?= $row->namaAyah ?></td>
        </tr>
        <tr>
            <td></td>
            <td width='190px'>b. Nama Ibu</td>
            <td width='10px'> : </td>
            <td> <?= $row->namaIbu ?></td>
        </tr>
        <tr>
            <td></td>
            <td width='190px'>c. Alamat</td>
            <td width='10px'> : </td>
            <td> <?= $row->alamatAyah ?></td>
        </tr>
        <tr>
            <td></td>
            <td width='190px'>d. Nomor Telepon/HP</td>
            <td width='10px'> : </td>
            <td> <?= $row->noHpAyah ?></td>
        </tr>
        <tr>
            <td>12.</td>
            <td width='190px'>Pekerjaan Orang Tua</td>
            <td width='10px'> </td>
            <td> </td>
        </tr>
        <tr>
            <td></td>
            <td width='190px'>a. Ayah</td>
            <td width='10px'> : </td>
            <td> <?= $row->pekerjaanAyah ?></td>
        </tr>
        <tr>
            <td></td>
            <td width='190px'>b. Ibu</td>
            <td width='10px'> : </td>
            <td> <?= $row->pekerjaanIbu ?></td>
        </tr>
        <tr>
            <td>13.</td>
            <td width='190px'>Wali Peserta Didik</td>
            <td width='10px'> </td>
            <td> </td>
        </tr>
        <tr>
            <td></td>
            <td width='190px'>a. Nama Wali</td>
            <td width='10px'> : </td>
            <td> <?= $row->namaWali ?></td>
        </tr>
        <tr>
            <td></td>
            <td width='190px'>b. No Telepon/HP</td>
            <td width='10px'> : </td>
            <td> <?= $row->noHpWali ?></td>
        </tr>
        <tr>
            <td></td>
            <td width='190px'>c. Alamat</td>
            <td width='10px'> : </td>
            <td> <?= $row->alamatWali ?></td>
        </tr>
    </table>
    <br><br><br>
    <table width='40%' style='float:right'>
        <tr>
            <td>Muara Uya, <?= tgl_indo($now) ?> <br>
                Kepala Sekolah,<br><br><br><br>


                <b> <?= $guru->namaGuru ?> <br>
                    NIP : <?= $guru->nip ?></b>
            </td>
        </tr>
    </table>
</body>

</html>
<?=
$html = ob_get_clean();
?>