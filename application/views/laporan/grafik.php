<?php
$no = 2;
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
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
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
            GRAFIK PENGELUARAN TAHUN AJARAN <?= call_ta($this->session->userdata('idta')) ?>
        </center>
    </h3>
    <div class="row">
        <div class="col-sm-12">
            <div class="card-box table-responsive">
                <div id="myfirstchart" style="height: 250px;"></div>
            </div>
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
<script>
    new Morris.Bar({
        // ID of the element in which to draw the chart.
        element: 'myfirstchart',
        // Chart data records -- each entry in this array corresponds to a point on
        // the chart.
        data: <?= $data ?>,
        // The name of the data record attribute that contains x-values.
        xkey: 'keterangan',
        // A list of names of data record attributes that contain y-values.
        ykeys: ['pengeluaran'],
        // Labels for the ykeys -- will be displayed when you hover over the
        // chart.
        labels: ['Rp.']
    })
</script>

</html>