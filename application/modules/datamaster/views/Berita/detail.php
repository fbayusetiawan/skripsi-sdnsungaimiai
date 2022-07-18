<?php
$linkin = $this->uri->segment(1) . '/' . $this->uri->segment(2);
$no = '1';
?>
<div class="row page-title">
    <div class="col-md-12">
        <nav aria-label="breadcrumb" class="float-right mt-1">
            <ol class="breadcrumb">

            </ol>
        </nav>
        <h4 class="mb-1 mt-0">Detail Data <?= $row->judulBerita ?></h4>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <img src="<?= base_url('upload/' . $row->foto) ?>" width="200" class="mb-5" alt="">
                <table width="100%">
                    <tr>
                        <th width="25%">Judul Berita</th>
                        <th>: <?= $row->judulBerita ?></th>
                    </tr>
                    <tr>
                        <th>Rilis Tanggal</th>
                        <th>: <?= tgl_indo($row->tanggal) ?></th>
                    </tr>

                    <tr>
                        <th></th>
                    </tr>
                    <tr>
                        <th>Isi</th>
                        <th>: <?= $row->isiBerita ?> </th>
                    </tr>


                    <tr>
                        <th>Kategori</th>
                        <th>: <?= $row->kategori ?></th>
                    </tr>

                </table>

            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>
<!-- end row-->