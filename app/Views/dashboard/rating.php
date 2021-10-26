<?= $this->extend('layout/dashboard') ?>

<?= $this->section('content') ?>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Rating Produk</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">Produk</li>
                    <li class="breadcrumb-item active">Rating Produk</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-8">
            <div class="card shadow">
                <div class="card-header">
                    <h3 class="card-title"><?= $produk['nama'] ?></h3>
                </div>
                <div class="card-body row">
                    <div class="col-3 col-lg-2" style="margin-top: 1px">
                        <label class="mb-3">Bintang 1</label>
                        <label class="mb-3">Bintang 2</label>
                        <label class="mb-3">Bintang 3</label>
                        <label class="mb-3">Bintang 4</label>
                        <label class="mb-3">Bintang 5</label>
                    </div>
                    <div class="col-9 col-lg-10 mt-2">
                        <div class="progress mb-4">
                            <div class="progress-bar progress-bar-striped bg-danger" role="progressbar" style="width: <?= $rating1 / $rating * 100 ?>%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"><?= $rating1 / $rating * 100 . '%(' . $rating1 . ')' ?></div>
                        </div>
                        <div class="progress mb-4">
                            <div class="progress-bar progress-bar-striped bg-warning" role="progressbar" style="width: <?= $rating2 / $rating * 100 ?>%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"><?= $rating2 / $rating * 100 . '%(' . $rating2 . ')' ?></div>
                        </div>
                        <div class="progress mb-4">
                            <div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: <?= $rating3 / $rating * 100 ?>%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"><?= $rating3 / $rating * 100 . '%(' . $rating3 . ')' ?></div>
                        </div>
                        <div class="progress mb-4">
                            <div class="progress-bar progress-bar-striped bg-info" role="progressbar" style="width: <?= $rating4 / $rating * 100 ?>%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"><?= $rating4 / $rating * 100 . '%(' . $rating4 . ')' ?></div>
                        </div>
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped bg-primary" role="progressbar" style="width: <?= $rating5 / $rating * 100 ?>%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"><?= $rating5 / $rating * 100 . '%(' . $rating5 . ')' ?></div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="/produk/<?= $produk['id'] ?>" class="btn btn-secondary float-right">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Container fluid  -->
<?= $this->endSection() ?>