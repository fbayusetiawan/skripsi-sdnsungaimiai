<?php
$no = 2;
$now = date('Y-m-d');
$kas = $kredit - $debet;
?>

<script type="text/javascript">
    window.print();
</script>

<!DOCTYPE html>
<html>

<head>
    <title>LAPORAN</title>
    <link rel="shortcut icon" href="<?= base_url() ?>assets/images/favicon.ico">
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
    <hr size="1px" color="black">
    <hr size="4px" color="black">

    <h3>
        <center>
            LAPORAN AKUNTANSI SEDERHANA TAHUN AJARAN <?= call_ta($this->session->userdata('idta')) ?> <br>
            DANA BOS DAERAH
        </center>
    </h3>
    <div class="row">
        <div class="col-sm-12">
            <div class="card-box table-responsive">
                <table border="1" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th style="text-align:center; font-size: 18px;">No</th>
                            <th style="text-align:center; font-size: 18px;">Keterangan</th>
                            <th style="text-align:center; font-size: 18px;">Kredit</th>
                            <th style="text-align:center; font-size: 18px;">Debet</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td align="center">1</td>
                            <td>Kas</td>

                            <td align="right">0</td>
                            <td align="right"><?= number_format(floatval($kas), 0, ',', '.') ?></td>
                        </tr>
                        <?php foreach ($data as $row) : ?>
                            <tr>
                                <td align="center"><?= $no++ ?></td>
                                <td><?= $row->keterangan ?></td>

                                <td align="right"><?= number_format(floatval($row->kredit), 0, ',', '.') ?></td>
                                <td align="right"><?= number_format(floatval($row->debit), 0, ',', '.') ?></td>

                            </tr>
                        <?php endforeach; ?>
                        <tr>
                            <td></td>
                            <td> <b>Jumlah</b></td>
                            <td align="right"><b><?= number_format(floatval($kredit), 0, ',', '.') ?></b></td>
                            <td align="right"><b><?= number_format(floatval($kas + $debet), 0, ',', '.') ?></b></td>
                        </tr>
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