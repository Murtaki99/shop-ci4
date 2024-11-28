<?= $this->extend('layouts/app'); ?>
<?= $this->section('content'); ?>
<div class="row">
    <div class="col-md-10 mx-auto">
        <div class="card">
            <div class="card-header">
                <span>Kategori</span>
                <a href="<?= route_to('categories/create') ?>" class="btn btn-sm btn-secondary"> Tambah</a>
                <div class="float-right">
                    <form class="input-group flex-nowrap">
                        <input type="search" class="form-control form-control-sm" name="search" id="search" placeholder="Cari...">
                        <div class="input-group-prepend">
                            <button type="submit" class="btn btn-primary btn-sm" id="addon-wrapping">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Nama Kategori</th>
                            <th scope="col">Slug</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($categories as $category): ?>
                            <tr>
                                <td><?= $category['name'] ?></td>
                                <td><?= $category['slug'] ?></td>
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
                                            <li><a class="dropdown-item" href="<?= base_url('/categories/edit/' . $category['slug']) ?>">Edit</a></li>
                                            <li>
                                                <?= btn_delete(base_url('categories/delete/' . $category['slug']), 'Hapus Kategori', $category['name']) ?>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>