<?= $this->extend('layout/dashboard') ?>

<?= $this->section('content') ?>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Tambah Produk</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">Produk</li>
                    <li class="breadcrumb-item active">Tambah Produk</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<div class="container-fluid">
    <form method="POST" action="/produk/save" enctype="multipart/form-data">
        <?= csrf_field() ?>
        <div class="row px-2">
            <div class="col-lg-6">
                <div class="card shadow">
                    <div class="card-header">
                        <h3 class="card-title">Produk</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-md-3 mt-2 font-weight-bold" for="nama">Nama</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : '' ?>" placeholder="Nama Produk" name="nama" id="nama" value="<?= old('nama') ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('nama') ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 font-weight-bold mt-2" for="kategori">Kategori</label>
                            <div class="col-md-9">
                                <select class="select2 form-control custom-select" style="width: 100%; height:36px;" name="kategori" id="kategori">
                                    <?php foreach ($kategori as $k) : ?>
                                        <option value="<?= $k['id'] ?>"><?= $k['kategori'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 font-weight-bold mt-2" for="deskripsi">Deskripsi</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" rows="3" name="deskripsi" id="deskripsi" value="<?= old('deskripsi') ?>"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 font-weight-bold mt-2" for="stok">Stok</label>
                            <div class="col-md-9">
                                <input type="number" class="form-control <?= ($validation->hasError('stok')) ? 'is-invalid' : '' ?>" placeholder="Stok Produk" name="stok" id="stok" value="<?= old('stok') ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('stok') ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 font-weight-bold mt-2" for="harga">Harga</label>
                            <div class="col-md-9">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Rp.</span>
                                    </div>
                                    <input type="text" class="form-control <?= ($validation->hasError('harga')) ? 'is-invalid' : '' ?>" placeholder="Harga Produk" name="harga" id="harga" value="<?= old('harga') ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('harga') ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 font-weight-bold mt-2" for="promosi">Diskon</label>
                            <div class="col-md-9">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Diskon Promosi" name="promosi" id="promosi" value="<?= old('promosi') ?>">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">%</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 font-weight-bold mt-2" for="penawaran">Promosi</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control <?= ($validation->hasError('penawaran')) ? 'is-invalid' : '' ?>" placeholder="Promosi Produk" name="penawaran" id="penawaran" value="<?= old('penawaran') ?>">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card shadow">
                    <div class="card-header">
                        <h3 class="card-title">Foto Produk</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group row" style="align-items: baseline">
                            <div class="col-md-3">
                                <img src="/img/default.jpg" class="img-preview img-thumbnail">
                            </div>
                            <div class="col-md-9">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input <?= ($validation->hasError('foto')) ? 'is-invalid' : '' ?>" id="foto" name="foto" onchange="previewImg()">
                                    <label class="custom-file-label" for="foto">Choose file...</label>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('foto') ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="border-top">
                        <div class="card-body">
                            <input type="submit" value="Simpan" name="submit" class="btn btn-primary px-3">
                            <a class="btn btn-secondary px-3" href="<?= base_url('produk') ?>">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<?= $this->endSection() ?>