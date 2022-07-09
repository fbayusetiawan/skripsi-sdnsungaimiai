<div class="row">
    <div class="col-12">
        <a href="<?= base_url('admin/karyawan_add') ?>" class="btn btn-success">Tambah Data</a>
    </div>
</div>
<br>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <table id="basic-datatable" class="table dt-responsive nowrap">
                    <thead>
                        <tr>
                            <th></th>
                            <th>No Identitas</th>
                            <th>Nama Karyawan</th>
                            <th>Tempat Tanggal Lahir</th>
                            <th>Jenis Kelamin</th>
                            <th>Agama</th>
                            <th>Alamat</th>
                            <th>No Telepon</th>
                            <th>Toko</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data as $data) : ?>
                            <?php
                            if ($data->agama == '1') :
                                $agama = "Islam";
                            elseif ($data->agama == '2') :
                                $agama = "Katolik";
                            elseif ($data->agama == '3') :
                                $agama = "Protestan";
                            elseif ($data->agama == '4') :
                                $agama = "Hindu";
                            elseif ($data->agama == '5') :
                                $agama = "Budha";
                            else :
                                $agama = "Kong Hu Cu";
                            endif;
                            ?>
                            <tr>
                                <td align="center" width="100">
                                    <div class="btn-group dropdown">
                                        <a href="javascript: void(0);" class="dropdown-toggle arrow-none btn btn-light btn-sm" data-toggle="dropdown" aria-expanded="false"><i class="mdi mdi-dots-horizontal"></i></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="<?= base_url('admin/karyawan_edit/' . $data->idKaryawan) ?>"><i class="mdi mdi-pencil mr-1 text-muted"></i>Edit</a>
                                            <a class="dropdown-item" href="<?= base_url('admin/karyawan_hapus/' . $data->idKaryawan) ?>"><i class="mdi mdi-delete mr-1 text-muted"></i>Hapus</a>
                                            <!-- <a class="dropdown-item" href="#"><i class="mdi mdi-email mr-1 text-muted"></i>Send Email</a> -->
                                        </div>
                                    </div>
                                </td>
                                <td><?= $data->noIdentitas ?></td>
                                <td><?= $data->namaKaryawan ?></td>
                                <td><?= $data->tempatLahir ?>, <?= $data->tanggalLahir ?></td>
                                <td><?= $data->jenkil == 'L' ? 'Laki-Laki' : 'Wanita' ?></td>
                                <td><?= $agama ?></td>
                                <td width="700"><?= $data->alamat ?></td>
                                <td><?= $data->noTelp ?></td>
                                <td><?= $data->namaToko ?></td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>

            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>