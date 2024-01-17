<?= $this->extend('_layout/template') ?>
<?= $this->section('content') ?>
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data Transaksi</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item"><a href="/admin/transaksi">Transaksi</a></div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Data Transaksi</h4>
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
                                        <th class="text-center align-middle">Status</th>
                                        <th class="text-center align-middle">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($transaksi as $key => $row) : ?>
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
                                            <?php if ($row['status_transaksi'] === 'Selesai') { ?>
                                            <span class="badge badge-success"><?= $row['status_transaksi'] ?></span>
                                            <?php } elseif ($row['status_transaksi'] === 'Aktif') { ?>
                                            <span class="badge badge-primary"><?= $row['status_transaksi'] ?></span>
                                            <?php } else { ?>
                                            <span class="badge badge-danger"><?= $row['status_transaksi'] ?></span>
                                            <?php } ?>
                                        </td>
                                        <td class="align-middle">
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
<?= $this->endSection() ?>