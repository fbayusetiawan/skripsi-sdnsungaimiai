<?php

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
                    <!-- <li class="nav-item">
                        <a class="nav-link active" id="pills-activity-tab" data-toggle="pill" href="#pills-activity" role="tab" aria-controls="pills-activity" aria-selected="true">
                            Nilai Capaian Belajar
                        </a>
                    </li> -->
                    <li class="nav-item">
                        <a class="nav-link active" id="pills-messages-tab" data-toggle="pill" href="#pills-messages" role="tab" aria-controls="pills-messages" aria-selected="false">
                            Nilai Keterampilan
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " id="pills-projects-tab" data-toggle="pill" href="#pills-projects" role="tab" aria-controls="pills-projects" aria-selected="false">
                            Nilai Pengetahuan
                        </a>
                    </li>
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
                    <!-- <div class="tab-pane fade show active" id="pills-activity" role="tabpanel" aria-labelledby="pills-activity-tab">
                        <h5>Nilai Capaian Belajar</h5>
                        <form action="" class="row g-4">
                            <div class="col-md-6 mt-3">
                                <label for="">Pilih Tahun Akademik :</label>
                                <?= cmb_dinamis('tahunajaran', 'tahunajaran', 'tahunAjaran', 'idTahunAjaran', '', 'onchange="getCapaianBelajar()" id="tahunajaran1"') ?>
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">Pilih Kelas Anda :</label>
                                <?= cmb_dinamis('kelas', 'kelas', 'namaKelas', 'kodeKelas', '', 'onchange="getCapaianBelajar()" id="kelas1"') ?>
                            </div>
                        </form>
                        <div id="listdata1">

                        </div>
                    </div> -->

                    <!-- messages -->
                    <div class="tab-pane active" id="pills-messages" role="tabpanel" aria-labelledby="pills-messages-tab">
                        <h5>Nilai Keterampilan</h5>
                        <form action="" class="row g-4">
                            <div class="col-md-6 mt-3">
                                <label for="">Pilih Tahun Akademik :</label>
                                <?= cmb_dinamis('tahunajaran', 'tahunajaran', 'tahunAjaran', 'idTahunAjaran', '', 'onchange="getKeterampilan()" id="tahunajaran4"') ?>
                            </div>
                            
                        </form>
                        <div id="listdata4">

                        </div>
                    </div>

                    <div class="tab-pane" id="pills-projects" role="tabpanel" aria-labelledby="pills-projects-tab">
                        <h5>Nilai Pengetahuan</h5>
                        <form action="" class="row g-4">
                            <div class="col-md-6 mt-3">
                                <label for="">Pilih Tahun Akademik :</label>
                                <?= cmb_dinamis('tahunajaran', 'tahunajaran', 'tahunAjaran', 'idTahunAjaran', '', 'onchange="getNilaiRerata()" id="tahunajaran3"') ?>
                            </div>
                        
                        </form>
                        <div id="listdata3">

                        </div>
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
    function getNilaiRerata() {
        var tahunajaran3 = $("#tahunajaran3").val()
        // var kelas3 = $("#kelas3").val()
        // console.log(kelas3)
        $.ajax({
            type: 'Get',
            url: '<?= base_url("Home/nilairaporsiswa/getNilaiRerata") ?>',
            data: 'tahunajaran3=' + tahunajaran3,
            success: function(data) {
                $('#listdata3').html(data)
            }
        })
    }

    function getKeterampilan() {
        var tahunajaran4 = $("#tahunajaran4").val()
        
        $.ajax({
            type: 'Get',
            url: '<?= base_url("Home/nilairaporsiswa/getKeterampilan") ?>',
            data: 'tahunajaran4=' + tahunajaran4,
            success: function(data) {
                $('#listdata4').html(data)
            }
        })
    }
</script>