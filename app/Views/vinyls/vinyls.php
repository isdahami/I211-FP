<?= $this->extend("layout/default.php") ?>
<?= $this->section("title") ?>AudioAisle - VINYLS<?= $this->endSection() ?>

<?= $this->section("content") ?>
    <div class="vin-wrapper">
            <div class="vin-header mt-4">
                <h3 class="vin-txt">VINYLS</h3>
            </div>

            <form action="<?= base_url('/vinyls') ?>" method="post" class="mt-4">
                <select name="genre" id="genreFilter" class="btn-secondary">
                    <option value="">All Genres</option>
                    <option value="Country">Country</option>
                    <option value="Rock">Rock</option>
                    <option value="Metal">Metal</option>
                    <option value="Hip-Hop & Rap">Hip-Hop & Rap</option>
                    <option value="Pop">Pop</option>
                    <option value="R&B & Soul">R&B & Soul</option>
                    <option value="Jazz">Jazz</option>
                    <option value="Latin">Latin</option>
                    <option value="Alternative">Alternative</option>
                    <option value="Electronic">Electronic</option>
                </select>
                <button type="submit" class="btn btn-primary">Apply Filter</button>
            </form>
    </div>

    

    <div class="container">
            <div class="row mt-4">
                <?php foreach ($allVinyls as $allVinyl) : ?>
                    <div class="col-md-3 col-sm-6 col-xs-12 mb-4">
                        <div class="card bg-secondary text-white">
                        <a class="card-hover" href="<?= base_url('/vinyls/vinylDetails/' . $allVinyl['id']) ?>">
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
