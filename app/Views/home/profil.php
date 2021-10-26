<?=
$this->extend('layout/home');

$this->section('content')
?>
<div class="user-section container-fluid">
    <div class="row mx-2 my-2">
        <div class="col-lg-4 p-4 text-center" style="background-color: white; box-shadow: 0.5rem 0.125rem 0.25rem rgba(0,0,0 / 50%)">
            <img src="/img/logo.png" alt="" style="width: 50vh" class="mb-3">
            <div class="row mb-2" style="align-items:center">
                <div class="col-12 text-center">
                    <h1 style="font-weight:100">S.art</h1>
                </div>
            </div>
            <div class="row" style="align-items:center">
                <div class="col-lg-5">
                    <h5 style="font-weight:100">Instagram</h5>
                </div>
                <div class="col-lg-7">
                    <a href="https://instagram.com/umarzharip" style="font-weight:100">@umarzharip</a>
                </div>
            </div>
            <hr style="background-color:rgba(0,0,0,0.125)">
            <div class="row" style="align-items:center">
                <div class="col-lg-5">
                    <h5 style="font-weight:100">Email</h5>
                </div>
                <div class="col-lg-7">
                    <h6 style="font-weight:100"><?= $user['email'] ?></h6>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-12 text-right">
                    <a href="/home" class="btn btn-outline-secondary">Kembali ke beranda</a>
                </div>
            </div>
        </div>
        <div class="col-lg-8 pr-0">
            <div class="komentar p-4" style="background-color: white; box-shadow: 0.5rem 0.125rem 0.25rem rgba(0,0,0 / 50%)">
                <h3 style="font-weight:100" class="pb-5">Biodata Lengkap</h3>
                <div class="row" style="align-items:center">
                    <div class="col-lg-4">
                        <h5 style="font-weight:100">Nama</h5>
                    </div>
                    <div class="col-lg-8">
                        <h6 style="font-weight:100"><?= $user['name'] ?></h6>
                    </div>
                </div>
                <hr style="background-color:rgba(0,0,0,0.125)">
                <div class="row" style="align-items:center">
                    <div class="col-lg-4">
                        <h5 style="font-weight:100">TTL</h5>
                    </div>
                    <div class="col-lg-8">
                        <h6 style="font-weight:100">Pekalongan, 15 Maret 2003</h6>
                    </div>
                </div>
                <hr style="background-color:rgba(0,0,0,0.125)">
                <div class="row" style="align-items:center">
                    <div class="col-lg-4">
                        <h5 style="font-weight:100">Alamat</h5>
                    </div>
                    <div class="col-lg-8">
                        <h6 style="font-weight:100">Dukuh Bodren, Kelurahan Sidorejo, Kecamatan Tirto, Kabupaten Pekalongan</h6>
                    </div>
                </div>
                <hr style="background-color:rgba(0,0,0,0.125)">
                <div class="row" style="align-items:center">
                    <div class="col-lg-4">
                        <h5 style="font-weight:100">Hobi</h5>
                    </div>
                    <div class="col-lg-8">
                        <h6 style="font-weight:100">Membaca</h6>
                    </div>
                </div>
                <hr style="background-color:rgba(0,0,0,0.125)">
                <div class="row">
                    <div class="col-lg-4">
                        <h5 style="font-weight:100">No. Whatsapp</h5>
                    </div>
                    <div class="col-lg-8">
                        <a href="https://wa.me/<?= $user['wa'] ?>" style="font-weight:100">+<?= $user['wa'] ?></a>
                    </div>
                </div>
                <hr style="background-color:rgba(0,0,0,0.125)">
                <div class="row">
                    <div class="col-lg-4">
                        <h5 style="font-weight:100">Facebook</h5>
                    </div>
                    <div class="col-lg-8">
                        <a href="https://fb.com/" style="font-weight:100">Umar Zharip</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>