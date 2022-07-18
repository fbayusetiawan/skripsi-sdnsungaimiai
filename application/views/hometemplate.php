<?php
$linkin = $this->uri->segment(1) . '/' . $this->uri->segment(2);
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600,700,800,900" rel="stylesheet">

    <title>SDN SN Sungai Miai 5 Banjarmasin</title>
    <link rel="shortcut icon" href="<?= base_url() ?>assets/images/tutwurihanda.png">

    <!-- Bootstrap core CSS -->
    <link href="<?= base_url() ?>vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/template/css/fontawesome.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/template/css/templatemo-grad-school.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/template/css/owl.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/template/css/lightbox.css">
    <!--
    
TemplateMo 557 Grad School

https://templatemo.com/tm-557-grad-school

-->
</head>

<body>


    <!--header-->
    <header class="main-header clearfix" role="header">
        <div class="logo">
            <a href="<?= base_url() ?>"><em>SDN SN</em> 5 Banjarmasin</a>
        </div>
        <a href="#menu" class="menu-link"><i class="fa fa-bars"></i></a>
        <nav id="menu" class="main-nav" role="navigation">
            <ul class="main-menu">
                <li><a href="#section1">Beranda</a></li>
                <li class="has-submenu"><a href="#section2">Tentang Kami</a>
                    <ul class="sub-menu">
                        <li><a href="#section2">Profil Singkat</a></li>
                        <li><a href="#section3">Visi Misi</a></li>
                        <!-- <li><a href="https://templatemo.com/about" rel="sponsored" class="external">login?</a></li> -->
                    </ul>
                </li>
                <li><a href="#section4">Berita Utama</a></li>
                <li><a href="#section5">Video</a></li>
                <!-- <li><a href="#section6">Hubungi Kami</a></li> -->
                <!-- <li><a href="<?= base_url('Auth/kontak') ?>" class="external">Hubungi Kami</a></li> -->
                <li><a href="<?= base_url('Auth/login') ?>" class="external">Login</a></li>
            </ul>
        </nav>
    </header>


    <?= $contents ?>


    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <p><i class="fa fa-copyright"></i> Copyright 2022

                        | Sekolah Dasar Standar Nasional <a href="<?= base_url() ?>" rel="sponsored" target="_parent">Sungai Miai 5 Banjarmasin</a></p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <!-- Bootstrap core JavaScript -->
    <script src="<?= base_url() ?>vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url() ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="<?= base_url() ?>assets/template/js/isotope.min.js"></script>
    <script src="<?= base_url() ?>assets/template/js/owl-carousel.js"></script>
    <script src="<?= base_url() ?>assets/template/js/lightbox.js"></script>
    <script src="<?= base_url() ?>assets/template/js/tabs.js"></script>
    <script src="<?= base_url() ?>assets/template/js/video.js"></script>
    <script src="<?= base_url() ?>assets/template/js/slick-slider.js"></script>
    <script src="<?= base_url() ?>assets/template/js/custom.js"></script>
    <script>
        //according to loftblog tut
        $('.nav li:first').addClass('active');

        var showSection = function showSection(section, isAnimate) {
            var
                direction = section.replace(/#/, ''),
                reqSection = $('.section').filter('[data-section="' + direction + '"]'),
                reqSectionPos = reqSection.offset().top - 0;

            if (isAnimate) {
                $('body, html').animate({
                        scrollTop: reqSectionPos
                    },
                    800);
            } else {
                $('body, html').scrollTop(reqSectionPos);
            }

        };

        var checkSection = function checkSection() {
            $('.section').each(function() {
                var
                    $this = $(this),
                    topEdge = $this.offset().top - 80,
                    bottomEdge = topEdge + $this.height(),
                    wScroll = $(window).scrollTop();
                if (topEdge < wScroll && bottomEdge > wScroll) {
                    var
                        currentId = $this.data('section'),
                        reqLink = $('a').filter('[href*=\\#' + currentId + ']');
                    reqLink.closest('li').addClass('active').
                    siblings().removeClass('active');
                }
            });
        };

        $('.main-menu, .scroll-to-section').on('click', 'a', function(e) {
            if ($(e.target).hasClass('external')) {
                return;
            }
            e.preventDefault();
            $('#menu').removeClass('active');
            showSection($(this).attr('href'), true);
        });

        $(window).scroll(function() {
            checkSection();
        });
    </script>
</body>

</html>