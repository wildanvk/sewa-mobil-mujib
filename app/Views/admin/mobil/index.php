<?= $this->extend('_layout/template') ?>
<?= $this->section('content') ?>
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data Mobil</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><span>Master</span></div>
                <div class="breadcrumb-item"><a href="/admin/master/mobil">Mobil</a></div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Data Mobil</h4>
                            <div class="card-header-action">
                                <a href="/admin/master/mobil/tambah" class="btn btn-icon icon-left btn-primary">
                                    <i class="fas fa-plus"></i>
                                    Tambah Data
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-1">
                                    <thead>
                                        <tr>
                                            <th class="text-center">
                                                No
                                            </th>
                                            <th class="text-center align-middle">ID Mobil</th>
                                            <th class="text-center align-middle">Gambar Mobil</th>
                                            <th class="text-center align-middle">Merek Mobil</th>
                                            <th class="text-center align-middle">Nama Mobil</th>
                                            <th class="text-center align-middle">Warna Mobil</th>
                                            <th class="text-center align-middle">Plat Nomor</th>
                                            <th class="text-center align-middle">Tahun</th>
                                            <th class="text-center align-middle">Harga Sewa</th>
                                            <th class="text-center align-middle">Denda</th>
                                            <th class="text-center align-middle">Status</th>
                                            <th class="text-center align-middle">Tersedia</th>
                                            <th class="text-center align-middle">AC</th>
                                            <th class="text-center align-middle">TV</th>
                                            <th class="text-center align-middle">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($mobil as $key => $row) : ?>
                                            <tr>
                                                <td class="text-center align-middle"><?= $key + 1 ?></td>
                                                <td class="text-center align-middle"><?= $row['id_mobil'] ?></td>
                                                <td class="text-center align-middle">
                                                    <img src="<?= base_url('uploads') ?>/mobil/<?= $row['gambar_mobil'] ?>" class="rounded" width="150" alt="">
                                                </td>
                                                <td class="text-center align-middle"><?= $row['nama_merek'] ?></td>
                                                <td class="text-center align-middle"><?= $row['nama_mobil'] ?></td>
                                                <td class="text-center align-middle"><?= $row['warna'] ?></td>
                                                <td class="text-center align-middle"><?= $row['plat_nomor'] ?></td>
                                                <td class="text-center align-middle"><?= $row['tahun'] ?></td>
                                                <td class="text-center align-middle">
                                                    <?= format_rupiah($row['harga_sewa']) ?></td>
                                                <td class="text-center align-middle"><?= format_rupiah($row['denda']) ?>
                                                </td>
                                                <td class="text-center align-middle">
                                                    <div class="badge <?= $row['status'] === 'Aktif' ? 'badge-success' : 'badge-danger' ?>">
                                                        <?= $row['status'] ?>
                                                    </div>
                                                </td>
                                                <td class="align-middle">
                                                    <div class="badge <?= $row['tersedia'] === 'Tersedia' ? 'badge-success' : 'badge-danger' ?>">
                                                        <?= $row['tersedia'] ?>
                                                    </div>
                                                </td>
                                                <td class="align-middle">
                                                    <div class="badge <?= $row['fitur_ac'] === 'Ada' ? 'badge-success' : 'badge-warning' ?>">
                                                        <?= $row['fitur_ac'] ?>
                                                    </div>
                                                </td>
                                                <td class="align-middle">
                                                    <div class="badge <?= $row['fitur_tv'] === 'Ada' ? 'badge-success' : 'badge-warning' ?>">
                                                        <?= $row['fitur_tv'] ?>
                                                    </div>
                                                </td>

                                                <td class="align-middle">
                                                    <a href="/admin/master/mobil/edit/<?= $row['id_mobil'] ?>" class="btn btn-sm btn-icon icon-left btn-info">
                                                        <i class="fas fa-edit"></i>
                                                        Edit
                                                    </a>
                                                    <a href="/admin/master/mobil/hapus/<?= $row['id_mobil'] ?>" class="btn btn-sm btn-icon icon-left btn-warning" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">
                                                        <i class="fas fa-trash"></i>
                                                        Hapus
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
        </div>
    </section>
</div>
<?= $this->endSection() ?>