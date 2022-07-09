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
        <b>
            <img src="<?= base_url() ?>/assets/images/logo/smatanjung.png" align="left" width="65">
            <font size="5">SMAN 1 TANJUNG</font> <br>
            Komplek Pertamina, Jl. Gelatik, Murung Pudak, Belimbing, Murung Pudak, Kabupaten Tabalong, Kalimantan Selatan 71571
        </b><br>
    </p>
    <hr size="1px" color="black">
    <hr size="4px" color="black">

    <h3>
        <center>
            LAPORAN AKUNTANSI SEDERHANA TAHUN AJARAN <?= call_ta($this->session->userdata('idta')) ?> <br>
            DANA BOS NASIONAL
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
            <td align="center">Bandahara<br><br><br></td>
            <td></td>
            <td align="center">Kepala Sekolah <br><br><br></td>
        </tr>
        <tr>
            <td align="center"><?= ttd('bandahara')->namaLengkap ?> <br>NIK.<?= ttd('bandahara')->nip ?></td>
            <td></td>
            <td align="center"><?= ttd('Kepala Sekolah')->namaLengkap ?><br>NIK.<?= ttd('Kepala Sekolah')->nip ?></td>
        </tr>
    </table>
</body>

</html>