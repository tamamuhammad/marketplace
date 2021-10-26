<?= $this->extend('layout/dashboard') ?>

<?= $this->section('content') ?>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Edit Produk</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">Produk</li>
                    <li class="breadcrumb-item active">Edit Produk</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<div class="container-fluid">
    <div class="row px-2">
        <div class="col-lg-6">
            <form method="POST" action="/produk/update/<?= $produk['id'] ?>" enctype="multipart/form-data">
                <?= csrf_field() ?>
                <div class="card shadow">
                    <div class="card-header">
                        <h3 class="card-title">Produk</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-md-3 mt-2 font-weight-bold" for="nama">Nama</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : '' ?>" placeholder="Nama Produk" name="nama" id="nama" value="<?= (old('nama')) ? old('nama') : $produk['nama'] ?>">
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
                                        <option value="<?= $k['id'] ?>" <?= ($k['id'] == $produk['kategori']) ? 'selected' : '' ?>><?= $k['kategori'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 font-weight-bold mt-2" for="deskripsi">Deskripsi</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" rows="3" name="deskripsi" id="deskripsi"><?= (old('deskripsi')) ?  old('deskripsi') : $produk['deskripsi'] ?></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 font-weight-bold mt-2" for="stok">Stok</label>
                            <div class="col-md-9">
                                <input type="number" class="form-control <?= ($validation->hasError('stok')) ? 'is-invalid' : '' ?>" placeholder="Stok Produk" name="stok" id="stok" value="<?= (old('stok')) ? old('stok') : $produk['stok'] ?>">
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
                                    <input type="text" class="form-control <?= ($validation->hasError('harga')) ? 'is-invalid' : '' ?>" placeholder="Harga Produk" name="harga" id="harga" value="<?= (old('harga')) ? old('harga') : $produk['harga'] ?>">
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
                                    <input type="text" class="form-control" placeholder="Diskon Promosi" name="promosi" id="promosi" value="<?= (old('promosi')) ? old('promosi') : $produk['promosi'] ?>">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">%</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 font-weight-bold mt-2" for="penawaran">Promosi</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control <?= ($validation->hasError('penawaran')) ? 'is-invalid' : '' ?>" placeholder="Promosi Produk" name="penawaran" id="penawaran" value="<?= (old('penawaran')) ? old('penawaran') : $produk['penawaran'] ?>">
                            </div>
                        </div>
                    </div>
                    <div class="card-footer float-right">
                        <input type="submit" value="Simpan" name="submit" class="btn btn-primary px-3">
                        <a class="btn btn-secondary px-3" href="/produk/<?= $produk['id'] ?>">Kembali</a>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-lg-6">
            <div class="card shadow">
                <div class="card-header">
                    <h3 class="card-title">Foto Produk</h3>
                </div>
                <div class="card-body">
                    <div class="card-group">
                        <div class="row w-100">
                            <?php foreach ($foto as $f) : ?>
                                <div class="col-3">
                                    <img src="/img/<?= $f['foto'] ?>" class="img-fluid" style="border-radius: 5px; height: 100px; max-width: 100px; width: 100px; object-fit:cover">
                                    <form action="/produk/foto/<?= $f['id'] ?>" method="post" style="margin-top: -30px">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button style="color:white; border: none; background-color: rgba(0,0,0,0)" type="submit" onclick="confirm('Yakin?')"><i class="fas fa-trash-alt"></i></button>
                                    </form>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <form method="post" action="/produk/foto" enctype="multipart/form-data" class="d-flex">
                        <?= csrf_field() ?>
                        <input type="hidden" name="id" value="<?= $produk['id'] ?>">
                        <div class="custom-file mr-2">
                            <input type="file" class="custom-file-input <?= ($validation->hasError('foto')) ? 'is-invalid' : '' ?>" id="foto" name="foto" required onchange="previewImg()">
                            <label class="custom-file-label" for="foto">Choose file...</label>
                            <div class="invalid-feedback">
                                <?= $validation->getError('foto') ?>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>