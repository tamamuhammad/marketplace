<?php
$db      = \Config\Database::connect();
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= $title ?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/plugin/fontawesome/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/css/adminlte.min.css">
    <style>
        .page-item.active .page-link {
            background-color: tomato !important;
            border-color: tomato;
            color: white !important;
        }
    </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color: #dc3545 !important;">
            <!-- Brand Logo -->
            <a href="/dashboard" class="brand-link" style="border-bottom: 1px solid darkred">
                <img src="/img/logo.png" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">S.art</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex" style="border-bottom: 1px solid darkred">
                    <div class="info">
                        <i class="nav-icon fad fa-user-circle mr-1" style="color: white"></i>
                        <a href="/user/show" style="color:white!important"><?= session()->get('username') ?></a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item">
                            <a href="/dashboard" class="nav-link" style="color:white!important">
                                <i class="nav-icon fad fa-tachometer"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/produk" class="nav-link" style="color:white!important">
                                <i class="nav-icon fad fa-shopping-cart"></i>
                                <p>
                                    Produk
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/kategori" class="nav-link" style="color:white!important">
                                <i class="nav-icon fad fa-tags"></i>
                                <p>
                                    Kategori
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/user/logout" class="nav-link" style="color:white!important">
                                <i class="nav-icon fad fa-sign-out"></i>
                                <p>
                                    Logout
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>
        <div class="content-wrapper">
            <?= $this->renderSection('content') ?>
        </div>

        <footer class="main-footer">
            <strong>Copyright &copy; 2021 <a href="http://tamamuhammad.github.io">TamamMuhammad</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Sunan</b> store
            </div>
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="/plugin/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="/plugin/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="/plugin/chart.js/Chart.min.js"></script>
    <script src="/js/adminlte.js"></script>
    <script>
        $(function() {
            $('.editKategori').on('click', function() {
                const id = $(this).data('id');
                const val = $(this).data('value');
                $('.modal-body form').attr('action', '/kategori/update/' + id);
                $('.formkategori').val(val);
            })
        })

        function previewImg() {
            const foto = document.querySelector('.custom-file-input')
            const label = document.querySelector('.custom-file-label')
            const preview = document.querySelector('.img-preview')

            label.textContent = foto.files[0].name
            const file = new FileReader()
            file.readAsDataURL(foto.files[0])
            file.onload = function(e) {
                preview.src = e.target.result
            }
        }
    </script>
    <?php if (site_url(uri_string()) == base_url() . '/dashboard') : ?>
        <script>
            $(function() {
                var ctx = document.getElementById("barChart").getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: ['1', '2', '3', '4', '5'],
                        datasets: [{
                            label: '',
                            data: [
                                <?php
                                $rating1 = $db->table('rating')->where('rating', 1)->where('id_produk', 1111111111)->countAllResults();
                                echo $rating1;
                                ?>,
                                <?php
                                $rating2 = $db->table('rating')->where('rating', 2)->where('id_produk', 1111111111)->countAllResults();
                                echo $rating2;
                                ?>,
                                <?php
                                $rating3 = $db->table('rating')->where('rating', 3)->where('id_produk', 1111111111)->countAllResults();
                                echo $rating3;
                                ?>,
                                <?php
                                $rating4 = $db->table('rating')->where('rating', 4)->where('id_produk', 1111111111)->countAllResults();
                                echo $rating4;
                                ?>,
                                <?php
                                $rating5 = $db->table('rating')->where('rating', 5)->where('id_produk', 1111111111)->countAllResults();
                                echo $rating5;
                                ?>
                            ],
                            backgroundColor: [
                                'rgb(75, 192, 192)',
                                'rgb(255, 99, 132)',
                                'rgb(255, 206, 86)',
                                'rgb(54, 162, 235)',
                                'rgb(40, 167, 69)'
                            ]
                        }]
                    },
                    options: {
                        maintainAspectRatio: false,
                        responsive: true,
                        legend: {
                            display: false
                        },
                        scales: {
                            xAxes: [{
                                gridLines: {
                                    display: false,
                                }
                            }],
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                        }
                    }
                })

                var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
                let labelData = []
                let produkData = []
                <?php $namaKategori =  $db->query('SELECT * from `kategori`')->getResultArray();
                foreach ($namaKategori as $nk) : ?>
                    labelData.push('<?= $nk['kategori'] ?>')
                    <?php $product =  $db->table('produk')->where('kategori', $nk['id'])->countAllResults(); ?>
                    produkData.push('<?= $product ?>')
                <?php endforeach; ?>
                var donutChart = new Chart(donutChartCanvas, {
                    type: 'doughnut',
                    data: {
                        labels: labelData,
                        datasets: [{
                            label: '',
                            data: produkData,
                            backgroundColor: [
                                'rgb(216, 27, 96)',
                                'rgb(32, 201, 151)',
                                'rgb(253, 126, 20)',
                                'rgb(108, 117, 125)'
                            ]
                        }]
                    },
                    options: {
                        maintainAspectRatio: false,
                        responsive: true,
                    }
                })
                var areaChartCanvas = $('#areaChart').get(0).getContext('2d')
                var areaChartData = {
                    labels: [<?= date('Y', time() - (31536000 * 6)) ?>, <?= date('Y', time() - (31536000 * 5)) ?>, <?= date('Y', time() - (31536000 * 4)) ?>, <?= date('Y', time() - (31536000 * 3)) ?>, <?= date('Y', time() - (31536000 * 2)) ?>, <?= date('Y', time() - 31536000) ?>, <?= date('Y', time()) ?>],
                    datasets: [{
                        label: 'Jumlah Alumni',
                        backgroundColor: 'rgba(220,53,69,0.5)',
                        borderColor: 'rgba(220,53,69,0.8)',
                        pointRadius: true,
                        pointColor: '#dc3545',
                        pointStrokeColor: 'rgba(60,141,188,1)',
                        pointHighlightFill: '#fff',
                        pointHighlightStroke: 'rgba(60,141,188,1)',
                        data: [
                            <?php
                            $tahun1 = $db->table('produk')->like('created_at', date('Y', time() - (31536000 * 6)))->countAllResults();
                            echo $tahun1;
                            ?>,
                            <?php
                            $tahun2 = $db->table('produk')->like('created_at', date('Y', time() - (31536000 * 5)))->countAllResults();
                            echo $tahun2;
                            ?>,
                            <?php
                            $tahun3 = $db->table('produk')->like('created_at', date('Y', time() - (31536000 * 4)))->countAllResults();
                            echo $tahun3;
                            ?>,
                            <?php
                            $tahun4 = $db->table('produk')->like('created_at', date('Y', time() - (31536000 * 3)))->countAllResults();
                            echo $tahun4;
                            ?>,
                            <?php
                            $tahun5 = $db->table('produk')->like('created_at', date('Y', time() - (31536000 * 2)))->countAllResults();
                            echo $tahun5;
                            ?>,
                            <?php
                            $tahun6 = $db->table('produk')->like('created_at', date('Y', time() - 31536000))->countAllResults();
                            echo $tahun6;
                            ?>,
                            <?php
                            $tahun7 = $db->table('produk')->like('created_at', date('Y', time()))->countAllResults();
                            echo $tahun7;
                            ?>
                        ]
                    }, ]
                }
                var areaChartOptions = {
                    maintainAspectRatio: false,
                    responsive: true,
                    legend: {
                        display: false
                    },
                    scales: {
                        xAxes: [{
                            gridLines: {
                                display: false,
                            }
                        }],
                        yAxes: [{
                            gridLines: {
                                display: false,
                            }
                        }]
                    }
                }

                var areaChart = new Chart(areaChartCanvas, {
                    type: 'line',
                    data: areaChartData,
                    options: areaChartOptions
                })
            });
        </script>
    <?php endif; ?>
</body>

</html>