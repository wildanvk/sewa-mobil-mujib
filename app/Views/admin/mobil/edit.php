<?= $this->extend('_layout/template') ?>
<?= $this->section('content') ?>
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Edit Data Mobil</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><span>Master</span></div>
                <div class="breadcrumb-item"><a href="/admin/master/mobil">Mobil</a></div>
                <div class="breadcrumb-item"><a href="/admin/master/mobil/edit">Edit</a></div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Form Edit Data Mobil</h4>
                        </div>
                        <form action="/admin/master/mobil/update" method="post" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6 col-sm-12">
                                        <?php $errors = validation_errors() ?>
                                        <?= csrf_field() ?>
                                        <input type="hidden" name="id_mobil" id="id_mobil" value="<?= $mobil['id_mobil'] ?>">
                                        <input type="hidden" name="gambar_mobil_lama" id="gambar_mobil_lama" value="<?= $mobil['gambar_mobil'] ?>">

                                        <!-- Merek Mobil -->

                                        <div class="form-group">
                                            <label>Merek Mobil</label>
                                            <select class="form-control <?= isset($errors['id_merek']) ? 'is-invalid' : '' ?>" name="id_merek" id="id_merek">
                                                <option value="">Pilih Merek Mobil</option>
                                                <?php foreach ($merek as $key => $row) : ?>
                                                    <option value="<?= $row['id_merek'] ?>" <?= $mobil['id_merek'] == $row['id_merek'] ? 'selected' : '' ?>>
                                                        <?= $row['nama_merek'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <div class="invalid-feedback">
                                                <?= validation_show_error('id_merek') ?>
                                            </div>
                                        </div>

                                        <!-- Nama Mobil -->

                                        <div class="form-group">
                                            <label>Nama Mobil</label>
                                            <input type="text" class="form-control <?= isset($errors['nama_mobil']) ? 'is-invalid' : '' ?>" placeholder="Masukkan Nama Mobil" name="nama_mobil" id="nama_mobil" value="<?= old('nama_mobil') ? old('nama_mobil') : $mobil['nama_mobil'] ?>">
                                            <div class="invalid-feedback">
                                                <?= validation_show_error('nama_mobil') ?>
                                            </div>
                                        </div>

                                        <!-- Warna Mobil -->

                                        <div class="form-group">
                                            <label>Warna Mobil</label>
                                            <select class="form-control <?= isset($errors['id_warna']) ? 'is-invalid' : '' ?>" name="id_warna" id="id_warna">
                                                <option value="">Pilih Warna Mobil</option>
                                                <?php foreach ($warna as $key => $row) : ?>
                                                    <option value="<?= $row['id_warna'] ?>" <?= $mobil['id_warna'] == $row['id_warna'] ? 'selected' : '' ?>>
                                                        <?= $row['warna'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <div class="invalid-feedback">
                                                <?= validation_show_error('id_warna') ?>
                                            </div>
                                        </div>

                                        <!-- Plat Nomor -->

                                        <div class="form-group">
                                            <label>Plat Nomor</label>
                                            <input type="text" class="form-control <?= isset($errors['plat_nomor']) ? 'is-invalid' : '' ?>" placeholder="Masukkan Plat Nomor" name="plat_nomor" id="plat_nomor" value="<?= old('plat_nomor') ? old('plat_nomor') : $mobil['plat_nomor'] ?>">
                                            <div class="invalid-feedback">
                                                <?= validation_show_error('plat_nomor') ?>
                                            </div>
                                        </div>

                                        <!-- Tahun -->

                                        <div class="form-group">
                                            <label>Tahun</label>
                                            <input type="number" class="form-control <?= isset($errors['tahun']) ? 'is-invalid' : '' ?>" placeholder="Masukkan Tahun" name="tahun" id="tahun" value="<?= old('tahun') ? old('tahun') : $mobil['tahun'] ?>">
                                            <div class="invalid-feedback">
                                                <?= validation_show_error('tahun') ?>
                                            </div>
                                        </div>

                                        <!-- Harga Sewa -->

                                        <div class="form-group">
                                            <label>Harga Sewa</label>
                                            <input type="number" class="form-control <?= isset($errors['harga_sewa']) ? 'is-invalid' : '' ?>" placeholder="Masukkan Harga Sewa" name="harga_sewa" id="harga_sewa" value="<?= old('harga_sewa') ? old('harga_sewa') : $mobil['harga_sewa'] ?>">
                                            <div class="invalid-feedback">
                                                <?= validation_show_error('harga_sewa') ?>
                                            </div>
                                        </div>



                                    </div>
                                    <div class="col-lg-6 col-sm-12">
                                        <!-- Denda -->

                                        <div class="form-group">
                                            <label>Denda</label>
                                            <input type="number" class="form-control <?= isset($errors['denda']) ? 'is-invalid' : '' ?>" placeholder="Masukkan Denda" name="denda" id="denda" value="<?= old('denda') ? old('denda') : $mobil['denda'] ?>">
                                            <div class="invalid-feedback">
                                                <?= validation_show_error('denda') ?>
                                            </div>
                                        </div>

                                        <!-- Tersedia -->

                                        <div class="form-group">
                                            <label>Tersedia</label>
                                            <select class="form-control <?= isset($errors['tersedia']) ? 'is-invalid' : '' ?>" name="tersedia" id="tersedia">
                                                <option value="">Apakah tersedia</option>
                                                <option value="Tersedia" <?= $mobil['tersedia'] == 'Tersedia' ? 'selected' : '' ?>>
                                                    Tersedia</option>
                                                <option value="Tidak Tersedia" <?= $mobil['tersedia'] == 'Tidak Tersedia' ? 'selected' : '' ?>>
                                                    Tidak
                                                    Tersedia
                                                </option>
                                            </select>
                                            <div class="invalid-feedback">
                                                <?= validation_show_error('tersedia') ?>
                                            </div>
                                        </div>

                                        <!-- Fitur AC -->

                                        <div class="form-group">
                                            <label>Fitur AC</label>
                                            <select class="form-control <?= isset($errors['fitur_ac']) ? 'is-invalid' : '' ?>" name="fitur_ac" id="fitur_ac">
                                                <option value="">Apakah memiliki fitur AC</option>
                                                <option value="Ada" <?= $mobil['fitur_ac'] == 'Ada' ? 'selected' : '' ?>>
                                                    Ada</option>
                                                <option value="Tidak Ada" <?= $mobil['fitur_ac'] == 'Tidak Ada' ? 'selected' : '' ?>>Tidak Ada
                                                </option>
                                            </select>
                                            <div class="invalid-feedback">
                                                <?= validation_show_error('fitur_ac') ?>
                                            </div>
                                        </div>

                                        <!-- Fitur TV -->

                                        <div class="form-group">
                                            <label>Fitur TV</label>
                                            <select class="form-control <?= isset($errors['fitur_tv']) ? 'is-invalid' : '' ?>" name="fitur_tv" id="fitur_tv">
                                                <option value="">Apakah memiliki fitur TV</option>
                                                <option value="Ada" <?= $mobil['fitur_tv'] == 'Ada' ? 'selected' : '' ?>>
                                                    Ada</option>
                                                <option value="Tidak Ada" <?= $mobil['fitur_tv'] == 'Tidak Ada' ? 'selected' : '' ?>>Tidak
                                                    Ada
                                                </option>
                                            </select>
                                            <div class="invalid-feedback">
                                                <?= validation_show_error('fitur_tv') ?>
                                            </div>
                                        </div>

                                        <!-- Status -->

                                        <div class="form-group">
                                            <label>Status</label>
                                            <select class="form-control <?= isset($errors['status']) ? 'is-invalid' : '' ?>" name="status" id="status">
                                                <option value="">Pilih status</option>
                                                <option value="Aktif" <?= $mobil['status'] == 'Aktif' ? 'selected' : '' ?>>
                                                    Aktif</option>
                                                <option value="Tidak Aktif" <?= $mobil['status'] == 'Tidak Aktif' ? 'selected' : '' ?>>Tidak
                                                    Aktif
                                                </option>
                                            </select>
                                            <div class="invalid-feedback">
                                                <?= validation_show_error('status') ?>
                                            </div>
                                        </div>

                                        <!-- Gambar Mobil -->

                                        <div class="form-group">
                                            <label>Gambar Mobil</label>
                                            <div class="custom-file">
                                                <input type="file" class="form-control <?= isset($errors['gambar_mobil']) ? 'is-invalid' : '' ?>" name="gambar_mobil" id="gambar_mobil" onchange="previewFoto()">
                                                <div class="invalid-feedback">
                                                    <?= validation_show_error('gambar_mobil') ?>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="row justify-content-center p-3">
                                    <div class="col-4">
                                        <img src="<?= base_url('uploads/mobil/') . $mobil['gambar_mobil'] ?>" class="img-fluid rounded" alt="" id="gambar_preview">
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer d-flex justify-content-between">
                                <a href="/admin/master/mobil" class="btn btn-icon icon-left btn-outline-secondary">
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
    </section>
</div>
<?= $this->endSection() ?>