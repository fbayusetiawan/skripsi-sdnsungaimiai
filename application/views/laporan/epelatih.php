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
            LAPORAN HONOR PELATIH EKSTRAKURIKULER TANGGAL <?= tgl_indo($call_tanggal) ?> TAHUN AJARAN <?= call_ta($this->session->userdata('idta')) ?>
        </center>
    </h3>
    <div class="row">
        <div class="col-sm-12">
            <div class="card-box table-responsive">
                <table border="1" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th style="text-align:center; font-size: 18px;">No</th>
                            <th style="text-align:center; font-size: 18px;">Nama Pelatih</th>
                            <th style="text-align:center; font-size: 18px;">Dari Dana</th>
                            <th style="text-align:center; font-size: 18px;">Honor</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($data as $row) : ?>
                            <tr>
                                <td align="center"><?= $no++ ?></td>
                                <td><?= $row->namaPelatih ?></td>
                                <td><?= $row->jenisDana == '1' ? 'Bosda' : 'Bosnas' ?></td>
                                <td align="right"><?= number_format(floatval($row->honor), 0, ',', '.') ?></td>

                            </tr>
                        <?php endforeach; ?>
                        <tr>
                            <td></td>
                            <td colspan="2"> <b>Total Bosda</b></td>
                            <td align="right"><b><?= number_format(floatval($bosda), 0, ',', '.') ?></b></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td colspan="2"> <b>Total Bosnas</b></td>
                            <td align="right"><b><?= number_format(floatval($bosnas), 0, ',', '.') ?></b></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td colspan="2"> <b>Total Dana Bos</b></td>
                            <td align="right"><b><?= number_format(floatval($bosda + $bosnas), 0, ',', '.') ?></b></td>
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