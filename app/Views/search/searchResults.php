<?= $this->extend("layout/default.php") ?>
<?= $this->section("title") ?>AudioAisle - SEARCH RESULTS<?= $this->endSection() ?>

<?= $this->section("content") ?>
    <div class="vin-wrapper">
            <div class="vin-header mt-4">
                <h3 class="vin-txt">SEARCH RESULTS</h3>
            </div>
    </div>

    <div class="container">
            <!-- Display search results -->
            <?php if (!empty($searchResults)): ?>
                <div class="row mt-4">
                <?php foreach ($searchResults as $result) : ?>
                    <div class="col-md-3 mb-4">
                        <div class="card bg-secondary text-white">
                        <a class="card-hover" href="<?= base_url('/vinyls/vinylDetails/' . $result['id']) ?>">
                            <img src="<?= base_url('assets/images/I211_Final_Images/' . $result['vinyl_image']) ?>" class="card-img-top card-border-bb" alt="<?= $result['vinyl_name'] ?>">
                            <div class="card-body">
                                <h5 class="card-title"><?= $result['vinyl_name'] ?></h5>
                                <p class="card-text"><?= $result['vinyl_artist'] ?></p>
                                <p class="card-text"><?= $result['vinyl_genre'] ?></p>
                                
                            </div>
                        </a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <?php else: ?>
                <p class="mt-4"><strong>No results found.</strong></p>
            <?php endif; ?>
        </div>

        
        

<?= $this->endSection() ?>
