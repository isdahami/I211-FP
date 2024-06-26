<?= $this->extend("layout/default.php") ?>
<?= $this->section("title") ?>AudioAisle - VINYL DETAILS<?= $this->endSection() ?>

<?= $this->section("content") ?>
<div class="vin-wrapper">
    <div class="vin-header mt-4">
        <h3 class="vin-txt">VINYL DETAILS</h3>
    </div>
</div>

<div class="container mt-4 mb-4"> 
    <div class="row">
        <div class="col-md-6 mb-4">
            <img src="<?= base_url('assets/images/I211_Final_Images/' . $vinyl['vinyl_image']) ?>" class="card-img-top" alt="<?= $vinyl['vinyl_name'] ?>">
        </div>
        <div class="col-md-6">
            <h2 class="mb-4"><?= $vinyl['vinyl_name'] ?></h2>
            <p><strong>Artist: </strong><?= $vinyl['vinyl_artist'] ?></p>
            <p><strong>Genre: </strong><?= $vinyl['vinyl_genre'] ?></p>
            <p><strong>Description: </strong><?= $vinyl['vinyl_desc'] ?></p>
            <p><strong>Price: </strong>$<?= $vinyl['vinyl_price'] ?></p>
            
            <?php if(auth()->loggedIn()): ?>
            <!-- Buy Now Form -->
            <form action="<?= base_url('cart/addItem') ?>" method="post">
                <input type="hidden" name="vinyl_id" value="<?= $vinyl['id'] ?>">
                <input type="hidden" name="quantity" value="1"> 
                <button type="submit" class="btn btn-primary mb-4">Buy Now</button>
            </form>
            <?php else: ?>
                <p>Please login or create an account to buy vinyls.</p>
            <?php endif; ?>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
