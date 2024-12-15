<?= $this->extend('layouts/app'); ?>
<?= $this->section('content'); ?>
<div class="row">
    <!-- Sidebar -->
    <div class="col-md-3">
        <?= $this->include('layouts/menu_side') ?>
    </div>
    <div class="col-md-9">
        <div class="card mb-3">
            <div class="card-header">
                <?= isset($title) ? $title : '' ?>
            </div>
            <div class="card-body">
                <div class="row mb-5">
                    <div class="col-md-4 text-center">
                        <img src="https://placehold.co/200x200">
                    </div>
                    <div class="col-md-8">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Nama: Murtaki</li>
                            <li class="list-group-item">Email: murtakibangko@gmail.com</li>
                            <li class="list-group-item">Telepone: 082279761815</li>
                        </ul>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">
                    Edit
                </button>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>