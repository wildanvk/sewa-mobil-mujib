    <?= $this->extend('_layout/front/template') ?>
    <?= $this->section('content') ?>
    <!-- Header-->
    <header class="bg-dark py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="text-center text-white">
                <h1 class="display-4 fw-bolder">Rental Mobil</h1>
                <p class="lead fw-normal text-white-50 mb-0">Rental mobil terpercaya di Kota Pekalongan</p>
            </div>
        </div>
    </header>
    <!-- Section-->
    <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
            <?php if ($mobil) { ?>
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-3 justify-content-center">
                    <?php foreach ($mobil as $key => $row) : ?>
                        <div class="col mb-5">
                            <div class="card p-2 h-100">
                                <!-- Product image-->
                                <img class="card-img-top" src="<?= base_url('uploads/mobil/') . $row['gambar_mobil'] ?>" alt="<?= $row['nama_mobil'] ?>" />
                                <!-- Product details-->
                                <div class="card-body p-4 text-center">
                                    <div class="text-center">
                                        <!-- Product name-->
                                        <h5 class="fw-bolder"><?= $row['nama_mobil'] ?></h5>
                                        <!-- Product price-->
                                        <?= format_rupiah($row['harga_sewa']) ?> / hari
                                    </div>
                                    <span class="badge <?= $row['fitur_ac'] == 'Ada' ? 'text-bg-primary' : 'text-bg-secondar' ?>">AC</span>
                                    <span class="badge <?= $row['fitur_tv'] == 'Ada' ? 'text-bg-primary' : 'text-bg-secondary' ?>">TV</span>
                                </div>
                                <!-- Product actions-->
                                <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                    <div class="text-center">
                                        <a class="btn <?= $row['tersedia'] == 'Tersedia' ? 'btn-primary' : 'btn-secondary disabled' ?> mt-auto" <?= $row['tersedia'] == 'Tersedia' ? 'aria-disabled="true"' : '' ?> href="#"><?= $row['tersedia'] == 'Tersedia' ? 'Sewa' : 'Tidak tersedia' ?></a>
                                        <a class="btn btn-outline-success mt-auto" href="#">Detail</a>
                                    </div>p
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php } else { ?>
                <div class="col mb-5 text-center">
                    <h2>Tidak ada mobil yang tersedia</h2>
                </div>
            <?php } ?>
        </div>
    </section>
    <?= $this->endSection() ?>