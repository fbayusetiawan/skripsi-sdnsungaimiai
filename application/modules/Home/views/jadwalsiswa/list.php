<?php

$linkin = $this->uri->segment(1) . '/' . $this->uri->segment(2);
$no = '1';
?>

<div class="row">
    <div class="col-lg-3">
        <div class="card">
            <div class="card-body">
                <div class="text-center mt-3">
                    <img src="<?= base_url() ?>assets/images/profil/<?= $row->foto ?>" alt="" class="avatar-lg rounded-circle" />
                    <h5 class="mt-2 mb-0"><?= $row->namaSiswa ?></h5>
                    <h6 class="text-muted font-weight-normal mt-2 mb-0">NISN: <?= $row->nisn ?>
                    </h6>
                    <h6 class="text-muted font-weight-normal mt-1 mb-4">NIS: <?= $row->nis ?></h6>
                </div>

                <!-- profile  -->

                <div class="mt-3 pt-2 border-top">
                    <!-- <h4 class="mb-3 font-size-15">Contact Information</h4> -->
                    <div class="table-responsive">
                        <table class="table table-borderless mb-0 text-muted">
                            <tbody>
                                <tr>
                                    <th scope="row">Status Siswa</th>
                                    <td><?= $row->isActive == '1' ? '<span class="badge badge-success">Aktif</span>' : '<span class="badge badge-danger">Tidak Aktif</span>' ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Kelas</th>
                                    <td><?= $row->kodeKelas ?></td>
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
                            Jadwal Pelajaran
                        </a>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link" id="pills-messages-tab" data-toggle="pill" href="#pills-messages" role="tab" aria-controls="pills-messages" aria-selected="false">
                            Data Diri
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-projects-tab" data-toggle="pill" href="#pills-projects" role="tab" aria-controls="pills-projects" aria-selected="false">
                            Data Orang Tua
                        </a>
                    </li> -->
                    <!-- <li class="nav-item">
                        <a class="nav-link" id="pills-tasks-tab" data-toggle="pill" href="#pills-tasks" role="tab" aria-controls="pills-tasks" aria-selected="false">
                            Tasks
                        </a>
                    </li> -->
                    <!-- <li class="nav-item">
                        <a class="nav-link" id="pills-files-tab" data-toggle="pill" href="#pills-files" role="tab" aria-controls="pills-files" aria-selected="false">
                            Files
                        </a>
                    </li> -->
                </ul>

                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-activity" role="tabpanel" aria-labelledby="pills-activity-tab">
                        <form action="" class="row g-4">
                            <div class="col-md-6 mt-3">
                                <label for="">Pilih Tahun Akademik :</label>
                                <?= cmb_dinamis('tahun_akademik', 'tahun_akademik', 'namaTahun', 'kodeTahun', '', 'onchange="getJadwalPerhari()" id="tahun_akademik"') ?>
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">Pilih Kelas Anda :</label>
                                <?= cmb_dinamis('kelas', 'kelas', 'namaKelas', 'kodeKelas', '', 'onchange="getJadwalPerhari()" id="kelas"') ?>
                            </div>

                        </form>
                    </div>
                    <div id="listdata">

                    </div>


                    <!-- messages -->
                    <div class="tab-pane" id="pills-messages" role="tabpanel" aria-labelledby="pills-messages-tab">
                        <!-- <form class="row g-4">

                            <div class="col-md-3 mt-3">
                                <label for="inputAddress" class="form-label">NISN</label>
                                <input type="text" class="form-control" id="inputAddress" value="<?= $row->nisn ?>" disabled>
                            </div>
                            <div class="col-md-3 mt-3">
                                <label for="inputAddress" class="form-label">NIS</label>
                                <input type="text" class="form-control" id="inputAddress" value="<?= $row->nisn ?> / <?= $row->nis ?> " disabled>
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
                                <input type="text" class="form-control" id="inputEmail4" value="<?= tgl_indo($row->tanggalLahir) ?>" disabled>
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="inputEmail4" class="form-label">Status Keluarga</label>
                                <input type="text" class="form-control" id="inputEmail4" value="<?= $row->statusKeluarga ?>" disabled>
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="inputEmail4" class="form-label">Anak Ke</label>
                                <input type="text" class="form-control" id="inputEmail4" value="<?= $row->anakKe ?>" disabled>
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
                            <div class="col-md-6 mt-3">
                                <label for="inputAddress" class="form-label">Asal SD</label>
                                <input type="text" class="form-control" id="inputAddress" value="<?= $row->asalSd ?>" disabled>
                            </div>


                        </form> -->


                        <!-- <div class="text-center">
                            <a href="#" class="btn btn-primary btn-sm">Load more</a>
                        </div> -->
                    </div>

                    <div class="tab-pane fade" id="pills-projects" role="tabpanel" aria-labelledby="pills-projects-tab">

                        <!-- <form class="row g-4">

                            <div class="col-md-6 mt-3 ">
                                <label for="inputNama" class="form-label">Nama Ayah</label>
                                <input type="text" class="form-control" id="" value="<?= $row->namaAyah ?>" disabled>
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="inputPekerjaan" class="form-label">Pekerjaan Ayah</label>
                                <input type="text" class="form-control" id="" value="<?= $row->pekerjaanAyah ?>" disabled>
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="inputEmail4" class="form-label">Alamat Ayah</label>
                                <input type="text" class="form-control" id="" value="<?= $row->alamatAyah ?>" disabled>
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="inputAddress" class="form-label">No. Telepon Ayah</label>
                                <input type="text" class="form-control" id="" value="<?= $row->noHpAyah ?>" disabled>
                            </div>
                            <div class="col-md-6 mt-3 pt-2 border-top">
                                <label for="inputNama" class="form-label">Nama Ibu</label>
                                <input type="text" class="form-control" id="" value="<?= $row->namaIbu ?>" disabled>
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="inputPekerjaan" class="form-label">Pekerjaan Ibu</label>
                                <input type="text" class="form-control" id="" value="<?= $row->pekerjaanIbu ?>" disabled>
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="inputEmail4" class="form-label">Alamat Ibu</label>
                                <input type="text" class="form-control" id="" value="<?= $row->alamatIbu ?>" disabled>
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="inputAddress" class="form-label">No. Telepon Ibu</label>
                                <input type="text" class="form-control" id="" value="<?= $row->noHpIbu ?>" disabled>
                            </div>
                            <div class="col-md-6 mt-3 pt-2 border-top">
                                <label for="inputNama" class="form-label">Nama Wali</label>
                                <input type="text" class="form-control" id="" value="<?= $row->namaWali ?>" disabled>
                            </div>
                            <div class="col-md-6 mt-3 pt-2 border-top">
                                <label for="inputPekerjaan" class="form-label">Alamat Wali</label>
                                <input type="text" class="form-control" id="" value="<?= $row->alamatWali ?>" disabled>
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="inputEmail4" class="form-label">No. Telepon Wali</label>
                                <input type="text" class="form-control" id="" value="<?= $row->noHpWali ?>" disabled>
                            </div>




                        </form> -->


                        <!-- end row -->
                    </div>

                    <div class="tab-pane fade" id="pills-tasks" role="tabpanel" aria-labelledby="pills-tasks-tab">
                        <h5 class="mt-3">Tasks</h5>


                    </div>

                    <div class="tab-pane fade" id="pills-files" role="tabpanel" aria-labelledby="pills-files-tab">
                        <h5 class="mt-3">Files</h5>


                    </div>
                </div>

            </div>
        </div>
        <!-- end card -->
    </div>
</div>
<!-- end row -->
<script>
    function getJadwalPerhari() {
        var tahun_akademik = $("#tahun_akademik").val()
        var kelas = $("#kelas").val()
        // console.log(tahun_akademik)
        $.ajax({
            type: 'Get',
            url: '<?= base_url("Home/jadwalsiswa/getJadwalPerhari") ?>',
            data: 'kelas=' + kelas + '&tahun_akademik=' + tahun_akademik,
            success: function(data) {
                $('#listdata').html(data)
            }
        })
    }
</script>