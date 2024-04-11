<?= $this->extend("layout/default.php") ?>
<?= $this->section("title") ?>AudioAisle - ADMIN<?= $this->endSection() ?>

<?= $this->section("content") ?>
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3 mb-4">
            <h2 class="text-center">Add New Addition</h2>
            <form action="<?= base_url('admin/saveNew') ?>" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="vinyl_name">Vinyl Name</label>
                    <input type="text" class="form-control" id="vinyl_name" name="vinyl_name" required>
                </div>
                <div class="form-group">
                    <label for="vinyl_desc">Vinyl Description</label>
                    <textarea class="form-control" id="vinyl_desc" name="vinyl_desc" rows="3" required></textarea>
                </div>
                <div class="form-group">
                    <label for="vinyl_artist">Vinyl Artist</label>
                    <input type="text" class="form-control" id="vinyl_artist" name="vinyl_artist" required>
                </div>
                <div class="form-group">
                    <label for="vinyl_genre">Vinyl Genre</label>
                    <input type="text" class="form-control" id="vinyl_genre" name="vinyl_genre" required>
                </div>
                <div class="form-group">
                    <label for="vinyl_price">Vinyl Price</label>
                    <input type="number" class="form-control" id="vinyl_price" name="vinyl_price" required>
                </div>
                <div class="form-group">
                    <label for="vinyl_image">Vinyl Image</label>
                    <input type="file" class="form-control-file" id="vinyl_image" name="vinyl_image" accept="image/*" required>
                </div>
                
                <button type="submit" class="btn btn-primary" id="addBtn">Submit</button>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
