<?= $this->extend('layouts/app'); ?>
<?= $this->section('content'); ?>
<div class="row">
    <div class="col-md-9">
        <div class="row">
            <div class="col-12">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="row justify-content-between">
                            <div class="col-md-6 align-self-center mb-3 mb-md-0">
                                <?= 'Urutkan harga:' ?>
                                <a href="<?= base_url('/?short=termurah') ?>" class="badge badge-primary">
                                    <?= 'Termurah' ?>
                                </a>
                                <a href="<?= base_url('/?short=termahal') ?>" class="badge badge-primary">
                                    <?= 'Termahal' ?>
                                </a>
                            </div>
                            <div class="col-md-6 align-self-center">
                                <?= search('/') ?>
                            </div>
                        </div>
                    </div>
                </div>
                <p><?= 'Kategori :' ?>
                    <?php if (empty($currentCategory)): ?>
                        <span class="badge badge-primary badge-pill"><?= 'Semua Kategori' ?></span>
                    <?php else: ?>
                        <span class="badge badge-success badge-pill">
                            <?php
                            $categoryName = array_filter($categories, function ($category) use ($currentCategory) {
                                return $category['slug'] === $currentCategory;
                            });
                            echo $categoryName ? reset($categoryName)['name'] : 'Kategori Tidak Ditemukan';
                            ?>
                        </span>
                    <?php endif; ?>
                </p>
            </div>
        </div>
        <div class="row">
            <?php if ($products && count($products) > 0): ?>
                <?php foreach ($products as $product): ?>
                    <div class="col-md-4 mb-5">

                        <?= card(
                            idProduct: $product['id'],
                            name: $product['name'],
                            price: $product['price'],
                            img: $product['image'],
                            category: $product['category_name'],
                            count: $product['stocks'],
                            urlShow: base_url("product/" . $product['slug']),
                            urlCategory: base_url('/?category=' . $product['category_slug']),
                        ) ?>
                        <div class="card-footer">
                            <?= add_cart(id: $product['id']) ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif ?>
        </div>
        <div class="container">
            <?= $pager->links() ?>
        </div>
    </div>
    <div class="col-md-3">
        <div class="row mb-5">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <?= 'Kategori Produk' ?>
                    </div>
                    <div class="list-group">
                        <a href="<?= base_url('/') ?>" class="list-group-item list-group-item-action <?= empty($currentCategory) ? 'active' : '' ?>" aria-current="<?= empty($currentCategory) ? 'true' : 'false' ?>">
                            <?= 'Semua Kategori' ?>
                        </a>
                        <?php foreach ($categories as $category): ?>
                            <a href="<?= base_url('/?category=' . $category['slug']) ?>"
                                class="list-group-item list-group-item-action <?= ($currentCategory == $category['slug']) ? 'active' : '' ?>"
                                aria-current="<?= ($currentCategory == $category['slug']) ? 'true' : 'false' ?>">
                                <?= $category['name'] ?>
                            </a>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>