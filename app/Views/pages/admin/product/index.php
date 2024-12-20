<?= $this->extend('layouts/app'); ?>
<?= $this->section('content'); ?>
<div class="row">
    <div class="col-md-10 mx-auto">
        <div class="card">
            <div class="card-header">
                <span>Produk</span>
                <a href="<?= route_to('products/create') ?>" class="btn btn-sm btn-secondary"> Tambah</a>
                <div class="float-right">
                    <?= search('/products') ?>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Produk</th>
                            <th scope="col">Kategori</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Stok</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($products && count($products) > 0): ?>
                            <?php foreach ($products as $index => $product): ?>
                                <tr>
                                    <td><?= no($pager, $index) ?></td>

                                    <td>
                                        <p>
                                            <?php if (!empty($product['image'])) : ?>
                                                <a href="<?= base_url('storage/products/' . $product['image']) ?>" data-lightbox="product-gallery" data-title="<?= esc($product['name']) ?>">
                                                    <img src="<?= base_url('storage/products/' . $product['image']) ?>" alt="<?= esc($product['name']) ?>" width="50" height="50">
                                                </a>
                                            <?php else : ?>
                                                <img src="https://placehold.co/50x50" alt="No Image">
                                            <?php endif; ?>
                                            <strong><?= esc($product['name']) ?></strong>
                                        </p>
                                    </td>
                                    <td><?= esc($product['category']) ?></td>
                                    <td><?= esc(rp(($product['price']))) ?></td>
                                    <td><?= esc($product['stocks']) ?> Item</td>
                                    <td>
                                        <div class="dropdown">
                                            <button
                                                type="button"
                                                class="btn btn-danger btn-sm dropdown-toggle"
                                                data-toggle="dropdown"
                                                aria-expanded="false">
                                                Opsi
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="<?= base_url('/products/edit/' . esc($product['slug'])) ?>">Edit</a></li>
                                                <li>
                                                    <?= btn_delete(base_url('products/delete/' . esc($product['slug'])), 'Produk', esc($product['name'])) ?>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="4" class="text-center">Data tidak ada.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>

                </table>
                <div class="container">
                    <?= $pager->links() ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>