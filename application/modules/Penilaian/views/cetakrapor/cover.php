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
    <h1 align=center>RAPORT SISWA <br>SEKOLAH MENENGAH PERTAMA <br> (SMP)</h1>
    <center>
        <img width='170px' src='assets/images/tutwurihanda.png'><br><br><br><br><br><br><br><br>
        Nama Siswa :<br>
        <h3 style='border:1px solid #000; width:100%; padding:6px'><?= $row->namaSiswa ?></h3><br><br>

        NIS / NISN<br>
        <h3 style='border:1px solid #000; width:100%; padding:3px'><?= $row->nis ?>/<?= $row->nisn ?></h3><br><br><br><br><br><br><br><br><br>

        <p style='font-size:22px'>KEMENTERIAN PENDIDIKAN DAN KEBUDAYAAN <br>REPUBLIK INDONESIA</p>
    </center>
</body>

</html>
<?=
$html = ob_get_clean();
?>