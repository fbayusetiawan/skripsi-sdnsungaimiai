<?php
$linkin = $this->uri->segment(1) . '/' . $this->uri->segment(2);
$no = '1';
$kode = $this->uri->segment(3);
?>
<div class="row page-title">
    <div class="col-md-12">

        <nav aria-label="breadcrumb" class="float-right mt-1">

            <ol class="breadcrumb">
                <li>
                    <?= cmb_dinamis('kelas', 'kelas', 'namaKelas', 'kodeKelas', '', 'onchange="getJadwalPerhari()" id="kelas"') ?>
                </li>
            </ol>

        </nav>
        <nav aria-label="breadcrumb" class="float-right mt-1">
            <ol class="breadcrumb">
                <li>
                    <?= cmb_dinamis('tahun_akademik', 'tahun_akademik', 'namaTahun', 'kodeTahun', '', 'onchange="getJadwalPerhari()" id="tahun_akademik"') ?>
                </li>
            </ol>

        </nav>
        <h4 class="mb-1 mt-0">Data <?= $title ?></h4>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="col-12">
                <h6>Pilih Tanggal Absen Terlebih Dahulu</h6>
                <input class="form-control col-3" type="date" id="tanggal" name="tanggal" required>
            </div>
            <div class="card-body">
                <div id="listdata">

                </div>
                <!-- <table id="basic-datatable" class="table nowrap">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Hari</th>
                            <th>Kelas</th>
                            <th>Jam Mulai / Selesai</th>
                            <th>Nama Pelajaran</th>
                            <th>Nama Guru</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data as $row) : ?>
                            <tr>
                                <td> <?= $no++  ?> </td>
                                <td> <?php $row->namaHari ?> </td>
                                <td> <?php $row->namaKelas  ?> </td>
                                <td> <?php $row->jamMulai  ?> / <?php $row->jamSelesai ?> </td>
                                <td> <?php $row->namaMapel  ?> </td>
                                <td> <?php $row->namaGuru  ?> </td>
                                <td> <select class="form-control" onchange="getKehadiran('<?= $row->nip ?>','<?= $kode ?>')" name="kehadiran" id="kehadiran<?= $row->nip ?>">
                                        <option value="">--Pilih Kehadiran--</option>
                                        <option value="H">Hadir</option>
                                        <option value="I">Izin</option>
                                        <option value="S">Sakit</option>
                                        <option value="A">Alpa</option>
                                    </select> </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>

                </table> -->

            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>
<!-- end row-->

<script>
    function getJadwalPerhari() {
        var tahun_akademik = $("#tahun_akademik").val()
        var kelas = $("#kelas").val()
        var tanggal = $("#tanggal").val()
        console.log(tanggal)
        $.ajax({
            type: 'Get',
            url: '<?= base_url("Absensi/absenguru/getJadwalPerhari") ?>',
            data: 'kelas=' + kelas + '&tahun_akademik=' + tahun_akademik + '&tanggal=' + tanggal,
            success: function(data) {
                $('#listdata').html(data)
            }
        })
    }
</script>