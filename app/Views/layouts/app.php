<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.5/css/lightbox.css" rel="stylesheet">
    <title>Niaga <?= isset($title) ? '| ' . $title : '| Situs Jual beli online' ?></title>
    <style>
        .header-content {
            margin-top: 8vh;
        }

        .carousel {
            height: 30vh;
            width: 100%;
        }

        .carousel .carousel-item img {
            width: 100%;
            height: 30vh;
        }

        .bg-green {
            background-color: #00B140;
            color: white;
        }

        .text-green {
            color: #00B140;
        }

        .nav-link .badge {
            top: 0px;
            right: -2px;
            font-size: 0.7rem;
            /* Adjust the font size for a smaller badge */
        }
    </style>
</head>

<body>
    <?= $this->include('layouts/navbar') ?>
    <div class="container header-content">
        <?php if ($_SERVER['REQUEST_URI'] == '/'): ?>
            <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                    <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="<?= base_url('img/img1.jpg') ?>" class="d-block rounded" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>First slide label</h5>
                            <p>Some representative placeholder content for the first slide.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="<?= base_url('img/img2.jpg') ?>" class="d-block rounded" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Second slide label</h5>
                            <p>Some representative placeholder content for the second slide.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="<?= base_url('img/img3.png') ?>" class="d-block rounded" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Third slide label</h5>
                            <p>Some representative placeholder content for the third slide.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="<?= base_url('img/img4.jpg') ?>" class="d-block rounded" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Third slide label</h5>
                            <p>Some representative placeholder content for the third slide.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="<?= base_url('img/img5.jpg') ?>" class="d-block rounded" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Third slide label</h5>
                            <p>Some representative placeholder content for the third slide.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="<?= base_url('img/img6.avif') ?>" class="d-block rounded" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Third slide label</h5>
                            <p>Some representative placeholder content for the third slide.</p>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-target="#carouselExampleCaptions" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-target="#carouselExampleCaptions" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </button>
            </div>
        <?php else: ?>
        <?php endif; ?>
    </div>
    <main class="container my-5">
        <?= $this->renderSection('content'); ?>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.5/js/lightbox.min.js"></script>
    <script src="<?= base_url('js/slug.js') ?>"></script>
    <?php if (session()->getFlashdata('success')) : ?>
        <script>
            swal({
                title: "Succesfuly!",
                text: "<?= session()->getFlashdata('success'); ?>",
                icon: "success",
            });
        </script>
    <?php elseif (session()->getFlashdata('error')) : ?>
        <script>
            swal({
                title: "Oops!",
                text: "<?= session()->getFlashdata('error'); ?>",
                icon: "error",
            });
        </script>
    <?php endif; ?>
</body>

</html>