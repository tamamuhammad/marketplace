<?=
$this->extend('layout/home');

$this->section('content')
?>
<div class="container">
    <div class="row mx-2">
        <div class="col-md-12 mt-3">
            <?php if ($keyword) : ?>
                <h5 style="font-weight: 100; margin-left: 100px"><i class="fad fa-search mr-3"></i>Hasil Pencarian dari '<?= $keyword ?>'</h5>
            <?php endif; ?>
            <?php if (!$rating2) : ?>
                <h6 style="font-weight: 100;text-align: center">Untuk menilai sebuah produk, harap beri nilai terlebih dahulu pada website agar kami dapat menigkatkan kualitas pelayanan website ini.</h6>
                <div class="d-flex justify-content-center mb-3">
                    <a href="" class="btn btn-outline-warning modal-nilai" data-toggle="modal" data-target="#addModal" data-id="1111111111">BERI NILAI</a>
                </div>
            <?php endif; ?>
        </div>
        <div class="col-md-1"></div>
        <div class="filter-section col-md-10 my-2" style="background-color: rgb(255, 255, 255);">
            <form action="" method="get" class="form-inline px-2 py-3 mb-0">
                <input type="hidden" name="keyword" value="<?= $keyword ?>">
                <div class="form-group mr-auto">
                    <label for="sort" style="font-weight: 100">Urut Berdasarkan :</label>
                    <select name="sort" id="sort" class="form-control ml-3">
                        <option value="">-- Pilih Urutan --</option>
                        <option value="terbaru" <?= ($sort == 'terbaru') ? 'selected' : '' ?>>Produk Terupdate</option>
                        <option value="terpopuler" <?= ($sort == 'terpopuler') ? 'selected' : '' ?>>Produk Terpopuler</option>
                        <option value="termurah" <?= ($sort == 'termurah') ? 'selected' : '' ?>>Harga Termurah</option>
                        <option value="termahal" <?= ($sort == 'termahal') ? 'selected' : '' ?>>Harga Termahal</option>
                        <option value="terbesar" <?= ($sort == 'terbesar') ? 'selected' : '' ?>>Diskon Terbesar</option>
                    </select>
                </div>
                <div class="form-group tombol-filter" style="width:50%!important">
                    <button type="submit" class="btn btn-outline-info">Aktifkan Filter</button>
                </div>
            </form>
        </div>
        <div class="col-md-1"></div>
        <div class="col-md-1"></div>
        <?php if (!$produk) : ?>
            <h6 style="font-weight:100; margin-bottom: 360px">Maaf, kami tidak dapat menemukan <?= $keyword ?></h6>
        <?php else : ?>
            <?php if ($rating2) : ?>
                <?php
                foreach ($produk as $p) :
                ?>
                    <div class="col-6 col-md-2">
                        <div class="simple">
                            <?php
                            $tag = '';
                            foreach ($rating as $r) :
                                if ($r['cookie'] == $_COOKIE['token'] && $r['id_produk'] == $p['id']) :
                            ?>
                                    <?php $tag = 'modal-sudah-nilai' ?>
                                <?php else : ?>
                                    <?php if ($tag == '') : ?>
                                        <?php $tag = 'modal-nilai' ?>
                                    <?php endif; ?>
                            <?php endif;
                            endforeach; ?>
                            <a href="" class="produk <?= $tag ?>" data-toggle="modal" data-target="#addModal" data-id="<?= ($tag == 'modal-nilai') ? $p['id'] : '' ?>">
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
                                    <?php
                                    $i = 0;
                                    $j = 0;
                                    if ($rating) {
                                        foreach ($rating as $r) {
                                            if ($r['id_produk'] == $p['id']) {
                                                $i = $i + $r['rating'];
                                                $j = $j + 1;
                                            }
                                        }
                                        if ($i != 0) {
                                            $star = $i / $j;
                                        } else {
                                            $star = 0;
                                        }
                                    } else {
                                        $star = 0;
                                    }
                                    ?>
                                    <i <?= ($star >= 1) ? 'style="color:orange"' : '' ?> class="fas fa-sm fa-star"></i>
                                    <i <?= ($star >= 2) ? 'style="color:orange"' : '' ?>class="fas fa-sm fa-star"></i>
                                    <i <?= ($star >= 3) ? 'style="color:orange"' : '' ?>class="fas fa-sm fa-star"></i>
                                    <i <?= ($star >= 4) ? 'style="color:orange"' : '' ?>class="fas fa-sm fa-star"></i>
                                    <i <?= ($star == 5) ? 'style="color:orange"' : '' ?>class="fas fa-sm fa-star"></i>
                                    <small style="color:grey;font-weight: 100">(<?= $star ?>/5)</small>
                                </div>
                            </a>
                            <?php if (!$likes) : ?>
                                <div class="like-button">
                                    <form action="/home/like/<?= $p['id'] ?>" method="post" class="mb-0">
                                        <?= csrf_field() ?>
                                        <input type="hidden" name="like" value="1">
                                        <div class="form-group mb-0">
                                            <button type="submit" class="btn btn-outline-info w-100 text-center"><i class="fad fa-thumbs-up"></i></button>
                                        </div>
                                    </form>
                                </div>
                            <?php endif; ?>
                            <?php
                            foreach ($likes as $like) :
                                if ($like['id_produk'] != $p['id']) :
                            ?>
                                    <div class="like-button">
                                        <form action="/home/like/<?= $p['id'] ?>" method="post" class="mb-0">
                                            <?= csrf_field() ?>
                                            <input type="hidden" name="like" value="1">
                                            <div class="form-group mb-0">
                                                <button type="submit" class="btn btn-outline-info w-100 text-center"><i class="fad fa-thumbs-up"></i></button>
                                            </div>
                                        </form>
                                    </div>
                                <?php else : ?>
                                    <div class="like-button">
                                        <form action="/home/unlike/<?= $p['id'] ?>" method="post" class="mb-0">
                                            <?= csrf_field() ?>
                                            <input type="hidden" name="like" value="1">
                                            <div class="form-group mb-0">
                                                <button type="submit" class="btn btn-info w-100 text-center"><i class="fad fa-thumbs-up"></i></button>
                                            </div>
                                        </form>
                                    </div>
                            <?php endif;
                            endforeach; ?>
                        </div>
                    </div>
        <?php endforeach;
            endif;
        endif; ?>
        <div class="col-md-1"></div>
    </div>
