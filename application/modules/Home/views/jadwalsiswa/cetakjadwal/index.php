<?php
$linkin = $this->uri->segment(1) . '/' . $this->uri->segment(2);
$no = 1;
ob_start();
?>


<!DOCTYPE html>
<html>

<head>
    <title>Laporan</title>
</head>

<body>

    <p align="center">
        <img src="<?= base_url() ?>/assets/images/tutwurihanda.png" alt="logo" style="position: absolute; width: 80px; height: auto; ">
        <b>

            <font size="4">Sekolah Menengah Pertama Negeri 2 Muara Uya</font> <br>
            <font size="2">Jln. Bukti Utama No.7 Desa Ribang RT.08 Muara Uya Kabupaten Tabalong Kalimantan Selatan </font><br>
            <font size="2">Telp. (0511)1234567, Website : www.smpn2muarauya.sch.id</font><br>
            <hr size="2px" color="black">
        </b>
    </p>
    <h4>
        <center>
            <u>Jadwal Pelajaran</u><br>
        </center>
    </h4>
    <div class="row">
        <div class="col-sm-12">
            <div class="card-box table-responsive">
                <table border="1" cellspacing="0" cellpadding="6" width="100%">
                    <thead>
                        <tr bgcolor="#C2C2C2">
                            <th style="text-align: center; font-size: 12px;">No</th>

                            <th style="text-align: center; font-size: 12px;">Hari</th>
                            <th style="text-align: center; font-size: 12px;">Mata Pelajaran</th>
                            <th style="text-align: center; font-size: 12px;">Jam Mulai / Jam Selesai</th>
                            <th style="text-align: center; font-size: 12px;">Guru Pengampu</th>


                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($data as $row) : ?>
                            <tr>
                                <td align="center"> <?php echo $no++ ?></td>

                                <td></td>
                                <td align="center"><?php echo $row->namaHari ?></td>
                                <td align="center"><?php echo $row->namaMapel ?></td>
                                <td align="center"><?php echo $row->jamMulai ?> / <?php echo $row->jamSelesai ?></td>
                                <td align="center"><?php echo $row->namaGuru ?></td>

                            </tr>
                        <?php endforeach ?>
                    </tbody>

                </table>
                <br><br><br>
                <table width='40%' style='float:right'>
                    <tr>
                        <td>Muara Uya, 10 Novermber 2020 <br>
                            Kepala Sekolah,<br><br><br><br>


                            <b>Yadi Karnadi<br>
                                NIP : 1962090511007</b>
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