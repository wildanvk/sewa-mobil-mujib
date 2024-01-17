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
    <main class="d-flex flex-column vh-100">
        <!-- Navigation-->
        <?= $this->include('_layout/front/navbar') ?>

        <!-- Section-->
        <?= $this->renderSection('content') ?>

        <!-- Footer-->
        <?= $this->include('_layout/front/footer') ?>
    </main>


    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- JS Libraies -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Core theme JS-->
    <script src="<?= base_url('front') ?>/js/scripts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>

    <!-- Custom JS -->

    <?= $this->renderSection('javascript') ?>

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

        <?php if (session()->getFlashdata('gagal')) { ?>
            Swal.fire({
                icon: 'error',
                title: 'Gagal',
                text: '<?= session()->getFlashdata('gagal') ?>',
                showConfirmButton: true,
                timer: 3000
            })
        <?php } ?>

        <?php if (session()->getFlashdata('success')) { ?>
            Swal.fire({
                icon: 'success',
                title: 'Transaksi Berhasil',
                text: '<?= session()->getFlashdata('success') ?>',
                showConfirmButton: true,
                timer: 3000
            })
        <?php } ?>
        <?php if (session()->getFlashdata('batal')) { ?>
            Swal.fire({
                icon: 'success',
                title: 'Transaksi Dibatalkan',
                text: '<?= session()->getFlashdata('batal') ?>',
                showConfirmButton: true,
                timer: 3000
            })
        <?php } ?>
    </script>
</body>

</html>