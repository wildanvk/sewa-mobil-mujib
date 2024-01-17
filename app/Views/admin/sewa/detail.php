<?= $this->extend('_layout/template') ?>
<?= $this->section('content') ?>
<div class="main-content">
    <!-- Modal -->
    <div class="modal fade" id="buktiPembayaran" tabindex="-1" aria-labelledby="buktiPembayaran" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="buktiPembayaran">Bukti Pembayaran</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="d-flex justify-content-center align-items-center">
                        <img src="/image/bukti/<?= $transaksi['bukti_pembayaran'] ?>" class="rounded-start img-fluid"
                            alt="Bukti Pembayaran">
                    </div>
                </div>
                <div class="modal-footer mx-auto">
                    <button type="button" class="btn btn-primary btn-lg" data-bs-dismiss="modal">Tutup
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="fotoKTP" tabindex="-1" aria-labelledby="fotoKTP" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="fotoKTP">Foto KTP</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="d-flex justify-content-center align-items-center">
                        <img src="/image/ktp/<?= $transaksi['foto_ktp'] ?>" class="rounded-start img-fluid"
                            alt="Foto KTP">
                    </div>
                </div>
                <div class="modal-footer mx-auto">
                    <button type="button" class="btn btn-primary btn-lg" data-bs-dismiss="modal">Tutup
                    </button>
                </div>
            </div>
        </div>
    </div>

    <section class="section">
        <div class="section-header">
            <h1>Detail Transaksi</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item">
                    <a href="/admin/transaksi/detail/<?= $transaksi['id_transaksi'] ?>">Detail Transaksi</a>
                </div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Detail Mobil</h4>
                        </div>
                        <div class="card-body">
                            <div class="row g-0">
                                <div class="col-md-3 d-flex align-items-center justify-content-center">
                                    <img src="<?= base_url('uploads/mobil/') . $transaksi['gambar_mobil'] ?>"
                                        width="200px" class="rounded-start" alt="Gambar mobil">
                                </div>
                                <div class="col-md-9">
                                    <div class="card-body">
                                        <table class="table table-borderless">
                                            <thead>
                                                <th>Nama Mobil</th>
                                                <th>Plat Nomor</th>
                                                <th>Harga Sewa</th>
                                                <th>Denda</th>
                                                <th>AC</th>
                                                <th>TV</th>
                                            </thead>
                                            <tbody>
                                                <td><?= $transaksi['nama_mobil'] ?></td>
                                                <td><?= $transaksi['plat_nomor'] ?></td>
                                                <td><?= format_rupiah($transaksi['harga_sewa']) ?> / Hari</td>
                                                <td><?= format_rupiah($transaksi['denda']) ?> / Hari</td>
                                                <td>
                                                    <div
                                                        class="badge <?= $transaksi['fitur_ac'] === 'Ada' ? 'badge-success' : 'badge-warning' ?>">
                                                        <?= $transaksi['fitur_ac'] ?>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div
                                                        class="badge <?= $transaksi['fitur_tv'] === 'Ada' ? 'badge-success' : 'badge-warning' ?>">
                                                        <?= $transaksi['fitur_tv'] ?>
                                                    </div>
                                                </td>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header justify-content-between">
                            <h4>Detail Invoice</h4>
                            <?php if ($transaksi['status_transaksi'] === 'Aktif') { ?>
                            <span class="badge badge-primary"><?= $transaksi['status_transaksi'] ?></span>
                            <?php } else { ?>
                            <span class="badge badge-success"><?= $transaksi['status_transaksi'] ?></span>
                            <?php } ?>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID Transaksi</th>
                                        <td>:</td>
                                        <td><span
                                                class="badge bg-primary fw-bold"><?= $transaksi['id_transaksi'] ?></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Tanggal Sewa</th>
                                        <td>:</td>
                                        <td><?= $transaksi['tanggal_sewa'] ?></td>
                                    </tr>
                                    <tr>
                                        <th>Tanggal Kembali</th>
                                        <td>:</td>
                                        <td><?= $transaksi['tanggal_kembali'] ?></td>
                                    </tr>
                                    <tr>
                                        <th>Harga Sewa</th>
                                        <td>:</td>
                                        <td><?= format_rupiah($transaksi['harga_sewa']) ?> / hari</td>
                                    </tr>
                                    <tr>
                                        <th>Lama Sewa</th>
                                        <td>:</td>
                                        <td><?= $transaksi['lama_sewa'] ?> hari</td>
                                    </tr>
                                    <tr>
                                        <th>Total Bayar</th>
                                        <td>:</td>
                                        <td><span
                                                class="badge bg-primary fw-bold"><?= format_rupiah($transaksi['total_bayar']) ?></span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="d-flex justify-content-between">
                                <button class="btn btn-outline-secondary" onclick="window.history.back()">
                                    <i class="fas fa-arrow-left"></i>
                                    Kembali
                                </button>
                                <?php if ($transaksi['status'] === 'Menunggu Konfirmasi') { ?>
                                <button type="button" class="btn btn-primary"
                                    onclick="dialogKonfirmasiPesanan()">Konfirmasi Pesanan</button>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header justify-content-between">
                            <h4>Bukti Pembayaran</h4>
                            <?php if ($transaksi['status'] === 'Belum Bayar') { ?>
                            <span class="badge badge-danger"><?= $transaksi['status'] ?></span>
                            <?php } elseif ($transaksi['status'] === 'Menunggu Konfirmasi') { ?>
                            <span class="badge badge-primary"><?= $transaksi['status'] ?></span>
                            <?php } else { ?>
                            <span class="badge badge-success"><?= $transaksi['status'] ?></span>
                            <?php } ?>
                        </div>
                        <div class="card-body">
                            <div class="my-3">
                                <h5 class="card-title">Bukti Pembayaran</h5>
                                <?php if ($transaksi['status'] === 'Belum Bayar') { ?>
                                <p class="card-text">Bukti pembayaran belum diupload
                                </p>
                                <?php } else { ?>
                                <p class="card-text">Klik untuk menampilkan bukti pembayaran
                                </p>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#buktiPembayaran">
                                    Lihat bukti pembayaran
                                </button>
                                <?php } ?>
                            </div>
                            <div class="my-5">
                                <h5 class="card-title">Foto KTP</h5>
                                <?php if ($transaksi['status'] === 'Belum Bayar') { ?>
                                <p class="card-text">Foto KTP belum diupload
                                </p>
                                <?php } else { ?>
                                <p class="card-text">Klik untuk menampilkan foto KTP
                                </p>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#fotoKTP">
                                    Lihat foto KTP
                                </button>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?= $this->section('javascript') ?>
<script>
function dialogKonfirmasiPesanan() {
    Swal.fire({
        title: 'Konfirmasi',
        text: "Apakah Anda yakin ingin mengonfirmasi pesanan ini?",
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, konfirmasi',
        cancelButtonText: 'Tidak, kembali'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = "/admin/transaksi/konfirmasi/<?= $transaksi['id_transaksi'] ?>"
        }
    })
}
</script>
<?= $this->endSection() ?>
<?= $this->endSection() ?>