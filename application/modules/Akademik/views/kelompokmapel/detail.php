<?php
$linkin = $this->uri->segment(1) . '/' . $this->uri->segment(2);
?>

<head>
    <link rel="shortcut icon" href="<?= base_url(); ?>assets/images/tutwurihanda.png">
</head>

<div class="row page-title">
    <div class="col-md-12">
        <nav aria-label="breadcrumb" class="float-right mt-1">
            <!-- <ol class="breadcrumb">
                <li><a href="<?= base_url($linkin . '/add') ?>" class="btn btn-success">Tambah Data</a></li>
            </ol> -->
        </nav>
        <h4 class="mb-1 mt-0">Detail Data <?= $title ?></h4>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-3">
            <div class="card">
                <div class="card-body">
                    <div class="text-center mt-3">
                        <img src="<?= base_url(); ?>assets/images/profil/<?= $row->foto ?>" alt="" class="avatar-lg rounded-circle" />
                        <h5 class="mt-2 mb-0"><?= $row->namaSiswa ?></h5>
                        <h6 class="text-muted font-weight-normal mt-2 mb-0">NISN : <?= $row->nisn ?>
                        </h6>
                        <h6></h6>
                        <!-- <h6 class="text-muted font-weight-normal mt-1 mb-4">San Francisco, CA</h6> -->

                        <a href="<?= base_url($linkin . '/edit/' . $row->idSiswa) ?>"> <button type="button" class="btn btn-primary btn-sm mr-1">Edit Profil</button></a>
                        <!-- <button type="button" class="btn btn-white btn-sm">Message</button> -->
                    </div>

                    <!-- profile  -->
                    <!-- <div class="mt-5 pt-2 border-top">
                        <h4 class="mb-3 font-size-15">About</h4>
                        <p class="text-muted mb-4">Hi I'm Shreyu. I am user experience and user
                            interface designer.
                            I have been working on UI & UX since last 10 years.</p>
                    </div> -->
                    <div class="mt-3 pt-2 border-top">
                        <!-- <h4 class="mb-3 font-size-15">Contact Information</h4> -->
                        <div class="table-responsive">
                            <table class="table table-borderless mb-0 text-muted">
                                <tbody>
                                    <tr>
                                        <th scope="row">Status Siswa :</th>
                                        <td><?= $row->statusSiswa == '1' ? 'Aktif' : 'Tidak Aktif' ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
            <!-- end card -->

        </div>

        <div class="col-lg-9">
            <div class="card">
                <div class="card-body">
                    <ul class="nav nav-pills navtab-bg nav-justified" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="pills-activity-tab" data-toggle="pill" href="#pills-activity" role="tab" aria-controls="pills-activity" aria-selected="true">
                                Data Diri
                            </a>

                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-messages-tab" data-toggle="pill" href="#pills-messages" role="tab" aria-controls="pills-messages" aria-selected="false">
                                Data Orang Tua
                            </a>
                        </li>
                        <!-- <li class="nav-item">
                            <a class="nav-link" id="pills-projects-tab" data-toggle="pill" href="#pills-projects" role="tab" aria-controls="pills-projects" aria-selected="false">
                                Projects
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-tasks-tab" data-toggle="pill" href="#pills-tasks" role="tab" aria-controls="pills-tasks" aria-selected="false">
                                Tasks
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-files-tab" data-toggle="pill" href="#pills-files" role="tab" aria-controls="pills-files" aria-selected="false">
                                Files
                            </a>
                        </li> -->
                    </ul>

                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-activity" role="tabpanel" aria-labelledby="pills-activity-tab">
                            <h5 class="mt-1"></h5>

                            <form class="row g-4">

                                <div class="col-md-6 mt-3">
                                    <label for="inputAddress" class="form-label">NISN</label>
                                    <input type="text" class="form-control" id="inputAddress" value="<?= $row->nisn ?>" disabled>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="inputAddress" class="form-label">Nama Lengkap</label>
                                    <input type="text" class="form-control" id="inputAddress" value="<?= $row->namaSiswa ?>" disabled>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="inputEmail4" class="form-label">Tempat Lahir</label>
                                    <input type="text" class="form-control" id="inputEmail4" value="<?= $row->tempatLahir ?>" disabled>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="inputEmail4" class="form-label">Tanggal Lahir</label>
                                    <input type="text" class="form-control" id="inputEmail4" value="<?= $row->tanggalLahir ?>" disabled>
                                </div>

                                <div class="col-md-6 mt-3">
                                    <label for="inputCity" class="form-label">Jenis Kelamin</label>
                                    <input type="text" class="form-control" id="inputCity" value="<?= $row->jk == 'L' ? 'Laki-Laki' : 'Perempuan' ?>" disabled>
                                </div>
                                <div class="col-md-4 mt-3">
                                    <label for="inputCity" class="form-label">Alamat</label>
                                    <input type="text" class="form-control" id="inputCity" value="<?= $row->alamat ?>" disabled>
                                </div>

                                <div class="col-md-1 mt-3">
                                    <label for="inputZip" class="form-label">RT</label>
                                    <input type="text" class="form-control" id="inputZip" value="<?= $row->rt ?>" disabled>
                                </div>
                                <div class="col-md-1 mt-3">
                                    <label for="inputZip" class="form-label">RW</label>
                                    <input type="text" class="form-control" id="inputZip" value="<?= $row->rw ?>" disabled>
                                </div>
                                <div class="col-md-3 mt-3">
                                    <label for="inputCity" class="form-label">Kelurahan</label>
                                    <input type="text" class="form-control" id="inputCity" value="<?= $row->kelurahan ?>" disabled>
                                </div>
                                <div class="col-md-3 mt-3">
                                    <label for="inputCity" class="form-label">Kecamatan</label>
                                    <input type="text" class="form-control" id="inputCity" value="<?= $row->kecamatan ?>" disabled>
                                </div>
                                <div class="col-md mt-3">
                                    <label for="inputCity" class="form-label">Kabupaten</label>
                                    <input type="text" class="form-control" id="inputCity" value="<?= $row->kabupaten ?>" disabled>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="inputAddress" class="form-label">Agama</label>
                                    <input type="text" class="form-control" id="inputAddress" value="<?= $row->agama ?>" disabled>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="inputAddress" class="form-label">Angkatan</label>
                                    <input type="text" class="form-control" id="inputAddress" value="<?= $row->angkatan ?>" disabled>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="inputAddress" class="form-label">No. Telepon</label>
                                    <input type="text" class="form-control" id="inputAddress" value="<?= $row->noTelp ?>" disabled>
                                </div>

                            </form>


                        </div>

                        <!-- messages -->
                        <div class="tab-pane" id="pills-messages" role="tabpanel" aria-labelledby="pills-messages-tab">
                            <!-- <h5 class="mt-3">Messages</h5> -->
                            <div class="float-sm-left">
                                <form class="row g-4">

                                    <div class="col-md-12 mt-3 ">
                                        <label for="inputNama" class="form-label">Nama Ayah</label>
                                        <input type="text" class="form-control" id="" value="<?= $row->namaAyah ?>" disabled>
                                    </div>
                                    <div class="col-md-12 mt-3">
                                        <label for="inputPekerjaan" class="form-label">Pekerjaan Ayah</label>
                                        <input type="text" class="form-control" id="" value="<?= $row->pekerjaanAyah ?>" disabled>
                                    </div>
                                    <div class="col-md-6 mt-3">
                                        <label for="inputEmail4" class="form-label">Penghasilan Ayah</label>
                                        <input type="text" class="form-control" id="" value="<?= $row->penghasilanAyah ?>" disabled>
                                    </div>
                                    <div class="col-md-6 mt-3">
                                        <label for="inputAddress" class="form-label">No. Telepon Ayah</label>
                                        <input type="text" class="form-control" id="\s" value="<?= $row->noHpAyah ?>" disabled>
                                    </div>
                                    <div class="col-md-12 mt-3 pt-2 border-top">
                                        <label for="inputNama" class="form-label">Nama Ibu</label>
                                        <input type="text" class="form-control" id="" value="<?= $row->namaIbu ?>" disabled>
                                    </div>
                                    <div class="col-md-12 mt-3">
                                        <label for="inputPekerjaan" class="form-label">Pekerjaan Ibu</label>
                                        <input type="text" class="form-control" id="" value="<?= $row->pekerjaanIbu ?>" disabled>
                                    </div>
                                    <div class="col-md-6 mt-3">
                                        <label for="inputEmail4" class="form-label">Penghasilan Ibu</label>
                                        <input type="text" class="form-control" id="" value="<?= $row->penghasilanIbu ?>" disabled>
                                    </div>
                                    <div class="col-md-6 mt-3">
                                        <label for="inputAddress" class="form-label">No. Telepon Ibu</label>
                                        <input type="text" class="form-control" id="\s" value="<?= $row->noHpIbu ?>" disabled>
                                    </div>
                                    <div class="col-md-6 mt-3 pt-2 border-top">
                                        <label for="inputNama" class="form-label">Nama Wali</label>
                                        <input type="text" class="form-control" id="" value="<?= $row->namaWali ?>" disabled>
                                    </div>
                                    <div class="col-md-6 mt-3 pt-2 border-top">
                                        <label for="inputPekerjaan" class="form-label">Pekerjaan Wali</label>
                                        <input type="text" class="form-control" id="" value="<?= $row->pekerjaanWali ?>" disabled>
                                    </div>
                                    <div class="col-md-6 mt-3">
                                        <label for="inputEmail4" class="form-label">No. Telepon Wali</label>
                                        <input type="text" class="form-control" id="" value="<?= $row->noHpWali ?>" disabled>
                                    </div>




                                </form>
                            </div>


                        </div>

                        <div class="tab-pane fade" id="pills-projects" role="tabpanel" aria-labelledby="pills-projects-tab">

                            <h5 class="mt-3">Projects</h5>


                            <!-- end row -->
                        </div>

                        <div class="tab-pane fade" id="pills-tasks" role="tabpanel" aria-labelledby="pills-tasks-tab">
                            <h5 class="mt-3">Tasks</h5>


                        </div>

                        <div class="tab-pane fade" id="pills-files" role="tabpanel" aria-labelledby="pills-files-tab">
                            <h5 class="mt-3">Files</h5>



                            <!-- end attachments -->
                        </div>
                    </div>

                </div>
            </div>
            <!-- end card -->
        </div>
    </div>
    <!-- end row -->
</div> <!-- container-fluid -->
</div>

<script>
    function cekUser() {
        var user = $("#username").val();
        $.ajax({
            type: 'GET',
            url: '<?= base_url("datamaster/users/cekUser") ?>',
            data: "user=" + user,
            success: function(data) {
                $('#info').html(data)
            }
        })
    }
</script>