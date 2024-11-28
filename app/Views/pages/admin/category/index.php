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
                        <tr>
                            <td>murtakibangko@gmail.com</td>
                            <td>Admin</td>
                            <td>
                                <div class="dropdown">
                                    <button
                                        type="button"
                                        class="btn btn-danger btn-sm dropdown-toggle"
                                        data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                        Opsi
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#">Ganti Role</a></li>
                                        <li><a class="dropdown-item" href="#">Edit</a></li>
                                        <li><a class="dropdown-item" href="#">Hapus</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>

                <!-- <form>
                            <div class="form-group">
                                <label for="email">E-mail</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan E-mail">
                                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                            </div>
                            <div class="form-group">
                                <label for="password">Kata Sandi</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan Password">
                            </div>
                            <div class="float-right">
                                <button type="submit" class="btn btn-primary">Login 
                                    <i class="fas fa-sign-in-alt"></i>
                                </button>
                            </div>
                        </form> -->
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>