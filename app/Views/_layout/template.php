<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title><?= $title ?></title>

    <!-- General CSS Files -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url('stisla') ?>/assets/css/selectric.css">

    <!-- Template CSS -->
    <link rel="stylesheet" href="<?= base_url('stisla') ?>/assets/css/style.css">
    <link rel="stylesheet" href="<?= base_url('stisla') ?>/assets/css/components.css">
</head>

<body>
    <div id="app">
        <div class="main-wrapper">
            <!-- Header -->
            <?= $this->include('_layout/header') ?>
            <!-- Sidebar -->
            <?= $this->include('_layout/sidebar') ?>
            <!-- Content -->
            <?= $this->renderSection('content') ?>



            <!-- Footer -->
            <?= $this->include('_layout/footer') ?>

        </div>
    </div>

    <!-- General JS Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="<?= base_url('stisla') ?>/assets/js/stisla.js"></script>

    <!-- JS Libraies -->
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="<?= base_url('stisla') ?>/assets/js/page/jquery.selectric.min.js"></script>

    <!-- Template JS File -->
    <script src="<?= base_url('stisla') ?>/assets/js/scripts.js"></script>
    <script src="<?= base_url('stisla') ?>/assets/js/custom.js"></script>

    <!-- Custom JS Scripts -->
    <script>
        <?php if (session()->getFlashdata('success')) { ?>
            Swal.fire({
                icon: 'success',
                title: 'Tambah berhasil',
                text: '<?= session()->getFlashdata('success') ?>',
                showConfirmButton: true,
                timer: 3000
            })
        <?php } ?>
        <?php if (session()->getFlashdata('update')) { ?>
            Swal.fire({
                icon: 'info',
                title: 'Update berhasil',
                text: '<?= session()->getFlashdata('update') ?>',
                showConfirmButton: true,
                timer: 3000
            })
        <?php } ?>
        <?php if (session()->getFlashdata('delete')) { ?>
            Swal.fire({
                icon: 'info',
                title: 'Hapus berhasil',
                text: '<?= session()->getFlashdata('delete') ?>',
                showConfirmButton: true,
                timer: 3000
            })
        <?php } ?>
    </script>

    <!-- Page Specific JS File -->
</body>

</html>