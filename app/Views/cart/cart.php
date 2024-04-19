<?= $this->extend("layout/default.php") ?>
<?= $this->section("title") ?>AudioAisle - CART<?= $this->endSection() ?>

<?= $this->section("content") ?>
<div class="container mt-4">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">CART DETAILS</h3>
                </div>
                <div class="card-body">
                    <?php if (!empty($cartItems)) : ?>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                        <th>Total</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($cartItems as $item) : ?>
                                        <tr>
                                            <td><?= $item['vinyl_name'] ?></td>
                                            <td>
                                                <!-- Form for updating quantity -->
                                                <form action="<?= base_url('cart/update') ?>" method="post">
                                                    <input type="hidden" name="item_id" value="<?= $item['id'] ?>">
                                                    <input type="number" class="form-control" name="quantity" value="<?= $item['quantity'] ?>">
                                                    </td>
                                                    <td>$<?= $item['vinyl_price'] ?></td>
                                                    <td>$<?= $item['quantity'] * $item['vinyl_price'] ?></td>
                                                    <td>
                                                    <button type="submit" class="btn btn-primary mb-1">Update</button>
                                                </form>
                                                <!-- Form for removing item -->
                                                <form action="<?= base_url('cart/remove') ?>" method="post">
                                                    <input type="hidden" name="item_id" value="<?= $item['id'] ?>">
                                                    <button type="submit" class="btn btn-danger">Remove</button>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    <?php else : ?>
                        <p>Your cart is empty.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h4>Total: $<?= $total ?></h4>
                    <a href="<?= site_url('/cart/checkout') ?>" class="btn btn-primary btn-block">Checkout</a>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
