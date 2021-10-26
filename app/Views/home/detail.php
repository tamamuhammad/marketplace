<?=
$this->extend('layout/home');

$this->section('content')
?>
<div class="pruduct-section container-fluid">
    <div class="row m-2" style="background-color: white; box-shadow: 0.5rem 0.125rem 0.25rem rgba(0,0,0 / 50%)">
        <div class="col-lg-6 px-0">
            <?php
            $jumlahfoto = count($foto);
            if ($jumlahfoto > 1) {
            ?>
                <div id="kontrol" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner slide-product" style="height: 360px">
                        <?php
                        foreach ($foto as $key => $value) {
                            $active = ($key == 0) ? 'active' : '';
                            echo '<div class="carousel-item ' . $active . '">
                                            <img src="/img/' . $value['foto'] . '" class="img-fluid" style="max-width: 1080px; width: 100%; height: 360px; object-fit: cover">
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
                    <img src="/img/<?= $f['foto'] ?>" lass="img-fluid" style="max-width: 1080px; width: auto; height: 360px; object-fit: cover">
            <?php endforeach;
            } ?>
        </div>
        <div class="col-lg-6 p-4 pl-5 d-flex product-info" style="flex-direction: column">
            <div class="product-title">
                <h2><?= $produk['nama'] ?></h2>
            </div>
            <div class="response row px-2">
                <div class="d-flex px-2" style="border-right: 1px solid rgba(0,0,0, 0.125); align-items: center">
                    <h5 class="mb-1 mr-1"><?= $like ?></h5>
                    <h6 style="color:grey;font-weight: 100" class="mb-1">Likes</h6>
                </div>
                <div class="d-flex px-2" style="align-items: center">
                    <h5 class="mb-1 mr-1"><?= count($komentar) ?></h5>
                    <h6 style="color:grey;font-weight: 100" class="mb-1">Komentar</h6>
                </div>
                <div class="d-flex px-2" style="border-left: 1px solid rgba(0,0,0, 0.125); align-items: center">
                    <h5 class="mb-1"><?= $produk['popularitas'] ?><h6 style="color:grey;font-weight: 100" class="mb-1 mr-1">x</h6>
                    </h5>
                    <h6 style="color:grey;font-weight: 100" class="mb-1">Dilihat</h6>
                </div>
            </div>
            <hr style="background-color: darkred" class="my-2">
            <div class="price-promotion row px-3" style="align-items: center">
                <?php if ($produk['promosi']) : ?>
                    <strike style="color:grey">Rp. <?= $produk['harga'] ?>,-</strike>
                    <h2 style="color:darkred" class="mx-2">Rp. <?= $produk['harga'] - ($produk['promosi'] / 100 * $produk['harga']) ?>,-</h2>
                    <h6 class="badge badge-danger"><?= $produk['promosi'] ?>% OFF</h6>
                <?php else : ?>
                    <h2 style="color:darkred">Rp. <?= $produk['harga'] ?>,-</h2>
                <?php endif; ?>
            </div>
            <?php if ($produk['penawaran']) : ?>
                <div class="product-promotion">
                    <h5 style="font-weight:100;color:white" class="p-2 bg-danger">PROMOSI!!! <?= $produk['penawaran'] ?></h5>
                </div>
            <?php endif; ?>
            <div class="rating-section mt-2 mb-3 py-4 d-flex" style="align-items: center">
                <i <?= ($rating >= 1) ? 'style="color:orange"' : '' ?> class="fas fa-2x fa-star"></i>
                <i <?= ($rating >= 2) ? 'style="color:orange"' : '' ?>class="fas fa-2x fa-star"></i>
                <i <?= ($rating >= 3) ? 'style="color:orange"' : '' ?>class="fas fa-2x fa-star"></i>
                <i <?= ($rating >= 4) ? 'style="color:orange"' : '' ?>class="fas fa-2x fa-star"></i>
                <i <?= ($rating == 5) ? 'style="color:orange"' : '' ?>class="fas fa-2x fa-star"></i>
                <h5 style="color:grey;font-weight: 100" class="ml-3"><?= $rating ?>/5</h5>
            </div>
            <div class="buy-button">
                <a class="btn btn-primary mr-1" href="https://www.facebook.com/share.php?v=4&amp;   src=bm&amp;   u=<?= site_url(uri_string()) ?>   &amp;   t=<?= $produk['nama'] ?>" onclick="window.open(this.href,&quot;   sharer&quot;   ,&quot;   toolbar=0,status=0,width=626,height=436&quot;   );   return false;" rel="nofollow" target="blank"><i class="fab fa-2x fa-facebook"></i></a>
                <a class="btn btn-success mr-1" data-action="share/whatsapp/share" href="https://whatsapp://send?text=<?= $produk['nama'] ?> | <?= site_url(uri_string()) ?>" onclick="window.open(this.href, 'windowName', 'width=900, height=550, left=24, top=24, scrollbars, resizable'); return false"><i aria-hidden="true" class="fab fa-2x fa-whatsapp"></i></a>
                <a href="https://api.whatsapp.com/send?phone=<?= $user['wa'] ?>&text=<?= site_url(uri_string()) ?>%0A%0AAssalamualaikum%2C%20saya%20tertarik%20dengan%20produk%20anda%0A%0ANama%20Produk%20%3A%0A%0ANama%20%3A%0AAlamat%20%3A" class="btn btn-danger" target="_blank" style="font-size:16pt">Pesan Sekarang</a>
            </div>
        </div>
    </div>
</div>
<div class="pruduct-information container-fluid">
    <div class="row mx-2 mb-2">
        <div class="col-lg-7 p-4" style="background-color: white; box-shadow: 0.5rem 0.125rem 0.25rem rgba(0,0,0 / 50%)">
            <h3 style="font-weight:100" class="pb-5">Spesifikasi Produk</h3>
            <div class="d-flex" style="align-items:center">
                <h5 style="font-weight:100;margin-right: 200px">Stok</h5>
                <h6 style="font-weight:100"><?= $produk['stok'] ?></h6>
            </div>
            <hr style="background-color:rgba(0,0,0,0.125)">
            <div class="d-flex" style="align-items:center">
                <h5 style="font-weight:100;margin-right: 167px">Kategori</h5>
                <h6 style="font-weight:100"><?= $kategori['kategori'] ?></h6>
            </div>
            <hr style="background-color:rgba(0,0,0,0.125)">
            <div class="d-block">
                <h5 style="font-weight:100;margin-bottom: 25px">Deskripsi</h5>
                <p style="font-weight:100"><?= $produk['deskripsi'] ?></p>
            </div>
        </div>
        <div class="col-lg-5 pr-0">
            <div class="komentar p-4" style="background-color: white; box-shadow: 0.5rem 0.125rem 0.25rem rgba(0,0,0 / 50%)">
                <h3 style="font-weight:100" class="pb-5">Komentar dan Ulasan</h3>
                <form action="/komen/<?= $produk['id'] ?>" method="post" style="background-color: rgb(245, 245, 245);" class="p-3 pb-5" enctype="multipart/form-data">
                    <?= csrf_field() ?>
                    <h4 style="font-weight:100">Buat Ulasan Baru</h4>
                    <hr style="background-color:rgba(0,0,0,0.125)">
                    <div class="form-group">
                        <label for="nama" style="font-weight:100">Nama:</label>
                        <input type="text" class="form-control <?= ($validation->getError('nama')) ? 'is-invalid' : '' ?>" id="nama" name="nama" value="<?= old('nama') ?>">
                        <?php if ($validation->getError('nama')) : ?>
                            <div class="invalid-feedback"><?= $validation->getError('nama') ?></div>
                        <?php endif; ?>
                        <small style="color:blue">*) Gunakanlah nama yang benar, karena nama pertama akan dijadikan nama berikutnya.</small>
                    </div>
                    <div class="form-group">
                        <label for="komentar" style="font-weight:100">Komentar:</label>
                        <textarea name="komentar" id="komentar" cols="30" rows="5" class="form-control <?= ($validation->getError('komentar')) ? 'is-invalid' : '' ?>" value="<?= old('komentar') ?>"></textarea>
                        <?php if ($validation->getError('komentar')) : ?>
                            <div class="invalid-feedback"><?= $validation->getError('komentar') ?></div>
                        <?php endif; ?>
                    </div>
                    <div class="form-group">
                        <label style="font-weight:100">Foto:</label>
                        <div class="custom-file">
                            <label class="custom-file-label" for="foto">Pilih Gambar</label>
                            <input type="file" name="foto" id="foto" class="btn btn-outline-warning p-0 custom-file-input <?= ($validation->getError('foto')) ? 'is-invalid' : '' ?>">
                        </div>
                        <?php if ($validation->getError('foto')) : ?>
                            <div class="invalid-feedback"><?= $validation->getError('foto') ?></div>
                        <?php endif; ?>
                    </div>
                    <div class="float-right">
                        <button type="submit" class="btn btn-outline-info">Komentari</button>
                    </div>
                </form>
                <?php foreach ($komentar as $k) : ?>
                    <h6 style="font-weight:400;margin-bottom: 25px"><?= $k['username'] ?></h6>
                    <hr style="background-color:rgba(0,0,0,0.125)">
                    <?php if ($k['foto']) : ?>
                        <img src="/img/komentar/<?= $k['foto'] ?>" alt="" class="img-fluid ml-3" style="border-radius: 5px; height: 100px; max-width: 100px; width: 100px; object-fit:cover">
                    <?php endif; ?>
                    <p style="font-weight:100" class="ml-3"><?= $k['komentar'] ?></p>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
