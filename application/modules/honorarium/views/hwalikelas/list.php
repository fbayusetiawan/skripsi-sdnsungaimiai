<?php
$linkin = $this->uri->segment(1) . '/' . $this->uri->segment(2);
$no = '1';
?>
<div class="row page-title">
    <div class="col-md-12">
        <nav aria-label="breadcrumb" class="float-right mt-1">
            <ol class="breadcrumb">
                <li><a href="<?= base_url($linkin . '/add') ?>" class="btn btn-success">Tambah Data</a></li>
            </ol>
        </nav>
        <h4 class="mb-1 mt-0">Data <?= $title ?></h4>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <table id="basic-datatable" class="table dt-responsive nowrap">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tahun Ajaran</th>
                            <th>Tanggal</th>
                            <th>Dana Bosnas</th>
                            <th>Dana Bosda</th>
                            <th>Total Dana</th>
                            <th>Keterangan</th>
                            <th width="100" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data as $row) : ?>
                            <?php
                            $namaTable = "h_walikelas";
                            $bd = GetHonor($namaTable, $row->idHonorarium, '2');
                            $bn = GetHonor($namaTable, $row->idHonorarium, '1');
                            ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $row->tahunAjaran ?></td>
                                <td><?= tgl_indo($row->tanggal) ?></td>
                                <td>Rp. <?= number_format(floatval($bd), 0, ',', '.')  ?></td>
                                <td>Rp. <?= number_format(floatval($bn), 0, ',', '.')  ?></td>
                                <td>Rp. <?= number_format(floatval($bd + $bn), 0, ',', '.')  ?></td>
                                <td><?= $row->keterangan ?></td>

                                <td class="text-center">
                                    <div class="btn-group mb-0">
                                        <a href="<?= base_url($linkin . '/edit/' . $row->idHonorarium) ?>" class="btn btn-info btn-sm" data-toggle="tooltip" title="Edit"><i class="uil uil-edit"></i></a>
                                        <a href="<?= base_url($linkin . '/goDetail/' . $row->idHonorarium) ?>" class="btn btn-info btn-sm" data-toggle="tooltip" title="Detail"><i class="uil uil-eye"></i></a>
                                        <a href="<?= base_url($linkin . '/delete/' . $row->idHonorarium) ?>" id="<?= $row->idHonorarium ?>" class="delete-data btn btn-info btn-sm" data-toggle="tooltip" title="Hapus"><i class="uil uil-trash-alt"></i></a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>

            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>
<!-- end row-->