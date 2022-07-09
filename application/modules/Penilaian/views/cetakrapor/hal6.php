<?php
$linkin = $this->uri->segment(1) . '/' . $this->uri->segment(2);
$no = 1;
$now = date('Y-m-d');
$kode = $this->uri->segment(4);
// ob_start();
?>


<!DOCTYPE html>
<html>

<head>
    <title>Laporan</title>
</head>

<body onload="window.print()">
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

    <b>D. Ekstrakulikuler</b><br>
    <table id='tablemodul1' width=100% border=1>
        <tr>
            <th width='30px'>
                <center> No</center>
            </th>
            <th width='40%'>
                <center> Nilai</center>
            </th>
            <th>
                <center>Kegiatan Ekstrakulikuler</center>
            </th>

        </tr>

        <tr>
            <td><?= $no++  ?></td>
            <td>
                <CEnter><?= $c->nilaiEkstrakulikuler ?></CEnter>
            </td>
            <td><?= $c->kegiatan ?></td>

        </tr>

    </table><br><br>

    <b>E. Ketidakhadiran</b><br>
    <table id='tablemodul1' width=85% border=1>
        <tr>
            <td width='70%'>Sakit</td>
            <td width='10px'> : </td>
            <td align=center><?= getKehadiranHal($row->nisn, 'S') ?></td>
        </tr>
        <tr>
            <td>Izin</td>
            <td> : </td>
            <td align=center><?= getKehadiranHal($row->nisn, 'I') ?></td>
        </tr>
        <tr>
            <td>Tanpa Keterangan</td>
            <td> : </td>
            <td align=center><?= getKehadiranHal($row->nisn, 'A') ?></td>
        </tr>
    </table><br>
    <table border=0 width=100%>
        <tr>
            <td width="300" align="left">Orang Tua / Wali</td>

            <td width="300" align="left">Muara Uya, <?= tgl_indo($now) ?> <br> Wali Kelas</td>
        </tr>
        <tr>
            <td align="left"><br /><br /><br />
                ................................... <br /><br /></td>



            <td align="left" valign="top"><br /><br /><br />
                <b><?= $walikelas->namaGuru ?><br />
                    NIP : <?= $walikelas->nip ?></b>
            </td><br /><br />
        </tr>
    </table>
    <table>
        <tr>
            <td width="500" align="center">Mengetahui <br> Kepala SMP Negeri 2 Muara Uya</td>
        </tr>
        <tr>
            <td align="center" valign="top"><br /><br /><br />
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