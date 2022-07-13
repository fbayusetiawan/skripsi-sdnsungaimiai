<?php

$linkin = $this->uri->segment(1) . '/' . $this->uri->segment(2);
$no = '1';
?>

<div class="row">
    <div class="col-lg-3">
        <div class="card">
            <div class="card-body">
                <div class="text-center mt-3">
                    <img src="<?= base_url() ?>upload/<?= $row->foto ?>" alt="" class="avatar-lg rounded-circle" />
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
                </ul>

                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-activity" role="tabpanel" aria-labelledby="pills-activity-tab">
                        <form action="" class="row g-4">
                            <div class="col-md-6 mt-3">
                                <label for="">Pilih Tahun Akademik :</label>
                                <?= cmb_dinamis('tahunajaran', 'tahunajaran', 'tahunAjaran', 'idTahunAjaran', '', 'onchange="getJadwalPerhari()" id="tahunajaran"') ?>
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
                        
                    </div>

                    <div class="tab-pane fade" id="pills-projects" role="tabpanel" aria-labelledby="pills-projects-tab">

                        


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
        var tahunajaran = $("#tahunajaran").val()
        var kelas = $("#kelas").val()
        // console.log(tahunajaran)
        $.ajax({
            type: 'Get',
            url: '<?= base_url("Home/jadwalsiswa/getJadwalPerhari") ?>',
            data: 'kelas=' + kelas + '&tahunajaran=' + tahunajaran,
            success: function(data) {
                $('#listdata').html(data)
            }
        })
    }
</script>