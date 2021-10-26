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
                <div class="form-group mr-auto">
                    <label for="filter" style="font-weight: 100">Filter berdasarkan Kategori:</label>
                    <select name="filter" id="filter" class="form-control ml-3">
                        <option value="">-- Pilih Kategori --</option>
                        <?php foreach ($kategori as $k) : ?>
                            <option value="<?= $k['id'] ?>" <?= ($filter == $k['id']) ? 'selected' : '' ?>><?= $k['kategori'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group tombol-filter">
                    <button type="submit" class="btn btn-outline-info">Aktifkan Filter</button>
                </div>
            </form>
        </div>
        <div class="col-md-1"></div>
        <div class="col-md-1"></div>
        <?php if (!$produk) : ?>
            <h6 style="font-weight:100; margin-bottom: 360px">Maaf, kami tidak dapat menemukan <?= $keyword ?></h6>
        <?php endif; ?>
        <?php
        foreach ($produk as $p) :
            if ($p['promosi'] || $p['penawaran']) :
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
                                <small style="color:black"><?= $p['penawaran'] ?></small>
                            </div>
                        </a>
                    </div>
                </div>
        <?php endif;
        endforeach;
        ?>
        <div class="col-md-1"></div>
    </div>
</div>
<?= $this->endSection() ?>