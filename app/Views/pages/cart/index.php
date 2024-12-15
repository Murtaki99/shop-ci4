<?= $this->extend('layouts/app'); ?>
<?= $this->section('content'); ?>
<div class="row">
    <div class="col-12">
        <?php if ($products && count($products) > 0): ?>
            <div class="card-mb-3">
                <div class="card-header">
                    <?= isset($title) ? $title : '' ?>
                </div>
                <div class="card-body table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th><?= 'Nama Produk' ?></th>
                                <th><?= 'Harga/item' ?></th>
                                <th class="text-center"><?= 'Jumlah' ?></th>
                                <th class="text-center"><?= 'Subtotal' ?></th>
                                <th><?= 'Aksi' ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($products as $product): ?>
                                <tr>
                                    <td>
                                        <p>
                                            <?php if ($product->product_image): ?>
                                                <img src="<?= base_url('storage/products/' . $product->product_image) ?>" width="50">
                                            <?php else: ?>
                                                <img src="https://placehold.co/50x50">
                                            <?php endif; ?>
                                            <strong><?= esc($product->product_name) ?></strong>
                                        </p>
                                    </td>
                                    <td>
                                        <?= esc(rp($product->product_price)) ?>
                                    </td>
                                    <td>
                                        <form action="<?= base_url('/carts/update/' . $product->id) ?>" method="POST" class="input-group mb-3">
                                            <input type="hidden" name="idproduct" value="<?= $product->id; ?>">
                                            <input type="number" class="form-control col-4" name="quantity" id="quantity" value="<?= esc($product->quantity) ?>">
                                            <div class="input-group-append">
                                                <button type="submit" class="input-group-text" id="basic-addon2"><i class="fas fa-check"></i></button>
                                            </div>
                                        </form>
                                    </td>
                                    <td class="text-center">
                                        <?= esc(rp($product->subtotal)) ?>
                                    </td>
                                    <td>
                                        <?= btn_delete(
                                            base_url('carts/delete/' . esc($product->id)),
                                            'Produk',
                                            esc($product->product_name)
                                        ) ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            <tr>
                                <td colspan="3"><strong>Total:</strong></td>
                                <td class="text-center"><strong><?= esc(rp($total)) ?></strong></td>
                            </tr>
                        </tbody>

                    </table>
                </div>
                <div class="card-footer">
                    <a href="<?= base_url('/') ?>" class="btn btn-secondary">
                        <i class="fas fa-angle-left"></i> <?= 'Kembali Belanja' ?>
                    </a>
                    <a href="<?= base_url('/checkout') ?>" class="btn btn-success float-right">
                        <?= 'Pembayaran' ?> <i class="fas fa-angle-right"></i>
                    </a>
                </div>
            </div>
        <?php else: ?>
            <div class="text-center">
                <img src="<?= base_url('img/reshot-icon-cart-BAE3K9JRS7.svg') ?>" width="400">
                <br>
                <a href="<?= base_url('/') ?>" class="btn btn-success">Belanja Sekarang</a>
            </div>
        <?php endif; ?>
    </div>
</div>
<?= $this->endSection(); ?>