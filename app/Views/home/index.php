<?=
$this->extend('layout/home');

$this->section('content')
?>

<div class="site-section space-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 px-0">
                <div id="carouselExampleControls" class="carousel slide pointer-event" data-ride="carousel">
                    <div class="carousel-inner" style="height: 360px">
                        <div class="carousel-item">
                            <img src="img/1.jpg" class="d-block img-fluid" style="max-height:360px; width:1000vh; margin: 0px auto;object-fit: cover;">
                        </div>
                        <div class="carousel-item active carousel-item-left">
                            <img src="img/2.jpg" class="d-block img-fluid" style="max-height:360px; width:1000vh; margin: 0px auto;object-fit: cover;">
                        </div>
                        <div class="carousel-item carousel-item-next carousel-item-left">
                            <img src="img/1.jpg" class="d-block img-fluid" style="max-height:360px; width:1000vh; margin: 0px auto;object-fit: cover;">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>

        <div class="row pt-4 mx-2">
            <div class="col-md-1"></div>
            <div class="col-md-10 mb-3">
                <font style="font-weight: bold;color:#315c6c !important">BEST SELLER PRODUCT</font>
                <a href="/product" style="float: right; color: #315c6c;">See All Product</a>
            </div>
            <div class="col-md-1"></div>
            <div class="col-md-1"></div>

            <?php
            foreach ($produk as $p) :
            ?>
                <div class="col-6 col-md-2">
                    <div class="simple">
                        <a href="/product/<?= $p['id'] ?>" class="produk" data-id="1">
                            <div class="simple_img" style="height: 175px;">
                                <?php
                                foreach ($foto as $f) :
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
<div class="information bg-danger">
    <div class="container p-3">
        <div class="row justify-content-center my-2">
            <h3>CARA PEMESANAN</h3>
        </div>
        <div class="row instruction mt-4">
            <div class="col-4 col-lg-2 text-center">
                <i class="fad fa-5x fa-search mb-2"></i>
                <p style="font-weight:100">Pilih barang yang akan Anda pesan</p>
            </div>
            <div class="col-4 col-lg-2 text-center">
                <i class="fad fa-5x fa-hand-pointer mb-2"></i>
                <p style="font-weight:100">Buka detail barang, baca seksama spesifikasinya lalu klik Pesan Sekarang.</p>
            </div>
            <div class="col-4 col-lg-2 text-center">
                <i class="fab fa-5x fa-whatsapp mb-2"></i>
                <p style="font-weight:100">Anda akan diarahkan menuju Whatsapp, harap pastikan anda sudah memiliki atau sudah login akun Whatsapp Anda.</p>
            </div>
            <div class="col-4 col-lg-2 text-center">
                <i class="fad fa-5x fa-clipboard-list-check mb-2"></i>
                <p style="font-weight:100">Isi formulir yang sudah disediakan pada bagian pesan Whatsapp.</p>
            </div>
            <div class="col-4 col-lg-2 text-center">
                <i class="fad fa-5x fa-angle-double-right mb-2"></i>
                <p style="font-weight:100">Kirim Pesan berisi Formulir tersebut ke nomor yang bersangkutan.</p>
            </div>
            <div class="col-4 col-lg-2 text-center">
                <i class="fad fa-5x fa-spinner mb-2"></i>
                <p style="font-weight:100">Pesanan akan diproses, mengenai negosiasi, klaim promosi ataupun pembayaran bisa menghubungi nomor tersebut.</p>
            </div>
        </div>
    </div>
</div>
<div class="promotion">
    <div class="container-fluid">
        <div class="row pt-4 mx-2">
            <div class="col-md-1"></div>
            <div class="col-md-10 mb-3">
                <font style="font-weight: bold;color:#315c6c !important">PROMOTION</font>
                <a href="/promotion" style="float: right; color: #315c6c;">See All Product</a>
            </div>
            <div class="col-md-1"></div>
            <div class="col-md-1"></div>

            <?php
            foreach ($promosi as $p) :
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
                                <small style="color:black"><?= $p['penawaran'] ?></small>
                            </div>
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
            <div class="col-md-1"></div>
        </div>
    </div>
</div>
<div class="ratings bg-danger">
    <div class="container p-3">
        <div class="row justify-content-center">
            <h3>PENILAIAN WEBSITE KAMI</h3>
        </div>
        <div class="row justify-content-center">
            <div class="rating-section mt-2 mb-3 py-4 d-flex" style="align-items: center">
                <i <?= ($rating >= 1) ? 'style="color:orange"' : '' ?> class="fas fa-3x fa-star"></i>
                <i <?= ($rating >= 2) ? 'style="color:orange"' : '' ?> class="fas fa-3x fa-star"></i>
                <i <?= ($rating >= 3) ? 'style="color:orange"' : '' ?> class="fas fa-3x fa-star"></i>
                <i <?= ($rating >= 4) ? 'style="color:orange"' : '' ?> class="fas fa-3x fa-star"></i>
                <i <?= ($rating == 5) ? 'style="color:orange"' : '' ?> class="fas fa-3x fa-star"></i>
                <h5 style="color:white;font-weight: 100" class="ml-3"><?= $rating ?>/5</h5>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="share-section d-flex align-items-center">
                <h6 style="font-weight:100" class="mr-2">Dukung kami dengan membagikan website ini:</h6>
                <a class="btn btn-primary mr-1" href="https://www.facebook.com/share.php?v=4&amp;   src=bm&amp;   u=<?= site_url(uri_string()) ?>   &amp;   t=S.art" onclick="window.open(this.href,&quot;   sharer&quot;   ,&quot;   toolbar=0,status=0,width=626,height=436&quot;   );   return false;" rel="nofollow" target="blank"><i class="fab fa-facebook"></i></a>
                <a class="btn btn-success" data-action="share/whatsapp/share" href="https://whatsapp://send?text=S.art | <?= site_url(uri_string()) ?>" onclick="window.open(this.href, 'windowName', 'width=900, height=550, left=24, top=24, scrollbars, resizable'); return false"><i aria-hidden="true" class="fab fa-whatsapp"></i></a>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>