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
            <u>DATA SELURUH SISWA SD NEGERI STANDAR NASIONAL SUNGAI MIAI 5 BANJARMASIN</u><br>
        </center>
    </h4>
    <div class="row">
        <div class="col-sm-12">
            <div class="card-box table-responsive">
                <table border="1" cellspacing="0" cellpadding="6" width="100%">
                    <thead>
                        <tr bgcolor="#C2C2C2">
                            <th style="text-align: center; font-size: 12px;">No</th>
                            <!-- <th style="text-align: center; font-size: 12px;">Foto</th> -->
                            <th style="text-align: center; font-size: 12px;">NISN/NIS</th>
                            <th style="text-align: center; font-size: 12px;">Nama Lengkap</th>
                            <th style="text-align: center; font-size: 12px;">Jenis Kelamin</th>
                            <th style="text-align: center; font-size: 12px;">TTL</th>
                            <th style="text-align: center; font-size: 12px;">Angkatan</th>

                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($data as $row) : ?>
                            <tr>
                                <td align="center"><?= $no++; ?></td>
                                <!-- <td align="center"><img src="<?= base_url() ?>/assets/images/aset/<?= $row->foto ?>"></td> -->
                                <td><?= $row->nisn ?>/<?= $row->nis ?></td>
                                <td align="center"><?= $row->namaSiswa ?></td>
                                <td align="center"><?= $row->jk == 'L' ? 'Laki-laki' : 'Perempuan' ?></td>
                                <td align="center"><?= $row->tempatLahir ?>, <?= tgl_indo($row->tanggalLahir) ?></td>
                                <td align="center"><?= $row->angkatan ?></td>

                            </tr>
                        <?php endforeach ?>
                    </tbody>

                </table>
                <br>
                <table width='40%' style='float:right'>
                    <tr>
                        <td>Banjarmasin, <?= tgl_indo($now) ?></p>


                            Kepala Sekolah,<br><br><br><br>


                            <b> <?= $guru->namaGuru ?> <br>
                                NIP : <?= $guru->nip ?></b>
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