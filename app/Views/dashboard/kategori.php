<?= $this->extend('layout/dashboard') ?>

<?= $this->section('content') ?>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">List Kategori</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item active">Kategori</li>
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
                                <th>Nama Kategori</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!$kategori) : ?>
                                <tr>
                                    <td colspan="3">Belum ada kategori yang disematkan.</td>
                                </tr>
                            <?php endif; ?>
                            <?php $i = 1 ?>
                            <?php foreach ($kategori as $k) : ?>
                                <tr>
                                    <td><?= $i++ ?></td>
                                    <td><?= $k['kategori'] ?></td>
                                    <td>
                                        <a href="/kategori/<?= $k['id'] ?>" class="btn btn-success editKategori" data-toggle="modal" data-target="#addModal" data-id="<?= $k['id'] ?>" data-value="<?= $k['kategori'] ?>"><i class="nav-icon fad fa-pencil"></i></a>
                                        <form action="/kategori/<?= $k['id'] ?>" method="post" class="d-inline">
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
            </div>
        </div>
        <div class="col-lg-5">
            <div class="card shadow">
                <div class="card-header">
                    <h3 class="card-title">Tambah Kategori</h3>
                </div>
                <form method="post" action="/kategori/save">
                    <?= csrf_field() ?>
                    <div class="card-body">
                        <div class="card-group">
                            <input type="text" name="kategori" id="kategori" value="<?= old('kategori') ?>" class="form-control" required placeholder="Ketikkan nama kategori baru">
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary float-right mt-2"><i class="nav-icon fad fa-tag mr-2"></i>Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addNewModal" aria-hidden="true">
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
                        <input type="text" class="form-control formkategori" name="kategori" id="kategori" value="" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-info">Ubah Kategori</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>