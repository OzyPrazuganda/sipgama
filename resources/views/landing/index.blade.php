<!DOCTYPE html>
<html lang="en">

<head>
    <title>SIPGAMA</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:200,300,400,600,700,800,900&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('uptown-master') }}/css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('uptown-master') }}/css/animate.css">
    <link rel="stylesheet" href="{{ asset('uptown-master') }}/css/owl.carousel.min.css">
    <link rel="stylesheet" href="{{ asset('uptown-master') }}/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="{{ asset('uptown-master') }}/css/magnific-popup.css">
    <link rel="stylesheet" href="{{ asset('uptown-master') }}/css/aos.css">
    <link rel="stylesheet" href="{{ asset('uptown-master') }}/css/ionicons.min.css">
    <link rel="stylesheet" href="{{ asset('uptown-master') }}/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="{{ asset('uptown-master') }}/css/jquery.timepicker.css">
    <link rel="stylesheet" href="{{ asset('uptown-master') }}/css/flaticon.css">
    <link rel="stylesheet" href="{{ asset('uptown-master') }}/css/icomoon.css">
    <link rel="stylesheet" href="{{ asset('uptown-master') }}/css/style.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
        <div class="container">
            <a class="navbar-brand" href="index.html">Sipgama</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
                aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="oi oi-menu"></span> Menu
            </button>

            <div class="collapse navbar-collapse" id="ftco-nav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a href="/login" class="nav-link">Login</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- END nav -->

    <div class="hero-wrap ftco-degree-bg"
        style="background-image: url('{{ asset('storage/files/Perumahan Villa Gading Copy.png') }}');"
        data-stellar-background-ratio="0.5">
        <div class="container">

            <div class="row slider-text justify-content-center align-items-center">
                <div style="margin-top: -150px">
                    <section class="ftco-counter img" id="section-counter">
                        <div class="row">
                            <div class="col-lg-4 d-flex justify-content-center counter-wrap ftco-animate">
                                <div class="text d-flex align-items-center">
                                    <strong class="number" data-number="<?php echo $warga; ?>">0</strong>
                                    <span>Total <br>Populasi</span>
                                </div>
                            </div>
                            <div class="col-lg-4 d-flex justify-content-center counter-wrap ftco-animate">
                                <div class="text d-flex align-items-center">
                                    <strong class="number" data-number="<?php echo $rumah; ?>">0</strong>
                                    <span>Total <br>Rumah</span>
                                </div>
                            </div>
                            <div class="col-lg-4 d-flex justify-content-center counter-wrap ftco-animate">
                                <div class="text d-flex align-items-center">
                                    <strong class="number" data-number="<?php echo $huni; ?>">0</strong>
                                    <span>Rumah <br>Dihuni</span>
                                </div>
                            </div>
                            {{-- <div class="col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
                                <div class="text d-flex align-items-center">
                                    <strong class="number" data-number="67">0</strong>
                                    <span>Total <br>Branches</span>
                                </div>
                            </div> --}}
                        </div>
                    </section>
                </div>

                <div style="margin-top:-700px">
                    <div class="text text-center ftco-animate">
                        <h1>Sistem Informasi Pengelolaan <br>Perumahan Villa Gading Mayang</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="ftco-section ftco-no-pb">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 heading-section text-center ftco-animate mb-5">
                    <span class="subheading">Servis</span>
                    <h2 class="mb-2">Fitur utama dalam mengelola perumahan</h2>
                </div>
            </div>
            <div class="row d-flex">
                <div class="col-md-3 d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services d-block text-center">
                        <div class="icon d-flex justify-content-center align-items-center"><span
                                class="flaticon-piggy-bank"></span></div>
                        <div class="media-body py-md-4">
                            <h3>Validasi Iuran</h3>
                            <p>Verifikasi pembayaran iuran warga melalui istem terintegrasi.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services d-block text-center">
                        <div class="icon d-flex justify-content-center align-items-center"><span
                                class="flaticon-wallet"></span></div>
                        <div class="media-body py-md-4">
                            <h3>Pencatatan Keuangan</h3>
                            <p>Pencatatan laporan keuangan perumahan, termasuk pengeluaran, pemasukan, dan
                                rekapitulasi keuangan.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services d-block text-center">
                        <div class="icon d-flex justify-content-center align-items-center"><span
                                class="flaticon-file"></span></div>
                        <div class="media-body py-md-4">
                            <h3>Pengajuan Surat</h3>
                            <p>Mengusulkan penggunaan sistem terintegrasi untuk pengajuan surat yang lebih efisien,
                                dengan akses ke data warga dan riwayat pengajuan.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services d-block text-center">
                        <div class="icon d-flex justify-content-center align-items-center"><span
                                class="flaticon-locked"></span></div>
                        <div class="media-body py-md-4">
                            <h3>Pengelolaan Perumahan</h3>
                            <p>Mendukung manajemen data warga perumahan, termasuk informasi pribadi, informasi hunian,
                                dan tipe rumah yang ada di perumahan.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section ftco-agent ftco-no-pt" style="margin-top:80px">
        <div class="container">
            <div class="row justify-content-center pb-5">
                <div class="col-md-12 heading-section text-center ftco-animate">
                    <span class="subheading">Fasilitas</span>
                    <h2 class="mb-4">Fasilitas di Villa Gading Mayang</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 ftco-animate">
                    <div class="agent">
                        <div class="img">
                            <img src="{{ asset('storage/files/Pos Villa Gading.png') }}" class="img-fluid"
                                alt="Colorlib Template">
                        </div>
                        <div class="desc">
                            <h3>Pos Penjagaan</h3>
                            <p class="h-info"><span class="location">Keamanan</span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 ftco-animate">
                    <div class="agent">
                        <div class="img">
                            <img src="{{ asset('storage/files/Perumahan Villa Gading.png') }}" class="img-fluid"
                                alt="Colorlib Template">
                        </div>
                        <div class="desc">
                            <h3>Perumahan</h3>
                            <p class="h-info"><span class="location">Model Perumahan</span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 ftco-animate">
                    <div class="agent">
                        <div class="img">
                            <img src="{{ asset('storage/files/Masjid Villa Gading 2.png') }}" class="img-fluid"
                                alt="Colorlib Template">
                        </div>
                        <div class="desc">
                            <h3>Masjid</h3>
                            <p class="h-info"><span class="location">Tempat Ibadah</span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 ftco-animate">
                    <div class="agent">
                        <div class="img">
                            <img src="{{ asset('storage/files/Jalanan Villa Gading.png') }}" class="img-fluid"
                                alt="Colorlib Template">
                        </div>
                        <div class="desc">
                            <h3>Jalan Umum</h3>
                            <p class="h-info"><span class="location">Jalanan</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section ftco-no-pb" style="margin-top: -40px">
        <div class="container">
            <div class="row no-gutters">
                <div class="col-md-6 p-md-5 img img-2 d-flex justify-content-center align-items-center"
                    style="background-image: url({{ asset('storage/files/About.jpeg') }});">
                </div>
                <div class="col-md-6 wrap-about py-md-5 ftco-animate">
                    <div class="heading-section p-md-5">
                        <h2 class="mb-4">Sipgama.</h2>

                        <p>Sebuah platform berbasis informasi yang telah dirancang dan dikembangkan dengan tujuan utama
                            untuk menyokong serta mempermudah proses pengelolaan perumahan Villa Gading Mayang dalam
                            hubungannya dengan para penghuninya.
                        </p>
                        <p>Dengan fokus utama pada kesejahteraan dan kebutuhan warga perumahan, SIPGAMA telah diciptakan
                            sebagai alat yang berdaya guna untuk memastikan bahwa seluruh operasional yang berkaitan
                            dengan administrasi perumahan berjalan lancar dan efisien. Ini termasuk, namun tidak
                            terbatas pada, manajemen data warga perumahan, informasi pribadi, data rumah
                            hunian, dan jenis properti yang ada di perumahan.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="footer-59391">
        <div class="border-bottom pb-5 mb-4">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-3">
                        <form action="#" class="subscribe mb-4 mb-lg-0">
                            <div class="form-group">
                                <input type="email" class="form-control" placeholder="Enter your email">
                                <button><span class="icon-keyboard_backspace"></span></button>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-6 text-lg-center">
                        <ul class="list-unstyled nav-links nav-left mb-4 mb-lg-0">
                            <li><a href="#">Features</a></li>
                            <li><a href="#">Blog</a></li>
                            {{-- <li><a href="#">Pricing</a></li> --}}
                            <li><a href="#">Services</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-3">
                        <ul class="list-unstyled nav-links social nav-right text-lg-right">
                            <li><a href="#"><span class="icon-twitter"></span></a></li>
                            <li><a href="#"><span class="icon-instagram"></span></a></li>
                            <li><a href="#"><span class="icon-facebook"></span></a></li>
                            <li><a href="#"><span class="icon-pinterest"></span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-4 text-lg-center site-logo order-1 order-lg-2 mb-3 mb-lg-0">
                    <a href="#" class="m-0 p-0">SIPGAMA</a>
                </div>
                <div class="col-lg-4 order-2 order-lg-1 mb-3 mb-lg-0">
                    <ul class="list-unstyled nav-links m-0 nav-left">
                        <li><a href="#">Terms</a></li>
                        <li><a href="#">About</a></li>
                        <li><a href="#">Privacy</a></li>
                        <li><a href="#">Contact</a></li>
                    </ul>
                </div>

                <div class="col-lg-4 text-lg-right order-3 order-lg-3">
                    <p class="m-0 text-muted"><small>&copy; 2023. Sistem Informasi | Universitas Jambi.</small></p>
                </div>
            </div>
        </div>

    </footer>


    <!-- loader -->
    <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
            <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4"
                stroke="#eeeeee" />
            <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4"
                stroke-miterlimit="10" stroke="#F96D00" />
        </svg>
    </div>


    <script src="{{ asset('uptown-master') }}/js/jquery.min.js"></script>
    <script src="{{ asset('uptown-master') }}/js/jquery-migrate-3.0.1.min.js"></script>
    <script src="{{ asset('uptown-master') }}/js/popper.min.js"></script>
    <script src="{{ asset('uptown-master') }}/js/bootstrap.min.js"></script>
    <script src="{{ asset('uptown-master') }}/js/jquery.easing.1.3.js"></script>
    <script src="{{ asset('uptown-master') }}/js/jquery.waypoints.min.js"></script>
    <script src="{{ asset('uptown-master') }}/js/jquery.stellar.min.js"></script>
    <script src="{{ asset('uptown-master') }}/js/owl.carousel.min.js"></script>
    <script src="{{ asset('uptown-master') }}/js/jquery.magnific-popup.min.js"></script>
    <script src="{{ asset('uptown-master') }}/js/aos.js"></script>
    <script src="{{ asset('uptown-master') }}/js/jquery.animateNumber.min.js"></script>
    <script src="{{ asset('uptown-master') }}/js/bootstrap-datepicker.js"></script>
    <script src="{{ asset('uptown-master') }}/js/jquery.timepicker.min.js"></script>
    <script src="{{ asset('uptown-master') }}/js/scrollax.min.js"></script>
    <script src="{{ asset('uptown-master') }}/js/main.js"></script>

</body>

</html>
