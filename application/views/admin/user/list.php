<div class="row">
    <div class="col-12">
        <a href="<?= base_url('admin/user_add') ?>" class="btn btn-success">Tambah Data</a>
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
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>Role</th>
                            <th>Toko</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data as $data) : ?>
                            <tr>
                                <td><?= $data->namaKaryawan ?></td>
                                <td width="700"><?= $data->email ?></td>
                                <td width="700"><?= $data->isActive == '1' ? 'Aktif' : 'Tidak Aktif' ?></td>
                                <td width="700"><?= $data->roleId ?></td>
                                <td width="700"><?= $data->namaToko ?></td>
                                <td align="center" width="100">
                                    <div class="btn-group dropdown">
                                        <a href="javascript: void(0);" class="dropdown-toggle arrow-none btn btn-light btn-sm" data-toggle="dropdown" aria-expanded="false"><i class="mdi mdi-dots-horizontal"></i></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="<?= base_url('admin/user_edit/' . $data->id) ?>"><i class="mdi mdi-pencil mr-1 text-muted"></i>Edit</a>
                                            <a class="dropdown-item" href="<?= base_url('admin/user_hapus/' . $data->id) ?>"><i class="mdi mdi-delete mr-1 text-muted"></i>Hapus</a>
                                            <!-- <a class="dropdown-item" href="#"><i class="mdi mdi-email mr-1 text-muted"></i>Send Email</a> -->
                                        </div>
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