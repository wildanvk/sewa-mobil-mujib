<?= $this->extend('_layout/template') ?>
<?= $this->section('content') ?>
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Tambah Data Warna</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><span>Master</span></div>
                <div class="breadcrumb-item"><a href="/admin/master/warna">Warna</a></div>
                <div class="breadcrumb-item"><a href="/admin/master/warna/tambah">Tambah</a></div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Form Tambah Data Warna</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <form action="/admin/master/warna/insert" method="post">
                                        <?php $errors = validation_errors() ?>
                                        <?= csrf_field() ?>
                                        <div class="form-group">
                                            <label>Nama Warna</label>
                                            <input type="text"
                                                class="form-control <?= isset($errors['warna']) ? 'is-invalid' : '' ?>"
                                                placeholder="Masukkan Nama Warna" name="warna" id="warna"
                                                value="<?= old('warna') ?>">
                                            <div class="invalid-feedback">
                                                <?= validation_show_error('warna') ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Status</label>
                                            <select
                                                class="form-control <?= isset($errors['status']) ? 'is-invalid' : '' ?>"
                                                name="status" id="status">
                                                <option value="">Pilih status</option>
                                                <option value="Aktif" <?= old('status') == 'Aktif' ? 'selected' : '' ?>>
                                                    Aktif</option>
                                                <option value="Tidak Aktif"
                                                    <?= old('status') == 'Tidak Aktif' ? 'selected' : '' ?>>Tidak Aktif
                                                </option>
                                            </select>
                                            <div class="invalid-feedback">
                                                <?= validation_show_error('status') ?>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <a href="/admin/master/warna"
                                                class="btn btn-icon icon-left btn-outline-secondary">
                                                <i class="fas fa-arrow-left"></i>
                                                Kembali
                                            </a>
                                            <button type="submit" class="btn btn-icon icon-left btn-primary">
                                                <i class="fas fa-plus"></i>
                                                Tambah Data
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