    <?= $this->extend('_layout/front/template') ?>
    <?= $this->section('content') ?>
    <!-- Section-->
    <section class="py-5 flex-grow-1">
        <div class="container px-4 px-lg-5 my-5">
            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header text-bg-dark">
                            <h4 class="m-0">Invoice Pembayaran</h4>
                        </div>
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-center py-3">
                                <img src="<?= base_url('uploads/mobil/') . $transaksi['gambar_mobil'] ?>" width="200px" class="rounded-start" alt="Gambar mobil">
                            </div>
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>Nama Mobil</th>
                                        <td>:</td>
                                        <td><?= $transaksi['nama_mobil'] ?></td>
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
                                        <td><?= format_rupiah($transaksi['total_bayar']) ?></td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="my-2">
                                <small class="text-body-secondary fst-italic text-danger fw-normal">*Harap
                                    kembalikan
                                    tepat waktu,
                                    jika tidak
                                    maka akan
                                    terkena denda!</small>
                            </div>
                            <div class="d-grid gap-2">
                                <a class="btn btn-secondary disabled" role="button" aria-disabled="true">Print
                                    Invoice</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header text-bg-primary">
                            <h4 class="m-0">Informasi Pembayaran</h4>
                        </div>
                        <div class="card-body">
                            <p class="card-text">Silahkan melakukan pembayaran melalui rekening di bawah ini.
                            </p>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Nama Bank</th>
                                        <th>No. Rekening</th>
                                        <th>Atas Nama</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($rekening as $key => $row) { ?>
                                        <tr>
                                            <th><?= $row['nama_bank'] ?></th>
                                            <td><span class="fst-italic"><?= $row['no_rekening'] ?></span></td>
                                            <td><?= $row['atas_nama'] ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                            <div class="d-grid">
                                <?php if ($transaksi['status'] == 'Belum Bayar') { ?>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#inputBuktiPembayaran">
                                        Upload Bukti Pembayaran
                                    </button>
                                <?php } elseif ($transaksi['status'] == 'Menunggu Konfirmasi') { ?>
                                    <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#inputBuktiPembayaran" disabled>
                                        Menunggu Konfirmasi
                                    </button>
                                <?php } else { ?>
                                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#inputBuktiPembayaran" disabled>
                                        Pembayaran Terkonfirmasi
                                    </button>
                                <?php } ?>
                            </div>

                            <!-- Modal -->
                            <div class="modal fade" id="inputBuktiPembayaran" tabindex="-1" aria-labelledby="inputBuktiPembayaran" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <form action="/rent/pembayaran" method="post" enctype="multipart/form-data">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="inputBuktiPembayaran">Upload Bukti
                                                    Pembayaran</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <input type="hidden" name="id_transaksi" value="<?= $transaksi['id_transaksi'] ?>">
                                                <div class="mb-3">
                                                    <label for="bukti_pembayaran" class="form-label">Upload
                                                        Bukti</label>
                                                    <input class="form-control" type="file" id="bukti_pembayaran" name="bukti_pembayaran">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="foto_ktp" class="form-label">Upload foto KTP</label>
                                                    <input class="form-control" type="file" id="foto_ktp" name="foto_ktp">
                                                </div>
                                                <div>
                                                    <small class="text-danger fst-italic">File yang diupload harus dalam
                                                        format JPG/JPEG/PNG dan tidak lebih dari 2MB!</small>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary">Upload</button>
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?= $this->section('javascript') ?>
    <script>
    </script>
    <?= $this->endSection() ?>

    <?= $this->endSection() ?>