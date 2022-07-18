<?php
$linkin = $this->uri->segment(1) . '/' . $this->uri->segment(2);
?>
<!-- ***** Main Banner Area Start ***** -->

<!-- ***** Main Banner Area End ***** -->




<section class="section coming-soon" data-section="section3">
    <div class="container">
        <div class="row">
            <div class="col-md-7 col-xs-12">

            </div>
            <div class="col-md-12">
                <div id='tabs'>
                    <section class='tabs-content'>
                        <article id='tabs-2'>
                            <div class="row">
                                <div class="col-md-6">
                                    <img src="<?= base_url(); ?>assets/images/profil/<?= $row->foto ?>" alt="">
                                </div>
                                <!-- <div class="col-md-6">
                                    <h4>Visi</h4>
                                    <p>Mewujudkan Sekolahan Disiplin Ramah Anak, Berbudaya Lokal Serta Peduli Lingkungan Hidup, Menerapkan Pendidikan Yang Bermutu Dengan Berlandaskan Imtaq.</p>
                                </div> -->
                            </div>
                        </article>
                        <article id='tabs-3'>
                            <div class="row">
                                <div class="col-md-12">
                                    <h4><?= $row->judulBerita ?></h4>
                                    <p><?= $row->isiBerita ?></p>
                                </div>
                            </div>
                        </article>
                    </section>
                </div>
            </div>
        </div>
    </div>
</section>