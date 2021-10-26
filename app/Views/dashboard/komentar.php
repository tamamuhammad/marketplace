<?= $this->extend('layout/dashboard') ?>

<?= $this->section('content') ?>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Komentar Produk: <?= $produk['nama'] ?></h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">Produk</li>
                    <li class="breadcrumb-item active">Komentar</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<div class="container">
    <div class="row px-2">
        <div class="col-lg-7">
            <?php if (session()->getFlashdata('true')) : ?>
                <div class="alert alert-success">
                    <?= session()->getFlashdata('true') ?>
                </div>
            <?php endif; ?>
            <div class="card shadow">
                <div class="card-body p-0">
                    <table class="table table-striped table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Nama</th>
                                <th>Komentar</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!$comments) : ?>
                                <tr>
                                    <td colspan="4">
                                        Belum ada komentar pada produk ini.
                                    </td>
                                </tr>
                            <?php endif;
                            $i = 1;
                            foreach ($comments as $k) : ?>
                                <tr>
                                    <td><?= $i++ ?></td>
                                    <td><?= $k['username'] ?></td>
                                    <td>
                                        <?php if ($k['foto']) : ?>
                                            <img src="/img/komentar/<?= $k['foto'] ?>" alt="" class="img-fluid" style="border-radius: 5px; height: 100px; max-width: 100px; width: 100px; object-fit:cover">
                                            <br>
                                        <?php endif; ?>
                                        <?= $k['komentar'] ?>
                                    </td>
                                    <td>
                                        <form action="/produk/c/<?= $k['id'] ?>" method="post" class="d-inline">
                                            <?= csrf_field() ?>
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button type="submit" class="btn btn-danger" onclick="confirm('Yakin?')"><i class="nav-icon fad fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    <?= $pager->links('comment', 'pagination') ?>
                </div>
            </div>
        </div>
        <div class="col-lg-5">
            <div class="card shadow">
                <div class="card-header">
                    <h3 class="card-title">Berkomentar sebagai admin</h3>
                </div>
                <form method="post" action="/produk/comment/<?= $produk['id'] ?>" enctype="multipart/form-data">
                    <?= csrf_field() ?>
                    <div class="card-body">
                        <div class="card-group">
                            <div class="input-group">
                                <input type="text" name="komentar" id="komentar" value="<?= old('komentar') ?>" class="form-control w-75" required placeholder="Ketikkan komentar baru">
                                <div class="input-group-prepend custom-file">
                                    <input type="file" name="foto" id="foto" class="btn btn-outline-warning p-0 custom-file-input">
                                    <label class="custom-file-label" for="foto"></label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary float-right mt-2"><i class="nav-icon fad fa-comment mr-2"></i>Komen</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<!-- <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addNewModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addNewModal">Ubah Kategori</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/kategori/update/" method="post">
                    <?= csrf_field() ?>
                    <div class="form-group">
                        <input type="text" class="form-control formkategori" name="kategori" id="kategori" value="">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-info">Ubah Kategori</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div> -->
<?= $this->endSection() ?>