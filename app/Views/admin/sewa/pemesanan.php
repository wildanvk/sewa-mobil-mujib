<?= $this->extend('_layout/template') ?>
<?= $this->section('content') ?>
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data Pemesanan</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item"><a href="/admin/pemesanan">Pemesanan</a></div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Data Pemesanan</h4>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped table-responsive" id="table-1">
                                <thead>
                                    <tr>
                                        <th class="text-center">
                                            No
                                        </th>
                                        <th class="text-center align-middle">ID Transaksi</th>
                                        <th class="text-center align-middle">Nama Pelanggan</th>
                                        <th class="text-center align-middle">Nama Mobil</th>
                                        <th class="text-center align-middle">Tanggal Sewa</th>
                                        <th class="text-center align-middle">Tanggal Kembali</th>
                                        <th class="text-center align-middle">Tanggal Pengembalian</th>
                                        <th class="text-center align-middle">Harga Sewa</th>
                                        <th class="text-center align-middle">Harga Denda</th>
                                        <th class="text-center align-middle">Total Denda</th>
                                        <th class="text-center align-middle">Total Bayar</th>
                                        <th class="text-center align-middle">Status Pembayaran</th>
                                        <th class="text-center align-middle">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($pemesanan as $key => $row) : ?>
                                    <tr>
                                        <td class="text-center align-middle"><?= $key + 1 ?></td>
                                        <td class="text-center align-middle"><?= $row['id_transaksi'] ?></td>
                                        <td class="text-center align-middle"><?= $row['nama'] ?></td>
                                        <td class="text-center align-middle"><?= $row['nama_mobil'] ?></td>
                                        <td class="text-center align-middle"><?= $row['tanggal_sewa'] ?></td>
                                        <td class="text-center align-middle"><?= $row['tanggal_kembali'] ?></td>
                                        <td class="text-center align-middle">
                                            <?= empty($row['tanggal_pengembalian']) ? '-' : $row['tanggal_pengembalian'] ?>
                                        </td>
                                        <td class="text-center align-middle">
                                            <?= format_rupiah($row['harga_sewa']) ?> / hari
                                        </td>
                                        <td class="text-center align-middle"><?= format_rupiah($row['denda']) ?> /
                                            hari
                                        </td>
                                        <td class="text-center align-middle">
                                            <?= empty($row['total_denda']) ? '-' : format_rupiah($row['total_denda'])  ?>
                                        </td>
                                        <td class="text-center align-middle">
                                            <?= format_rupiah($row['total_bayar'])  ?>
                                        </td>
                                        <td class="text-center align-middle">
                                            <?php if ($row['status'] === 'Belum Bayar') { ?>
                                            <span class="badge badge-danger"><?= $row['status'] ?></span>
                                            <?php } elseif ($row['status'] === 'Menunggu Konfirmasi') { ?>
                                            <span class="badge badge-primary"><?= $row['status'] ?></span>
                                            <?php } else { ?>
                                            <span class="badge badge-success"><?= $row['status'] ?></span>
                                            <?php } ?>
                                        </td>
                                        <td class="align-middle">
                                            <?php if ($row['status'] === 'Belum Bayar') { ?>
                                            <button type="button"
                                                class="btn btn-sm btn-icon icon-left btn-danger my-1 cancel-button"
                                                data-id="<?= $row['id_transaksi'] ?>">
                                                <i class="fas fa-window-close"></i>
                                                Batal
                                            </button>
                                            <?php } elseif ($row['status'] === 'Menunggu Konfirmasi') { ?>
                                            <a href="/admin/transaksi/detail/<?= $row['id_transaksi'] ?>"
                                                class="btn btn-sm btn-icon icon-left btn-success my-1">
                                                <i class="fas fa-clipboard-list"></i>
                                                Cek
                                            </a>
                                            <?php } else { ?>
                                            <button type="button"
                                                class="btn btn-sm btn-icon icon-left btn-primary my-1 complete-button"
                                                data-id="<?= $row['id_transaksi'] ?>">
                                                <i class="fas fa-check-circle"></i>
                                                Selesai
                                            </button>
                                            <?php  } ?>
                                            <a href="/admin/transaksi/detail/<?= $row['id_transaksi'] ?>"
                                                class="btn btn-sm btn-icon icon-left btn-info my-1">
                                                <i class="fas fa-info-circle"></i>
                                                Detail
                                            </a>
                                        </td>
                                    </tr>
                                    <?php endforeach ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?= $this->section('javascript') ?>
<script>
$(document).ready(function() {
    $('.cancel-button').on('click', function() {
        dialogBatalPesanan($(this).data('id'));
    });

    $('.complete-button').on('click', function() {
        dialogSelesaiPesanan($(this).data('id'));
    });

    function dialogSelesaiPesanan(id) {
        Swal.fire({
            title: 'Konfirmasi',
            text: "Apakah Anda yakin untuk menyelesaikan transaksi ini?",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, lanjutkan',
            cancelButtonText: 'Tidak, kembali',
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "/admin/transaksi/selesai/" + id
            }
        })
    }

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
                window.location.href = "/admin/transaksi/batal/" + id
            }
        })
    }
});
</script>
<?= $this->endSection() ?>
<?= $this->endSection() ?>