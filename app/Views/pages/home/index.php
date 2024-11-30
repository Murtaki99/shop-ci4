<?= $this->extend('layouts/app'); ?>
<?= $this->section('content'); ?>
<div class="row">
    <div class="col-md-9">
        <div class="row">
            <div class="col-12">
                <div class="card mb-3">
                    <div class="card-body">
                        Kategori: <strong>Semua Kategori</strong>
                        <span class="float-right">
                            Urutkan harga:
                            <a href="#" class="badge badge-primary">
                                Termurah
                            </a>
                            <a href="#" class="badge badge-primary">
                                Termahal
                            </a>
                        </span>
                    </div>
                </div>
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
                            category: $product['category'],
                            count: $product['stocks'],
                            description: $product['description']
                        ) ?>

                        <?= modal_show(
                            idProduct: $product['id'],
                            name: $product['name'],
                            price: $product['price'],
                            img: $product['image'],
                            category: $product['category'],
                            count: $product['stocks'],
                            description: $product['description']
                        ) ?>
                        
                        <div class="card-footer">
                            <form class="input-group flex-nowrap">
                                <input type="search" class="form-control" name="search" id="search">
                                <div class="input-group-prepend">
                                    <button type="submit" class="btn btn-primary" id="addon-wrapping">
                                        <i class="fas fa-cart-plus"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif ?>
        </div>
        <div class="container">
            <?php if ($products && count($products) >= 6): ?>
                <?= $pager->links() ?>
            <?php endif; ?>
        </div>
    </div>
    <div class="col-md-3">
        <div class="row mb-5">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        Pencarian Produk
                    </div>
                    <div class="card-body">
                        <form class="input-group flex-nowrap">
                            <input type="search" class="form-control" name="search" id="search" placeholder="Cari...">
                            <div class="input-group-prepend">
                                <button type="submit" class="btn btn-primary" id="addon-wrapping">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-5">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        Kategori
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">semua Kategori</li>
                        <li class="list-group-item">A second item</li>
                        <li class="list-group-item">A third item</li>
                        <li class="list-group-item">A fourth item</li>
                        <li class="list-group-item">And a fifth one</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>