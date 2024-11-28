<?= $this->extend('layouts/app'); ?>
<?= $this->section('content'); ?>
<div class="row">
    <div class="col-md-8 mx-auto">
        <div class="card">
            <div class="card-header">
                <?= isset($title) ? $title : '' ?>
            </div>
            <div class="card-body">
                <form>
                    <div class="form-group">
                        <label for="email">E-Mail</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan E-Mail Valid">
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>

                    <div class="form-group">
                        <label for="password">Kata Sandi</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan Kata Sandi">
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>
                    <div class="float-right">
                        <button type="submit" class="btn btn-primary">Daftar Sekarang
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>