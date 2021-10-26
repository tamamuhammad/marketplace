<?= $this->extend('layout/dashboard') ?>

<?= $this->section('content') ?>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">List Produk</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item active">Produk</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<div class="container">
    <div class="row px-2">
        <div class="col-lg-10">
            <?php if (session()->getFlashdata('true')) : ?>
                <div class="alert alert-success">
                    <?= session()->getFlashdata('true') ?>
                </div>
            <?php endif; ?>
            <div class="row mx-1 mb-2" style="justify-content: space-between">
                <a href="/produk/create" class="btn btn-info my-1"><i class="nav-icon fad fa-cart-plus mr-2"></i>Tambah Produk</a>
                <form action="/produk/index" method="post" class="form-inline my-1">
                    <?= csrf_field() ?>
                    <div class=" form-group mr-auto w-100">
                        <div class="input-group w-100">
                            <input type="text" class="form-control" name="keyword" id="keyword" placeholder="Masukkan keyword pencarian" value="<?= old('keyword') ?>">
                            <div class="input-group-prepend">
                                <button type="submit" class="btn btn-outline-primary">Cari</button>
                            </div>
                            <form action="/produk" method="post">
                                <input type="hidden" name="die" value="true">
                                <button type="submit" class="btn btn-outline-secondary ml-2 <?= (!session()->has('keyword')) ? 'd-none' : '' ?>">Matikan Filter</button>
                            </form>
                        </div>
                    </div>
                </form>
            </div>
            <div class="card">
                <div class="card-body p-0">
                    <table class="table table-striped table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Nama Produk</th>
                                <th>Kategori</th>
                                <th>Harga Sekarang</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!$produk) : ?>
                                <tr>
                                    <td colspan="5">Belum ada produk yang dijual.</td>
                                </tr>
                            <?php endif; ?>
                            <?php $i = 1 + (($sorting - 1) * 1) ?>
                            <?php foreach ($produk as $p) : ?>
                                <tr>
                                    <td><?= $i++ ?></td>
                                    <td><?= $p['nama'] ?></td>
                                    <?php
                                    foreach ($kategori as $k) :
                                        if ($k['id'] == $p['kategori']) :
                                    ?>
                                            <td><?= $k['kategori'] ?></td>
                                        <?php
                                        endif;
                                    endforeach;
                                    if ($p['promosi']) :
                                        ?>
                                        <td>Rp. <?= $p['harga'] - ($p['harga'] * $p['promosi'] / 100) ?></td>
                                    <?php else : ?>
                                        <td>Rp. <?= $p['harga'] ?></td>
                                    <?php endif; ?>
                                    <td>
                                        <a href="/produk/<?= $p['id'] ?>" class="btn btn-info my-1"><i class="nav-icon fad fa-search"></i></a>
                                        <a href="/produk/e/<?= $p['id'] ?>" class="btn btn-success my-1"><i class="nav-icon fad fa-pencil"></i></a>
                                        <a href="/produk/c/<?= $p['id'] ?>" class="btn btn-warning my-1"><i class="nav-icon fad fa-comment"></i></a>
                                        <form action="/produk/<?= $p['id'] ?>" method="post" class="d-inline">
                                            <?= csrf_field() ?>
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button type="submit" class="btn btn-danger my-1" onclick="confirm('Yakin?')"><i class="nav-icon fad fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    <?= $pager->links('produk', 'pagination') ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>