<div class="promotion">
    <div class="container-fluid">
        <div class="row pt-4 mx-2">
            <div class="col-md-1"></div>
            <div class="col-md-10 mb-3">
                <font style="font-weight: bold;color:#315c6c !important">RECOMENDATION</font>
                <a href="/product" style="float: right; color: #315c6c;">See All Product</a>
            </div>
            <div class="col-md-1"></div>
            <div class="col-md-1"></div>

            <?php
            foreach ($rekomendasi as $p) :
            ?>
                <div class="col-6 col-md-2">
                    <div class="simple">
                        <a href="/product/<?= $p['id'] ?>" class="produk" data-id="1">
                            <div class="simple_img" style="height: 175px;">
                                <?php
                                foreach ($foto2 as $f) :
                                    if ($f['id_produk'] == $p['id']) :
                                ?>
                                        <img src="/img/<?= $f['foto'] ?>" class="img-fluid" style="width: 100%;height: 175px;object-fit: cover;">
                                <?php endif;
                                endforeach; ?>
                            </div>
                            <div class="simple_info text-center pt-2 pb-2">
                                <h6 style="color:black"><?= $p['nama'] ?></h6>
                                <?php
                                if ($p['promosi'] != null) :
                                    $hargapromosi = $p['harga'] - ($p['harga'] * $p['promosi'] / 100);
                                ?>
                                    <small style="color: black"><strike>Rp. <?= $p['harga'] ?>,-</strike> <?= $p['promosi'] ?>%</small>
                                    <h4 class="mb-0 px-2 mt-0" style="border-radius: 5px;">Rp. <?= $hargapromosi ?>,-</h4>
                                <?php else :  ?>
                                    <hr style="margin-top: 12.5px; margin-bottom: 12.5px">
                                    <h4 class="mt-0 mb-0 px-2" style="border-radius: 5px">Rp. <?= $p['harga'] ?>,-</h4>
                                <?php endif; ?>
                                <small style="color:black"><?= $p['kategori'] ?></small>
                            </div>
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
            <div class="col-md-1"></div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>