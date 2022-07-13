<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>

<div class="row page-title">
    <div class="col-md-12">
        <nav aria-label="breadcrumb" class="float-right mt-1">
            <!-- <ol class="breadcrumb">
                <li><a href="<?= base_url($linkin . '/add') ?>" class="btn btn-success">Tambah Data</a></li>
            </ol> -->
        </nav>
        <h4 class="mb-1 mt-0"><?= $title ?></h4>
    </div>
</div>
<div class="modal fade" id="event-modal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header py-3 px-4 border-bottom-0 d-block">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h5 class="modal-title" id="modal-title">Event</h5>
            </div>
            <div class="modal-body p-4">
                <form class="needs-validation" name="event-form" id="form-event" novalidate>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label class="control-label">Event Name</label>
                                <input class="form-control" placeholder="Insert Event Name" type="text" name="title" id="event-title" required />
                                <div class="invalid-feedback">Please provide a valid event name</div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label class="control-label">Category</label>
                                <select class="form-control custom-select" name="category" id="event-category" required>
                                    <option value="bg-danger" selected>Danger</option>
                                    <option value="bg-success">Success</option>
                                    <option value="bg-primary">Primary</option>
                                    <option value="bg-info">Info</option>
                                    <option value="bg-dark">Dark</option>
                                    <option value="bg-warning">Warning</option>
                                </select>
                                <div class="invalid-feedback">Please select a valid event category</div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-6">
                            <button type="button" class="btn btn-danger" id="btn-delete-event">Delete</button>
                        </div>
                        <div class="col-6 text-right">
                            <button type="button" class="btn btn-light mr-1" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success" id="btn-save-event">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div> <!-- end modal-content-->
    </div> <!-- end modal dialog-->
</div>
<div class="row">
    <!-- <div class="col-md-6 col-xl-4">
        <div class="card">
            <div class="card-body p-0">
                <div class="media p-3">
                    <div class="media-body">
                        <span class="text-muted text-uppercase font-size-12 font-weight-bold">Total DANA BOS Daerah</span>
                        <h2 class="mb-0">
                            <div class="text-success"><?= number_format(floatval($tdbd), 0, ',', '.')  ?></div>
                        </h2>
                    </div>
                </div>
            </div>
        </div>
    </div> -->

    <div class="col-md-6 col-xl-12">
        <div class="card">
            <div class="card-body p-0">
                <div class="media p-3">
                    <div class="media-body">
                        <span class="text-muted text-uppercase font-size-12 font-weight-bold">Total Dana BOS Nasional</span>
                        <h2 class="mb-0">
                            <div class="text-success"><?= number_format(floatval($tdbn), 0, ',', '.')  ?></div>
                        </h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- <div class="col-md-6 col-xl-4">
        <div class="card">
            <div class="card-body p-0">
                <div class="media p-3">
                    <div class="media-body">
                        <span class="text-muted text-uppercase font-size-12 font-weight-bold">Total Dana BOS</span>
                        <h2 class="mb-0">
                            <div class="text-success"><?= number_format(floatval($tdbd + $tdbn), 0, ',', '.')  ?></div>
                        </h2>
                    </div>
                </div>
            </div>
        </div>
    </div> -->

    <div class="col-md-6 col-xl-3">
        <div class="card">
            <div class="card-body p-0">
                <div class="media p-3">
                    <div class="media-body">
                        <span class="text-muted text-uppercase font-size-12 font-weight-bold">Total Honor Wali Kelas</span>
                        <h5 class="mb-0">
                            <!-- <div class="text-success">Bosda Rp. <?= number_format(floatval($thwkd), 0, ',', '.')  ?></div> -->
                            <div class="text-info">Bosnas Rp. <?= number_format(floatval($thwkn), 0, ',', '.')  ?></div>
                            <!-- <div class="text-danger">Total Rp. <?= number_format(floatval($thwkd + $thwkn), 0, ',', '.')  ?></div> -->
                        </h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-3">
        <div class="card">
            <div class="card-body p-0">
                <div class="media p-3">
                    <div class="media-body">
                        <span class="text-muted text-uppercase font-size-12 font-weight-bold">Total Honor Pengajar</span>
                        <h5 class="mb-0">
                            <!-- <div class="text-success">Bosda Rp. <?= number_format(floatval($thpd), 0, ',', '.')  ?></div> -->
                            <div class="text-info">Bosnas Rp. <?= number_format(floatval($thpn), 0, ',', '.')  ?></div>
                            <!-- <div class="text-danger">Total Rp. <?= number_format(floatval($thpd + $thpn), 0, ',', '.')  ?></div> -->
                        </h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-3">
        <div class="card">
            <div class="card-body p-0">
                <div class="media p-3">
                    <div class="media-body">
                        <span class="text-muted text-uppercase font-size-12 font-weight-bold">Total Honor Tata Usaha</span>
                        <h5 class="mb-0">
                            <!-- <div class="text-success">Bosda Rp. <?= number_format(floatval($thtud), 0, ',', '.')  ?></div> -->
                            <div class="text-info">Bosnas Rp. <?= number_format(floatval($thtun), 0, ',', '.')  ?></div>
                            <!-- <div class="text-danger">Total Rp. <?= number_format(floatval($thtud + $thtun), 0, ',', '.')  ?></div> -->
                        </h5>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- <div class="col-sm-12">
        <h3>Grafik Pengeluaran Tahun Ajaran <?= call_ta($this->session->userdata('idta')) ?></h3>
        <div id="myfirstchart" style="height: 250px;"></div>
    </div>
</div>
<script>
    new Morris.Bar({
        // ID of the element in which to draw the chart.
        element: 'myfirstchart',
        // Chart data records -- each entry in this array corresponds to a point on
        // the chart.
        data: <?= $data ?>,
        // The name of the data record attribute that contains x-values.
        xkey: 'keterangan',
        // A list of names of data record attributes that contain y-values.
        ykeys: ['pengeluaran'],
        // Labels for the ykeys -- will be displayed when you hover over the
        // chart.
        labels: ['Rp.']
    })
</script> -->