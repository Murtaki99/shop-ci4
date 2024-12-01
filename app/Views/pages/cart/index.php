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
                                            <img src="https://placehold.co/50x50">
                                            <strong><?= esc($product->product_name) ?></strong> <!-- Use object property access -->
                                        </p>
                                    </td>
                                    <td>
                                        <?= esc(rp($product->product_price)) ?> <!-- Use object property access -->
                                    </td>
                                    <td>
                                        <form class="input-group flex-nowrap d-flex justify-content-center">
                                            <input type="number" class="form-control text-center col-md-2" name="jumlah" id="jumlah" value="<?= esc($product->quantity) ?>" readonly>
                                        </form>
                                    </td>
                                    <td class="text-center">
                                        <?= esc(rp($product->subtotal)) ?> <!-- Use object property access -->
                                    </td>
                                    <td>
                                        <?= btn_delete(
                                            base_url('carts/delete/' . esc($product->id)),
                                            'Produk',
                                            esc($product->product_name) // Use object property access for product name
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
                    <a href="#" class="btn btn-success float-right">
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