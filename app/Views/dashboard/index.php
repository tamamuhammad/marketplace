<?= $this->extend('layout/dashboard') ?>

<?= $this->section('content') ?>
<div class="container p-4">
    <h1 style="font-weight:100">GRAFIK PENJUALAN PRODUK</h1>
    <hr>
    <div class="card">
        <div class="row">
            <div class="card-body col-lg-12">
                <p class="text-bold">Total Produk Berdasarkan Tahun Penjualan</p>
                <div class="chart">
                    <canvas id="areaChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
            </div>
            <div class="card-body col-lg-8">
                <p class="text-bold">Rating Website</p>
                <div class="chart">
                    <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
            </div>
            <div class="card-body col-sm-4">
                <p class="text-bold">Produk berdasarkan Kategori</p>
                <canvas id="donutChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>