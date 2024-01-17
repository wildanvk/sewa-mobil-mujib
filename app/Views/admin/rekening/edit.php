<?= $this->extend('_layout/template') ?>
<?= $this->section('content') ?>
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Edit Data Rekening</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><span>Master</span></div>
                <div class="breadcrumb-item"><a href="/admin/master/rekening">Rekening</a></div>
                <div class="breadcrumb-item"><a href="/admin/master/rekening/edit">Edit</a></div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Form Edit Data Rekening</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <form action="/admin/master/rekening/update" method="post">
                                        <?php $errors = validation_errors() ?>
                                        <?= csrf_field() ?>
                                        <input type="hidden" name="id_rekening" id="id_rekening"
                                            value="<?= $rekening['id_rekening'] ?>">
                                        <div class="form-group">
                                            <label>Nama Bank</label>
                                            <input type="text"
                                                class="form-control <?= isset($errors['nama_bank']) ? 'is-invalid' : '' ?>"
                                                placeholder="Masukkan Nama Bank" name="nama_bank" id="nama_bank"
                                                value="<?= old('nama_bank') ? old('nama_bank') : $rekening['nama_bank']  ?>">
                                            <div class="invalid-feedback">
                                                <?= validation_show_error('nama_bank') ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>No. Rekening</label>
                                            <input type="text"
                                                class="form-control <?= isset($errors['no_rekening']) ? 'is-invalid' : '' ?>"
                                                placeholder="Masukkan Nomor Rekening" name="no_rekening"
                                                id="no_rekening"
                                                value="<?= old('no_rekening') ? old('no_rekening') : $rekening['no_rekening']  ?>">
                                            <div class="invalid-feedback">
                                                <?= validation_show_error('no_rekening') ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Atas Nama</label>
                                            <input type="text"
                                                class="form-control <?= isset($errors['atas_nama']) ? 'is-invalid' : '' ?>"
                                                placeholder="Masukkan Atas Nama" name="atas_nama" id="atas_nama"
                                                value="<?= old('atas_nama') ? old('atas_nama') : $rekening['atas_nama']  ?>">
                                            <div class="invalid-feedback">
                                                <?= validation_show_error('atas_nama') ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Status</label>
                                            <select
                                                class="form-control <?= isset($errors['status']) ? 'is-invalid' : '' ?>"
                                                name="status" id="status">
                                                <option value="">Pilih status</option>
                                                <option value="Aktif"
                                                    <?= $rekening['status'] == 'Aktif' ? 'selected' : '' ?>>
                                                    Aktif</option>
                                                <option value="Tidak Aktif"
                                                    <?= $rekening['status'] == 'Tidak Aktif' ? 'selected' : '' ?>>Tidak
                                                    Aktif
                                                </option>
                                            </select>
                                            <div class="invalid-feedback">
                                                <?= validation_show_error('status') ?>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <a href="/admin/master/rekening"
                                                class="btn btn-icon icon-left btn-outline-secondary">
                                                <i class="fas fa-arrow-left"></i>
                                                Kembali
                                            </a>
                                            <button type="submit" class="btn btn-icon icon-left btn-info">
                                                <i class="fas fa-edit"></i>
                                                Edit Data
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?= $this->endSection() ?>