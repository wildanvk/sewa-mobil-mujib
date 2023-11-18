<?= $this->extend('_layout/template') ?>
<?= $this->section('content') ?>
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data Merek Mobil</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><span>Master</span></div>
                <div class="breadcrumb-item"><a href="/admin/master/merek">Merek</a></div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Data Merek Mobil</h4>
                            <div class="card-header-action">
                                <a href="/admin/master/merek/tambah" class="btn btn-icon icon-left btn-primary">
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
                                            <th>ID Merek</th>
                                            <th>Nama Merek</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($merek as $key => $row) : ?>
                                            <tr>
                                                <td class="text-center align-middle"><?= $key + 1 ?></td>
                                                <td class="align-middle"><?= $row['id_merek'] ?></td>
                                                <td class="align-middle"><?= $row['nama_merek'] ?></td>
                                                <td class="align-middle">
                                                    <div class="badge <?= $row['status'] === 'Aktif' ? 'badge-success' : 'badge-danger' ?>">
                                                        <?= $row['status'] ?></div>
                                                </td>
                                                <td class="align-middle">
                                                    <a href="/admin/master/merek/edit/<?= $row['id_merek'] ?>" class="btn btn-sm btn-icon icon-left btn-info">
                                                        <i class="fas fa-edit"></i>
                                                        Edit
                                                    </a>
                                                    <a href="/admin/master/merek/hapus/<?= $row['id_merek'] ?>" class="btn btn-sm btn-icon icon-left btn-warning" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">
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