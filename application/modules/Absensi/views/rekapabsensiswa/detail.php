<?php
$linkin = $this->uri->segment(1) . '/' . $this->uri->segment(2);
$no = '1';
$kode = $this->uri->segment(4);

?>
<div class="row page-title">
    <div class="col-md-12">
        <!-- <nav aria-label="breadcrumb" class="float-right mt-1">
            <ol class="breadcrumb">
                <li><a href="<?= base_url($linkin . '/add') ?>" class="btn btn-success">Tambah Data</a></li>
            </ol>
        </nav> -->
        <h4 class="mb-1 mt-0">Data <?= $title ?></h4>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form action="<?= base_url($linkin . '/addAction') ?>" method="post">

                    <div class="col-3 mt-3">

                    </div>
                    <table id="basic-datatable" class="table dt-responsive nowrap">
                        <thead>
                            <tr>
                                <th>
                                    <center>No</center>
                                </th>
                                <th>NISN / NIS</th>
                                <th>Nama Lengkap</th>
                                <th>
                                    <center>Pertemuan</center>
                                </th>
                                <th>
                                    <center>Hadir</center>
                                </th>
                                <th>
                                    <center>Sakit</center>
                                </th>
                                <th>
                                    <center>Izin</center>
                                </th>
                                <th>
                                    <center>Alpa</center>
                                </th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data as $row) : ?>
                                <tr>
                                    <td>
                                        <center><?= $no++ ?></center>
                                    </td>
                                    <td><?= $row->nisn ?>/<?= $row->nis ?></td>
                                    <td><?= $row->namaSiswa ?></td>
                                    <td>
                                        <center><?= getKehadiran($kode, $row->nisn) ?></center>
                                    </td>
                                    <td>
                                        <center> <?= getKehadiranWhere($kode, $row->nisn, 'H') ?></center>
                                    </td>
                                    <td>
                                        <center> <?= getKehadiranWhere($kode, $row->nisn, 'S') ?></center>
                                    </td>
                                    <td>
                                        <center><?= getKehadiranWhere($kode, $row->nisn, 'I') ?></center>
                                    </td>
                                    <td>
                                        <center> <?= getKehadiranWhere($kode, $row->nisn, 'A') ?></center>
                                    </td>
                                    <!-- <td><select style="width: 100px;" class="form-control" name="kehadiran">
                                            <option value="H">Hadir</option>
                                            <option value="I">Izin</option>
                                            <option value="S">Sakit</option>
                                            <option value="A">Alpa</option>
                                        </select></td> -->
                                    <td></td>

                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                    <!-- <button class="btn btn-primary" type="submit">Simpan Absensi</button> -->
                    <a href="<?= base_url($linkin) ?>" class="btn btn-danger">Kembali</a>
                </form>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>
<!-- end row-->