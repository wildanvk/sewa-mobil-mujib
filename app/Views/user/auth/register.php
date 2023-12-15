<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Register &mdash; User</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!-- Template CSS -->
    <link rel="stylesheet" href="<?= base_url('stisla') ?>/assets/css/style.css">
    <link rel="stylesheet" href="<?= base_url('stisla') ?>/assets/css/components.css">
</head>

<body>
    <div id="app">
        <section class="section">
            <div class="container mt-5">
                <div class="row">
                    <div
                        class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                        <div class="login-brand">
                            <img src="<?= base_url('stisla') ?>/assets/img/stisla-fill.svg" alt="logo" width="100"
                                class="shadow-light rounded-circle">
                        </div>

                        <div class="card card-primary">
                            <div class="card-header justify-content-center">
                                <h4>Register User</h4>
                            </div>

                            <div class="card-body">
                                <form method="post" action="/user/create">
                                    <?php $errors = validation_errors() ?>
                                    <?= csrf_field() ?>
                                    <div class="form-group">
                                        <label for="nama">Nama lengkap</label>
                                        <input id="nama" type="text"
                                            class="form-control <?= isset($errors['nama']) ? 'is-invalid' : '' ?>"
                                            name="nama" autofocus>
                                        <div class="invalid-feedback">
                                            <?= validation_show_error('nama') ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="nik">NIK</label>
                                        <input id="nik" type="text"
                                            class="form-control <?= isset($errors['nik']) ? 'is-invalid' : '' ?>"
                                            name="nik">
                                        <div class="invalid-feedback">
                                            <?= validation_show_error('nik') ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="d-block">Jenis Kelamin</label>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="laki-laki" name="jenis_kelamin"
                                                class="custom-control-input" value="laki-laki">
                                            <label class="custom-control-label" for="laki-laki">Laki-laki</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="perempuan" name="jenis_kelamin"
                                                class="custom-control-input" value="perempuan">
                                            <label class="custom-control-label" for="perempuan">Perempuan</label>
                                        </div>
                                        <div class="d-block invalid-feedback">
                                            <?= validation_show_error('jenis_kelamin') ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input id="email" type="text"
                                            class="form-control <?= isset($errors['email']) ? 'is-invalid' : '' ?>"
                                            name="email">
                                        <div class="invalid-feedback">
                                            <?= validation_show_error('email') ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="telepon">No. Telepon</label>
                                        <input id="telepon" type="text"
                                            class="form-control <?= isset($errors['telepon']) ? 'is-invalid' : '' ?>"
                                            name="telepon">
                                        <div class="invalid-feedback">
                                            <?= validation_show_error('telepon') ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="alamat">Alamat</label>
                                        <input id="alamat" type="text"
                                            class="form-control <?= isset($errors['alamat']) ? 'is-invalid' : '' ?>"
                                            name="alamat">
                                        <div class="invalid-feedback">
                                            <?= validation_show_error('alamat') ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="d-block">
                                            <label for="password" class="control-label">Password</label>
                                            <div class="float-right">
                                            </div>
                                        </div>
                                        <input id="password" type="password"
                                            class="form-control <?= isset($errors['password']) ? 'is-invalid' : '' ?>"
                                            name="password">
                                        <div class="invalid-feedback">
                                            <?= validation_show_error('password') ?>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                            Register
                                        </button>
                                    </div>
                                </form>
                                <div class="mt-5 text-muted text-center">
                                    Sudah memiliki Akun? <a href="/user/login">Login sekarang</a>
                                </div>
                            </div>
                        </div>

                        <div class="mt-5 text-center">
                            <a href="/">Kembali</a>
                        </div>
                        <div class="simple-footer">
                            Copyright &copy; Stisla 2023
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- General JS Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="<?= base_url('stisla') ?>/assets/js/stisla.js"></script>

    <!-- JS Libraies -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Template JS File -->
    <script src="<?= base_url('stisla') ?>/assets/js/scripts.js"></script>
    <script src="<?= base_url('stisla') ?>/assets/js/custom.js"></script>

    <!-- Custom JS Scripts -->
    <script>
    <?php if (session()->getFlashdata('failed')) { ?>
    Swal.fire({
        icon: 'error',
        title: 'Gagal',
        text: '<?= session()->getFlashdata('failed') ?>',
        showConfirmButton: true,
        timer: 3000
    })
    <?php } ?>
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