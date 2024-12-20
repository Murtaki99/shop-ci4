<?= $this->extend('layouts/app'); ?>
<?= $this->section('content'); ?>
<div class="row">
    <div class="col-md-10 mx-auto">
        <div class="card">
            <div class="card-header">
                <span>Kategori</span>
                <a href="<?= route_to('categories/create') ?>" class="btn btn-sm btn-secondary"> Tambah</a>
                <div class="float-right">
                    <?= search('/categories') ?>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Kategori</th>
                            <th scope="col">Slug</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($categories && count($categories) > 0): ?>
                            <?php foreach ($categories as $index => $category): ?>
                                <tr>
                                    <td><?= no($pager, $index) ?></td>
                                    <td><?= esc($category['name']) ?></td>
                                    <td><?= esc($category['slug']) ?></td>
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
                                                <li><a class="dropdown-item" href="<?= base_url('/categories/edit/' . esc($category['slug'])) ?>">Edit</a></li>
                                                <li>
                                                    <?= btn_delete(base_url('categories/delete/' . esc($category['slug'])), 'Kategori', esc($category['name'])) ?>
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
                <?= $pager->links() ?>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>