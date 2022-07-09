<div class="card bg-dark mb-5" style="max-width: 600px;">
    <div class="row no-gutters">
        <div class="col-md-4">
            <img src="<?= base_url('assets/images/') . $user['image'] ?>" class="card-img" alt="">
        </div>
        <div class="col-md-8">
            <div class="card-body">
                <h5 class="card-title"><?= $user['nama'] ?></h5>
                <p class="card-text"><?= $user['email'] ?></p>
                <p class="card-text"><small class="text-muted">Tanggal Mendaftar <?= date('d F Y', $user['dateCreated'])  ?></small></p>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body ribbon-box">
                <div class="ribbon ribbon-dark">PKL</div>
                <p class="mb-0">
                    <h5>Judul :</h5>
                    <?php
                    if (!empty($pkl->judul)) :
                        echo $pkl->judul;
                    else :
                        echo "Belum Daftar PKL";
                    endif;

                    if (!empty($pkl->nidn1)) :
                        echo "<h5>Dosen Pembimbing :</h5>";
                        echo $dosen1->namaDosen;
                    else :
                        echo "<h5>Dosen Pembimbing :</h5>";
                        echo "Belum di Tentukan";
                    endif;
                    ?>
                </p>
            </div>
        </div>
    </div>
</div>