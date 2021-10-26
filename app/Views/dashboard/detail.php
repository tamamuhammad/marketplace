<?= $this->extend('layout/dashboard') ?>

<?= $this->section('content') ?>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Detail Produk</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">Produk</li>
                    <li class="breadcrumb-item active">Detail Produk</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-6">
            <div class="card shadow">
                <div class="card-header">
                    <h3 class="card-title">Preview Produk</h3>
                </div>
                <div class="card-body">
                    <?php
                    $jumlahfoto = count($foto);
                    if ($jumlahfoto > 1) {
                    ?>
                        <div id="kontrol" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner" style="height: 240px!important; border-radius: 10px">
                                <?php
                                foreach ($foto as $key => $value) {
                                    $active = ($key == 0) ? 'active' : '';
                                    echo '<div class="carousel-item ' . $active . '">
                                            <img src="/img/' . $value['foto'] . '" class="d-block img-fluid rounded-lg" style="width: 100%; height: 240px; object-fit: cover">
                                        </div>';
                                }
                                ?>
                            </div>
                            <a class="carousel-control-prev" href="#kontrol" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#kontrol" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                        <?php } else {
                        foreach ($foto as $f) :
                        ?>
                            <img src="/img/<?= $f['foto'] ?>" class="d-block img-fluid rounded-lg" style="width: 100%; border-radius: 10px">
                    <?php endforeach;
                    } ?>
                    <div class="row mt-2">
                        <div class="col-6 mt-4">
                            <h4 class="mb-0"><?= $produk['nama'] ?></h4>
                        </div>
                        <div class="col-6 text-right">
                            <?php
                            if ($produk['promosi'] != null) :
                                $hargapromosi = $produk['harga'] - ($produk['harga'] * $produk['promosi'] / 100);
                            ?>
                                <h6 style="color: red"><strike>Rp. <?= $produk['harga'] ?>,-</strike> <?= $produk['promosi'] ?>%</h6>
                                <h2 class="mb-0 px-2 text-white" style="background-color:firebrick; border-radius: 5px">Rp. <?= $hargapromosi ?>,-</h2>
                            <?php else :  ?>
                                <h2 class="mt-3 mb-0 px-2 text-white" style="background-color:firebrick; border-radius: 5px">Rp. <?= $produk['harga'] ?>,-</h2>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end col -->
        <div class="col-lg-6">
            <div class="card shadow">
                <div class="card-header">
                    <h3 class="card-title">Spesifikasi Produk</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-3">Promosi</div>
                        <div class="col-sm"><strong><?= $produk['penawaran'] ?></strong></div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3">Popularitas</div>
                        <div class="col-sm"><strong><?= $produk['popularitas'] ?></strong></div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3">Kategori</div>
                        <div class="col-sm"><strong><?= $kategori['kategori'] ?></strong></div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3">Deskripsi</div>
                        <div class="col-sm"><strong><?= $produk['deskripsi'] ?></strong></div>
                    </div>
                    <hr>
                    <div class="row text-center">
                        <div class="col-4">
                            <h1 style="color:darkcyan"><?= $likes; ?></h1>
                            <h6>Like</h6>
                        </div>
                        <div class="col-4">
                            <a href="/produk/c/<?= $produk['id'] ?>" style="color: black">
                                <h1 style="color:tomato"><?= $comments; ?></h1>
                                <h6>Komentar</h6>
                            </a>
                        </div>
                        <div class="col-4">
                            <a href="/produk/rating/<?= $produk['id'] ?>" style="color: black">
                                <div class="justify-content-center d-flex" style="align-items: baseline;">
                                    <h1 style="color:goldenrod"><?= $ratings; ?></h1>
                                    <h6>/5</h6>
                                </div>
                                <h6>Rating</h6>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <a class="btn btn-success px-3 mx-1 float-right" href="/produk/e/<?= $produk['id'] ?>">Edit</a>
                    <a class="btn btn-secondary px-3 mx-1 float-right" href="/produk">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Container fluid  -->
<?= $this->endSection() ?>