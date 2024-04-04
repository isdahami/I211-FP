<?= $this->extend("layout/default.php") ?>
<?= $this->section("title") ?>AudioAisle - HOME<?= $this->endSection() ?>

<?= $this->section("content") ?>
    <!-- CAROUSEL SECTION -->
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img class="d-block w-100" src="<?= base_url('assets/images/hero-images/KISS.jpg')?>" alt="First slide">
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="<?= base_url('assets/images/hero-images/offspring.jpg')?>" alt="Second slide">
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="<?= base_url('assets/images/hero-images/RS.jpg')?>" alt="Third slide">
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="<?= base_url('assets/images/hero-images/trending.jpg')?>" alt="Fourth slide">
        </div>
    </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <!-- CAROUSEL SECTION -->

    <div class="vin-wrapper">
        <div class="vin-header mt-4">
            <span class="vin-txt">TRENDING VINYLS</span>
            <a href="<?= base_url('/vinyls'); ?>">
                <span class="vin-txt">VIEW ALL VINYLS</span>
            </a>
        </div>

        <!-- Display the retrieved vinyls -->
        <div class="container">
            <div class="row mt-4">
                <?php foreach ($vinyls as $vinyl) : ?>
                    <div class="col-md-3 mb-4">
                        <div class="card bg-secondary text-white">
                        <a class="card-hover" href="<?= base_url('/vinyls/vinylDetails/' . $vinyl['id']) ?>">
                            <img src="<?= base_url('assets/images/I211_Final_Images/' . $vinyl['vinyl_image']) ?>" class="card-img-top card-border-bb" alt="<?= $vinyl['vinyl_name'] ?>">
                            <div class="card-body">
                                <h5 class="card-title"><?= $vinyl['vinyl_name'] ?></h5>
                                <p class="card-text"><?= $vinyl['vinyl_artist'] ?></p>
                                <p class="card-text"><?= $vinyl['vinyl_genre'] ?></p>
                                
                            </div>
                        </a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

    </div>
<?= $this->endSection() ?>
