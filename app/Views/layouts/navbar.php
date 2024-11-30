<nav class="navbar navbar-expand-lg navbar-light fixed-top bg-white">
    <div class="container">
        <a class="navbar-brand text-success mr-md-5" href="<?= base_url('/') ?>">NIAGA</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarScroll">
            <?= $this->include('layouts/nav-left') ?>
            <?= $this->include('layouts/nav-right') ?>
        </div>
    </div>
</nav>