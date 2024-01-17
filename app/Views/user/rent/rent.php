    <?= $this->extend('_layout/front/template') ?>
    <?= $this->section('content') ?>
    <!-- Section-->
    <section class="py-5 flex-grow-1">
        <div class="container px-4 px-lg-5 my-5">
            <div class="row gx-4 gx-lg-5 align-items-center">
                <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0"
                        src="<?= base_url('uploads/mobil/') . $mobil['gambar_mobil'] ?>" alt="Gambar Mobil" /></div>
                <div class="col-md-6">
                    <h1 class="display-5 fw-bolder">Form Rental Mobil</h1>
                    <table class=" table">
                        <tr>
                            <th>Nama Mobil</th>
                            <td>:</td>
                            <td><?= $mobil['nama_mobil'] ?></td>
                        </tr>
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
                            <th>Harga Sewa</th>
                            <td>:</td>
                            <td><span class="badge text-bg-primary"><?= format_rupiah($mobil['harga_sewa']) ?> /
                                    hari</span>
                            </td>
                        </tr>
                        <tr>
                            <th>Denda</th>
                            <td>:</td>
                            <td><span class="badge text-bg-danger"><?= format_rupiah($mobil['denda']) ?> /
                                    hari</span>
                            </td>
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
                    <form action="/rent/transaksi_sewa" method="post">
                        <input type="hidden" name="id_mobil" value="<?= $mobil['id_mobil'] ?>">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="tanggal_sewa" class="form-label">Tanggal Sewa</label>
                                    <input type="date" class="form-control" id="tanggal_sewa" name="tanggal_sewa">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="tanggal_kembali" class="form-label">Tanggal Kembali</label>
                                    <input type="date" class="form-control" id="tanggal_kembali" name="tanggal_kembali">
                                </div>
                            </div>
                        </div>
                        <div class="d-flex gap-2 justify-content-center">
                            <button class="btn btn-primary mt-auto" type="submit">Simpan</button>
                            <a class="btn btn-outline-dark" type="button" href="/">
                                Kembali
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <?= $this->endSection() ?>