    <?= $this->extend('_layout/front/template') ?>
    <?= $this->section('content') ?>
    <!-- Section-->
    <section class="py-5 flex-grow-1">
        <div class="container px-4 px-lg-5 my-5">
            <div class="card">
                <h5 class="card-header text-bg-dark">Data Transaksi</h5>
                <div class="card-body">
                    <?php if ($transaksi == null) { ?>
                        <div class="row g-0 py-3">
                            <div class="card-body">
                                <h4 class="card-title text-center">Tidak ada transaksi yang aktif.</h4>
                            </div>
                        </div>
                    <?php } else { ?>
                        <?php foreach ($transaksi as $key => $row) : ?>
                            <div class="row g-0 py-3">
                                <div class="col-md-3 d-flex align-items-center justify-content-center">
                                    <img src="<?= base_url('uploads/mobil/') . $row['gambar_mobil'] ?>" width="200px" class="rounded-start" alt="Gambar mobil">
                                </div>
                                <div class="col-md-6">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center gap-2 my-2">
                                            <h4 class="card-title m-0"><?= $row['id_transaksi'] ?></h4>
                                            <?php if ($row['status'] == 'Belum Bayar') { ?>
                                                <p class="badge text-bg-warning m-0"><?= $row['status'] ?></p>
                                            <?php } elseif ($row['status'] == 'Menunggu Konfirmasi') { ?>
                                                <p class="badge text-bg-primary m-0"><?= $row['status'] ?></p>
                                            <?php } else { ?>
                                                <p class="badge text-bg-success m-0"><?= $row['status'] ?></p>
                                            <?php } ?>
                                            <?php if ($row['status_transaksi'] === 'Aktif') { ?>
                                                <p class="badge text-bg-primary m-0"><?= $row['status_transaksi'] ?></p>
                                            <?php } else { ?>
                                                <p class="badge text-bg-success m-0"><?= $row['status_transaksi'] ?></p>
                                            <?php } ?>
                                        </div>
                                        <table class="table table-borderless">
                                            <thead>
                                                <th>Tanggal Sewa</th>
                                                <th>Tanggal Kembali</th>
                                                <th>Lama Sewa</th>
                                            </thead>
                                            <tbody>
                                                <td><?= $row['tanggal_sewa'] ?></td>
                                                <td><?= $row['tanggal_kembali'] ?></td>
                                                <td><?= $row['lama_sewa'] ?> Hari</td>
                                            </tbody>
                                        </table>
                                        <p class="card-text"><small class="text-body-secondary">Diajukan
                                                pada <?= $row['created_at'] ?></small>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-3 gap-2 d-flex align-items-center">
                                    <?php if ($row['status'] == 'Belum Bayar') { ?>
                                        <a class="btn btn-success btn" href="/rent/menu_pembayaran/<?= $row['id_transaksi'] ?>">
                                            <i class="bi bi-wallet2 me-1"></i>
                                            Bayar
                                        </a>
                                        <button class="btn btn-outline-danger btn cancel-button" type="button" data-id="<?= $row['id_transaksi'] ?>">
                                            <i class="bi bi-x-circle me-1"></i>
                                            Batal
                                        </button>
                                    <?php } else { ?>
                                        <a class="btn btn-primary btn-lg" href="/rent/menu_pembayaran/<?= $row['id_transaksi'] ?>"><i class="bi bi-ticket-detailed-fill me-2"></i>Lihat Detail</a>
                                    <?php } ?>
                                </div>
                            </div>
                        <?php endforeach ?>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>

    <?= $this->section('javascript') ?>
    <script>
        $(document).ready(function() {
            $('.cancel-button').on('click', function() {
                dialogBatalPesanan($(this).data('id'));
            });

            function dialogBatalPesanan(id) {
                Swal.fire({
                    title: 'Peringatan',
                    text: "Apakah Anda yakin untuk membatalkan transaksi ini?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, lanjutkan',
                    cancelButtonText: 'Tidak, kembali',
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "/rent/batal_transaksi/" + id
                    }
                })
            }
        });
    </script>
    <?= $this->endSection() ?>

    <?= $this->endSection() ?>