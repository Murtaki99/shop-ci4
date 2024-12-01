<?= $this->extend('layouts/app'); ?>
<?= $this->section('content'); ?>
<div class="row">
    <div class="col-md-6">
        <?php if (!empty($product['image'])): ?>
            <img src="<?= base_url('storage/products/' . esc($product['image'])) ?>" class="card-img-top" alt="<?= esc($product['name']) ?>" />
        <?php else: ?>
            <img src="https://placehold.co/350x400" class="card-img-top" alt="<?= esc($product['name']) ?>" />
        <?php endif; ?>
    </div>
    <div class="col-md-6">
        <h2 class="card-tite"><?= esc($product['name']) ?></h2>
        <h4 class="card-text mb-0 font-weight-bold"><?= esc(rp($product['price'])) ?></h4>
        <p class="card-text mb-0"><?= esc(str_limit($product['description'])) ?></p>
        <a href="<?= base_url('/?category=' . $product['category_slug']) ?>" class="badge badge-primary badge-pill"><i class="fas fa-tag"></i> <?= $product['category_name'] ?></a>
        <span class="badge badge-success badge-pill">Tersisa <?= $product['stocks'] ?> <?= 'Item' ?></span>
        <form class=" my-4 input-group flex-nowrap">
            <input type="search" class="form-control" name="search" id="search">
            <div class="input-group-prepend">
                <button type="submit" class="btn btn-primary" id="addon-wrapping">
                    <i class="fas fa-cart-plus"></i>
                </button>
            </div>
        </form>
    </div>
    <a href="<?= base_url('/') ?>" class="btn btn-light btn-sm my-3"><?= 'Kembali' ?></a>
</div>
<?= $this->endSection(); ?>