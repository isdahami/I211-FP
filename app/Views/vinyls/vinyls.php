<?= $this->extend("layout/default.php") ?>
<?= $this->section("title") ?>AudioAisle - VINYLS<?= $this->endSection() ?>

<?= $this->section("content") ?>
    <div class="vin-wrapper">
            <div class="vin-header mt-4">
                <h3 class="vin-txt">VINYLS</h3>
            </div>
    </div>

    <div class="container">
            <div class="row mt-4">
                <?php foreach ($allVinyls as $allVinyl) : ?>
                    <div class="col-md-3 col-sm-6 col-xs-12 mb-4">
                        <div class="card bg-secondary text-white">
                        <a class="card-hover" href="<?= base_url('/home/vinylDetails/' . $allVinyl['id']) ?>">
                            <img src="<?= base_url('assets/images/I211_Final_Images/' . $allVinyl['vinyl_image']) ?>" class="card-img-top card-border-bb" alt="<?= $allVinyl['vinyl_name'] ?>">
                            <div class="card-body">
                                <h5 class="card-title"><?= $allVinyl['vinyl_name'] ?></h5>
                                <p class="card-text"><?= $allVinyl['vinyl_artist'] ?></p>
                                <p class="card-text"><?= $allVinyl['vinyl_genre'] ?></p>
                                
                            </div>
                        </a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

<?= $this->endSection() ?>
