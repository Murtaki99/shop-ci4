<?= $this->extend('layouts/app'); ?>
<?= $this->section('content'); ?>
<div class="row">
    <div class="col-md-8 mx-auto">
        <div class="card">
            <div class="card-header">
                <?= isset($title) ? $title : '' ?>
            </div>
            <div class="card-body">
                <form method="POST" action="<?= site_url('register') ?>" enctype="multipart/form-data">
                    <?= csrf_field() ?>
                    <div class="form-group">
                        <label for="name">Nama Lengkap</label>
                        <input type="text" class="form-control <?= session('errors.name') ? 'is-invalid' : '' ?>" id="name" name="name" placeholder="Masukkan Nama Lengkap" value="<?= old('name') ?>">
                        <small class="invalid-feedback">
                            <?= session('errors.name') ?>
                        </small>
                    </div>

                    <div class="form-group">
                        <label for="email">E-Mail</label>
                        <input type="email" class="form-control <?= session('errors.email') ? 'is-invalid' : '' ?>" id="email" name="email" placeholder="Masukkan E-Mail Valid" value="<?= old('email') ?>">
                        <small class="invalid-feedback">
                            <?= session('errors.email') ?>
                        </small>
                    </div>

                    <div class="form-group">
                        <label for="password">Kata sandi</label>
                        <input type="password" class="form-control <?= session('errors.password') ? 'is-invalid' : '' ?>" id="password" name="password" placeholder="Masukkan Kata Sandi">
                        <small class="invalid-feedback">
                            <?= session('errors.password') ?>
                        </small>
                    </div>

                    <div class="form-group">
                        <label for="password_confirmation">Konfirmasi kata sandi</label>
                        <input type="password" class="form-control <?= session('errors.password_confirmation') ? 'is-invalid' : '' ?>" id="password_confirmation" name="password_confirmation" placeholder="Konfirmasi Kata Sandi">
                        <small class="invalid-feedback">
                            <?= session('errors.password_confirmation') ?>
                        </small>
                    </div>

                    <div class="float-right">
                        <button type="submit" class="btn btn-primary">Daftar Sekarang</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>