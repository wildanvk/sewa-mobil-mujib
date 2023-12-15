<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Rental Mobil</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="<?= base_url('front') ?>/css/styles.css" rel="stylesheet" />
</head>

<body>
    <!-- Navigation-->
    <?= $this->include('_layout/front/navbar') ?>

    <!-- Section-->
    <?= $this->renderSection('content') ?>

    <!-- Footer-->
    <?= $this->include('_layout/front/footer') ?>


    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- JS Libraies -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Core theme JS-->
    <script src="<?= base_url('front') ?>/js/scripts.js"></script>
    <script>
    <?php if (session()->getFlashdata('logout')) { ?>
    Swal.fire({
        icon: 'success',
        title: 'Berhasil Logout',
        text: '<?= session()->getFlashdata('logout') ?>',
        showConfirmButton: true,
        timer: 3000
    })
    <?php } ?>
    </script>
</body>

</html>