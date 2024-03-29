    <?= $this->extend('_layout/front/template') ?>
    <?= $this->section('content') ?>
    <!-- Section-->
    <section class="py-5 flex-grow-1">
        <div class="container px-4 px-lg-5 my-5">
            <div class="row gx-4 gx-lg-5 align-items-center">
                <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0"
                        src="<?= base_url('uploads/mobil/') . $mobil['gambar_mobil'] ?>" alt="Gambar Mobil" /></div>
                <div class="col-md-6">
                    <h1 class="display-5 fw-bolder"><?= $mobil['nama_mobil'] ?></h1>
                    <div class="fs-5 mb-5">
                        <span><?= format_rupiah($mobil['harga_sewa']) ?> / hari</span>
                    </div>
                    <table class="table">
                        <tr>
                            <th>Warna</th>
                            <td>:</td>
                            <td><?= $mobil['warna'] ?></td>
                        </tr>
                        <tr>
                            <th>Merek</th>
                            <td>:</td>
                            <td><?= $mobil['nama_merek'] ?></td>
                        </tr>
                        <tr>
                            <th>Tahun</th>
                            <td>:</td>
                            <td><?= $mobil['tahun'] ?></td>
                        </tr>
                        <tr>
                            <th>Plat Nomor</th>
                            <td>:</td>
                            <td><?= $mobil['plat_nomor'] ?></td>
                        </tr>
                        <tr>
                            <th>Denda</th>
                            <td>:</td>
                            <td><?= format_rupiah($mobil['denda']) ?> / hari</td>
                        </tr>
                        <tr>
                            <th>AC</th>
                            <td>:</td>
                            <td>
                                <?php if ($mobil['fitur_ac'] == 'Ada') { ?>
                                <span class="badge text-bg-success">
                                    Ada
                                </span>
                                <?php } else { ?>
                                <span class="badge text-bg-danger">
                                    Tidak Ada
                                </span>
                                <?php } ?>
                            </td>
                        </tr>
                        <tr>
                            <th>TV</th>
                            <td>:</td>
                            <td>
                                <?php if ($mobil['fitur_tv'] == 'Ada') { ?>
                                <span class="badge text-bg-success">
                                    Ada
                                </span>
                                <?php } else { ?>
                                <span class="badge text-bg-danger">
                                    Tidak Ada
                                </span>
                                <?php } ?>
                            </td>
                        </tr>
                        <tr>
                            <th>Tersedia</th>
                            <td>:</td>
                            <td>
                                <?php if ($mobil['tersedia'] == 'Tersedia') { ?>
                                <span class="badge text-bg-success">
                                    Tersedia
                                </span>
                                <?php } else { ?>
                                <span class="badge text-bg-danger">
                                    Tidak Tersedia
                                </span>
                                <?php } ?>
                            </td>
                        </tr>

                    </table>
                    <div class="d-flex gap-2">
                        <?php if ($mobil['tersedia'] == 'Tersedia') { ?>
                        <a class="btn btn-primary mt-auto" aria-disabled="true"
                            href="/rent/form_rental/<?= $mobil['id_mobil'] ?>">Sewa</a>
                        <?php } else { ?>
                        <a class="btn btn-secondary disabled mt-auto">Tidak tersedia</a>
                        <?php } ?>
                        <a class="btn btn-outline-dark" type="button" href="/">
                            Kembali
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?= $this->endSection() ?>