<?= $this->extend('_layout/template') ?>
<?= $this->section('content') ?>
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Edit Data Merek</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><span>Master</span></div>
                <div class="breadcrumb-item"><a href="/admin/master/merek">Merek</a></div>
                <div class="breadcrumb-item"><a href="/admin/master/merek/edit">Edit</a></div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Form Edit Data Merek</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <form action="/admin/master/merek/update" method="post">
                                        <?php $errors = validation_errors() ?>
                                        <?= csrf_field() ?>
                                        <input type="hidden" name="id_merek" id="id_merek" value="<?= $merek['id_merek'] ?>">
                                        <div class="form-group">
                                            <label>Merek Mobil</label>
                                            <input type="text" class="form-control <?= isset($errors['nama_merek']) ? 'is-invalid' : '' ?>" placeholder="Masukkan Merek Mobil" name="nama_merek" id="nama_merek" value="<?= old('nama_merek') ? old('nama_merek') : $merek['nama_merek']  ?>">
                                            <div class="invalid-feedback">
                                                <?= validation_show_error('nama_merek') ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Status</label>
                                            <select class="form-control <?= isset($errors['status']) ? 'is-invalid' : '' ?>" name="status" id="status">
                                                <option value="">Pilih status</option>
                                                <option value="Aktif" <?= $merek['status'] == 'Aktif' ? 'selected' : '' ?>>
                                                    Aktif</option>
                                                <option value="Tidak Aktif" <?= $merek['status'] == 'Tidak Aktif' ? 'selected' : '' ?>>Tidak
                                                    Aktif
                                                </option>
                                            </select>
                                            <div class="invalid-feedback">
                                                <?= validation_show_error('status') ?>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <a href="/admin/master/merek" class="btn btn-icon icon-left btn-outline-secondary">
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