</div>
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addNewModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addNewModal">Beri Rating</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/home/rate/" method="post">
                    <?= csrf_field() ?>
                    <div class="form-group d-flex align-items-center">
                        <div class="col-2">
                            <input type="radio" class="form-control formkategori" name="rating" id="rating" value="1" required>
                        </div>
                        <div class="col-10 text-center">
                            <i class="fas fa-2x fa-star" style="color:orange"></i>
                        </div>
                    </div>
                    <div class="form-group d-flex align-items-center">
                        <div class="col-2">
                            <input type="radio" class="form-control formkategori" name="rating" id="rating" value="2" required>
                        </div>
                        <div class="col-10 text-center">
                            <i class="fas fa-2x fa-star" style="color:orange"></i>
                            <i class="fas fa-2x fa-star" style="color:orange"></i>
                        </div>
                    </div>
                    <div class="form-group d-flex align-items-center">
                        <div class="col-2">
                            <input type="radio" class="form-control formkategori" name="rating" id="rating" value="3" required>
                        </div>
                        <div class="col-10 text-center">
                            <i class="fas fa-2x fa-star" style="color:orange"></i>
                            <i class="fas fa-2x fa-star" style="color:orange"></i>
                            <i class="fas fa-2x fa-star" style="color:orange"></i>
                        </div>
                    </div>
                    <div class="form-group d-flex align-items-center">
                        <div class="col-2">
                            <input type="radio" class="form-control formkategori" name="rating" id="rating" value="4" required>
                        </div>
                        <div class="col-10 text-center">
                            <i class="fas fa-2x fa-star" style="color:orange"></i>
                            <i class="fas fa-2x fa-star" style="color:orange"></i>
                            <i class="fas fa-2x fa-star" style="color:orange"></i>
                            <i class="fas fa-2x fa-star" style="color:orange"></i>
                        </div>
                    </div>
                    <div class="form-group d-flex align-items-center">
                        <div class="col-2">
                            <input type="radio" class="form-control formkategori" name="rating" id="rating" value="5" required>
                        </div>
                        <div class="col-10 text-center">
                            <i class="fas fa-2x fa-star" style="color:orange"></i>
                            <i class="fas fa-2x fa-star" style="color:orange"></i>
                            <i class="fas fa-2x fa-star" style="color:orange"></i>
                            <i class="fas fa-2x fa-star" style="color:orange"></i>
                            <i class="fas fa-2x fa-star" style="color:orange"></i>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-info">Beri Nilai</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>