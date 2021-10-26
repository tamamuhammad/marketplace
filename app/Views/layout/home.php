<html lang="en" style="height: auto;">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="/plugin/fontawesome/css/all.min.css">

    <link rel="stylesheet" href="/css/adminlte.min.css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link rel="stylesheet" href="/css/style.css">

</head>

<body style="height: auto;">
    <div class="container topbar mx-0 fixed-top">
        <nav class="navbar-expand-md navbar-expand-md navbar-expand-lg navbar navbar-light">
            <a href="/product" class="<?= ($title == 'Beranda' || $halaman == true) ? 'd-none' : '' ?> text-white" style="margin-left: -75px"><i class="fad fa-arrow-left"></i></a>
            <div class="container-fluid py-1" style="align-items: center">
                <a href="/" class="navbar-brand ml-3 d-flex" style="align-items:center; margin-top: -8px">
                    <img src="/img/logo.png" width="53px" alt="Logo" loading="lazy" id="brand-logo">
                    <p class="mb-0 ml-3 text-white" style="font-weight:100; font-size: 27pt">S.art</p>
                </a>
                <ul class="navbar-nav">
                    <li class="nav-item d-flex">
                        <form action="" method="get" style="width: 720px" class="mb-0 form-keyword" id="search-form">
                            <div class="form-group mb-0" style="box-shadow: 0 0.125rem 0.25rem rgb(0 0 0 / 9%)">
                                <div class="input-group">
                                    <input type="text" name="keyword" id="keyword" class="form-control" style="border: none" placeholder="Masukkan kata kunci pencarian" value="<?= ($halaman == true) ? $keyword : '' ?>">
                                    <div class="input-prepend">
                                        <button class="btn btn-danger py-1" type="submit" style="border: 3px solid white; margin-left: -0.21rem; width: 100px; border-radius: 5px">Cari</button>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="sort" value="<?= ($title == 'List Produk') ? $sort : '' ?>">
                            <input type="hidden" name="filter" value="<?= ($title == 'List Produk') ? $filter : '' ?>">
                        </form>
                    </li>
                </ul>
                <!-- </div> -->
            </div>
        </nav>
    </div>

    <div class="row mx-0">

        <div class="col-12 col-lg-11 px-0" style="top:80px">
            <?= $this->renderSection('content') ?>

            <!-- Testi -->
            <div class="section-wa">
                <div style="position:fixed;right:130px;bottom:10px;z-index:99;">
                    <a href="https://wa.me/<?= $user['wa'] ?>"><i style="color: #15eb06;" class="fab fa-5x fa-whatsapp-square"></i></a>
                </div>
            </div>

            <footer class="site-footer p-3" style="background-color: rgb(235,235,235)">
                <div class="container">
                    <div class="row" style="color: aliceblue;">
                        <div class="col-lg-3 col-md-6" style="color:grey">
                            <h3 class="footer-heading mb-2" style="font-weight: 100">Menu</h3>
                            <hr style="background-color: rgba(0,0,0,0.125);">
                            <ul class="list-unstyled">
                                <li>
                                    <a href="/" style="font-weight: 100; color: #808080 !important;"><i class="fad fa-home" style="color: #808080; margin-right: 12px"></i>Home</a>
                                </li>
                                <li>
                                    <a href="/product" style="font-weight: 100; color: #808080 !important;"><i class="fad fa-shopping-cart mt-4" style="color: #808080; margin-right: 12px"></i>Produk</a>
                                </li>
                                <li>
                                    <a href="/promotion" style="font-weight: 100; color: #808080 !important;"><i class="fad fa-tags mt-4" style="color: #808080; margin-right: 10px;"></i>Promosi</a>
                                </li>
                                <li>
                                    <a href="/rating" style="font-weight: 100; color: #808080 !important;"><i class="fad fa-star mt-4" style="color: #808080; margin-right: 12px;"></i>Penilaian</a>
                                </li>
                                <li>
                                    <a href="/profile" style="font-weight: 100; color: #808080 !important;"><i class="fad fa-user-circle mt-4" style="color: #808080; margin-right: 15px;"></i>Kontak</a>
                                </li>
                            </ul>
                            <h3 class="footer-heading mb-2" style="font-weight: 100">Kategori</h3>
                            <hr style="background-color: rgba(0,0,0,0.125);">
                            <ul class="list-unstyled">
                                <?php foreach ($category as $k) : ?>
                                    <li>
                                        <a href="/product?keyword=&sort=&filter=<?= $k['id'] ?>" style="font-weight: 100; color: #808080 !important;"></i># <?= $k['kategori'] ?></a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                        <div class="col-lg-3 col-md-6 contact" style="color: #808080;">
                            <ul class="list-unstyled">
                                <h3 class="footer-heading mb-2" style="font-weight: 100">Contact</h3>
                                <hr style="background-color: rgba(0,0,0,0.125);">
                                <li>
                                    <a href="https://wa.me/<?= $user['wa'] ?>" style="font-weight: 100; color: #808080 !important;"><i class="fab fa-whatsapp" style="color: #808080; margin-right: 10px"></i>+62 858 6945 6886</a>
                                </li>
                                <li>
                                    <a href="https://fb.com/" style="font-weight: 100; color: #808080 !important;"><i class="fab fa-facebook mt-4" style="color: #808080; margin-right: 10px"></i>Umar Zharip</a>
                                </li>
                                <li>
                                    <a href="https://instagram.com/umarzharip" style="font-weight: 100; color: #808080 !important;"><i class="fab fa-instagram mt-4" style="color: #808080; margin-right: 12px;"></i>@umarzharip</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-3 col-md-6 text-justify maps pb-3" style="font-size:30pxpx;color: #808080;">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7921.51891123396!2d109.62802257131563!3d-6.9193346292737266!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7026cf6be0c0ab%3A0x9332d5f5698af285!2sBadren%2C%20Sidorejo%2C%20Tirto%2C%20Pekalongan%2C%20Central%20Java!5e0!3m2!1sen!2sid!4v1626448025276!5m2!1sen!2sid" width="100%" height="200" style="border:0;" allowfullscreen="" loading="lazy"></iframe><br><br>
                            <h6 style="font-weight: 100"><i class="fad fa-map-marked mr-2"></i>Dukuh Bodren, Kelurahan Sidorejo, Kecamatan Tirto, Kabupaten Pekalongan</h6>
                        </div>

                        <div class="col-lg-3 col-md-6 text-center">
                            <h2 class="footer-heading"><img src="/img/logo.png" width="160px" alt="Logo" class="img-fluid"></h2>
                            <p style="color: #808080; font-size: 16px;">Jam Operasional: <br> Setiap Hari, Pukul 09.00-22.00 WIB
                            </p>
                            <br><br><br><br><br><br><br>
                            <h6 style="font-weight:100; color: grey">Powered and Developed by
                                <a href="https://github.com/tamamuhammad" style="color:grey">Tamam Muhammad</a>
                            </h6>
                        </div>
                    </div>
                    <hr style="background-color:rgba(0,0,0,0.125)">
                    <div class="row">
                        <div class="p-2">
                            <h6 style="font-weight:100;color:grey">Copyright &copy; 2021, S.art</h6>
                        </div>
                    </div>
                </div>
            </footer>
            <nav class="menu-phone w-100 d-none fixed-bottom">
                <ul class="nav nav-pills text-center w-100" data-widget="treeview" role="menu" data-accordion="false" style="justify-content: space-evenly">
                    <li class="nav-item">
                        <a href="/" class="nav-link">
                            <i class="nav-icon fad fa-home"></i>
                            <p>
                                Home
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/product" class="nav-link">
                            <i class="nav-icon fad fa-shopping-cart"></i>
                            <p>
                                Produk
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/promotion" class="nav-link">
                            <i class="nav-icon fad fa-tags"></i>
                            <p>
                                Promosi
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/rating" class="nav-link">
                            <i class="nav-icon fad fa-star"></i>
                            <p>
                                Penilaian
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/profile" class="nav-link">
                            <i class="nav-icon fad fa-user-circle"></i>
                            <p>
                                Profile
                            </p>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
        <div class="col-1 col-lg-1 px-0 fixed-top menu-comp" style="background-color: rgb(235,235,235); left: auto; z-index: 1; top: 80px">
            <nav class="mt-2 w-100" style="height: 560px">
                <ul class="nav nav-pills nav-sidebar flex-column text-center w-100" data-widget="treeview" role="menu" data-accordion="false" style="justify-content: space-evenly; height: 500px">
                    <li class="nav-item">
                        <a href="/" class="nav-link">
                            <i class="nav-icon fad fa-home"></i>
                            <p>
                                Home
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/product" class="nav-link">
                            <i class="nav-icon fad fa-shopping-cart"></i>
                            <p>
                                Produk
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/promotion" class="nav-link">
                            <i class="nav-icon fad fa-tags"></i>
                            <p>
                                Promosi
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/rating" class="nav-link">
                            <i class="nav-icon fad fa-star"></i>
                            <p>
                                Penilaian
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/profile" class="nav-link">
                            <i class="nav-icon fad fa-user-circle"></i>
                            <p>
                                Profile
                            </p>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
    <!-- <footer class="py-3 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; RStore.com 2019</p>
        </div>
    </footer> -->

    <script src="/plugin/jquery/jquery.min.js"></script>
    <script src="/plugin/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="/js/adminlte.min.js"></script>
    <script src="/js/script.js"></script>
    <script>
        $(function() {
            const tag = `<h6 style="font-weight:100">Anda sudah menilai produk ini</h6>`;
            const form = `<form action="/home/rate/" method="post">
                    <?= csrf_field() ?>
                    <div class="form-group d-flex align-items-center">
                        <div class="col-2">
                            <input type="radio" class="form-control formkategori" name="rating" id="rating" value="1" required>
                        </div>
                        <div class="col-10 text-center">
                            <i class="fad fa-2x fa-star" style="color:orange"></i>
                        </div>
                    </div>
                    <div class="form-group d-flex align-items-center">
                        <div class="col-2">
                            <input type="radio" class="form-control formkategori" name="rating" id="rating" value="2" required>
                        </div>
                        <div class="col-10 text-center">
                            <i class="fad fa-2x fa-star" style="color:orange"></i>
                            <i class="fad fa-2x fa-star" style="color:orange"></i>
                        </div>
                    </div>
                    <div class="form-group d-flex align-items-center">
                        <div class="col-2">
                            <input type="radio" class="form-control formkategori" name="rating" id="rating" value="3" required>
                        </div>
                        <div class="col-10 text-center">
                            <i class="fad fa-2x fa-star" style="color:orange"></i>
                            <i class="fad fa-2x fa-star" style="color:orange"></i>
                            <i class="fad fa-2x fa-star" style="color:orange"></i>
                        </div>
                    </div>
                    <div class="form-group d-flex align-items-center">
                        <div class="col-2">
                            <input type="radio" class="form-control formkategori" name="rating" id="rating" value="4" required>
                        </div>
                        <div class="col-10 text-center">
                            <i class="fad fa-2x fa-star" style="color:orange"></i>
                            <i class="fad fa-2x fa-star" style="color:orange"></i>
                            <i class="fad fa-2x fa-star" style="color:orange"></i>
                            <i class="fad fa-2x fa-star" style="color:orange"></i>
                        </div>
                    </div>
                    <div class="form-group d-flex align-items-center">
                        <div class="col-2">
                            <input type="radio" class="form-control formkategori" name="rating" id="rating" value="5" required>
                        </div>
                        <div class="col-10 text-center">
                            <i class="fad fa-2x fa-star" style="color:orange"></i>
                            <i class="fad fa-2x fa-star" style="color:orange"></i>
                            <i class="fad fa-2x fa-star" style="color:orange"></i>
                            <i class="fad fa-2x fa-star" style="color:orange"></i>
                            <i class="fad fa-2x fa-star" style="color:orange"></i>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-info">Beri Nilai</button>
                    </div>
                </form>`
            $('.modal-nilai').on('click', function() {
                const id = $(this).data('id');
                $('.modal-body h6').remove();
                $('.modal-body form').remove();
                $('.modal-body').append(form);
                $('.modal-body form').attr('action', '/home/rate/' + id);
            })
            $('.modal-sudah-nilai').on('click', function() {
                $('.modal-body form').remove();
                $('.modal-body h6').remove();
                $('.modal-body').append(tag);
            })
        })
        if (window.outerWidth < 720) {
            (function($) {
                "use strict"; // Start of use strict

                // Activate scrollspy to add active class to navbar items on scroll
                $('body').scrollspy({
                    target: '.navbar',
                    offset: 100
                });

                // Collapse Navbar
                var navbarCollapse = function() {
                    if ($(".navbar").offset().top > 100) {
                        $("#search-form").removeClass("m-t");
                        $("#brand-logo").removeClass("m-t");
                        $("#search-form").addClass("mt-10");
                        $("#brand-logo").addClass("mt-10");
                    } else {
                        $("#search-form").removeClass("mt-10");
                        $("#brand-logo").removeClass("mt-10");
                        $("#search-form").addClass("m-t");
                        $("#brand-logo").addClass("m-t");
                    }
                };
                // Collapse now if page is not at top
                navbarCollapse();
                // Collapse the navbar when page is scrolled
                $(window).scroll(navbarCollapse);

            })(jQuery); // End of use strict
        }
    </script>

</body>

</html>