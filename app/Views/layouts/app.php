<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <title>Olshop | <?= isset($title) ? $title : '' ?></title>
</head>

<body>
    <?= $this->include('layouts/navbar') ?>
    <main class="container my-5">
        <?= $this->renderSection('content'); ?>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
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