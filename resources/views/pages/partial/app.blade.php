<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Cagar Budaya Desa Keramas | @yield('title')</title>

    <link rel="shortcut icon" href="{{ asset('assets/images/logoo.png') }}">
    <!-- Font Icons -->
    <link media="all" rel="stylesheet" href="{{ asset('assets/front/css/fonts/icomoon/icomoon.css') }}">
    <!--     <link media="all" rel="stylesheet" href="css/fonts/roxine-font-icon/roxine-font.css"> -->
    <link media="all" rel="stylesheet" href="{{ asset('assets/front/vendors/font-awesome/css/font-awesome.css') }}">
    <!-- Vendors -->
    <link media="all" rel="stylesheet"
        href="{{ asset('assets/front/vendors/owl-carousel/dist/assets/owl.carousel.min.css') }}">
    <link media="all" rel="stylesheet"
        href="{{ asset('assets/front/vendors/owl-carousel/dist/assets/owl.theme.default.min.css') }}">
    <link media="all" rel="stylesheet" href="{{ asset('assets/front/vendors/animate/animate.css') }}">
    <link media="all" rel="stylesheet" href="{{ asset('assets/front/vendors/rateyo/jquery.rateyo.css') }}">
    <link media="all" rel="stylesheet" href="{{ asset('assets/front/vendors/bootstrap-datepicker/css/bootstrap-datepicker.css') }}">
    <link media="all" rel="stylesheet" href="{{ asset('assets/front/vendors/fancyBox/source/jquery.fancybox.css') }}">
    <link media="all" rel="stylesheet"
        href="{{ asset('assets/front/vendors/fancyBox/source/helpers/jquery.fancybox-thumbs.css') }}">
    <!-- Bootstrap 4 -->
    <link media="all" rel="stylesheet" href="{{ asset('assets/front/css/bootstrap.css') }}">
    <!-- Rev Slider -->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/front/vendors/rev-slider/revolution/css/settings.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/front/vendors/rev-slider/revolution/css/layers.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/front/vendors/rev-slider/revolution/css/navigation.css') }}">
    <!-- Theme CSS -->
    <link media="all" rel="stylesheet" href="{{ asset('assets/front/css/main.css') }}">
    <!-- Custom CSS -->
    {{-- <link media="all" rel="stylesheet" href="{{ asset('assets/front/css/custom.css') }}"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{-- Plugin Swipper --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />

    {{-- Leaflet --}}
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css"
        integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI="
        crossorigin=""/>
        {{-- <link media="all" rel="stylesheet" href="/assets/web/css/custom.css"> --}}
        <link href="https://cdn.jsdelivr.net/npm/remixicon@3.4.0/fonts/remixicon.css" rel="stylesheet">
</head>

<body class="white-overlay">
    <div class="preloader" id="pageLoad">
        <div class="holder">
            <div class="coffee_cup"></div>
        </div>
    </div>
    <!--Side panel-->
    <nav class="nav-wrap bg-white">
        <!-- opener inside of collapsible menu -->
        <div class="nav-trigger nav-trigger-close">
            <a href="#">Close Panel <i class="icon-long-arrow-right"></i> </a>
            <div class="divider-border"><span class="sr-only"></span></div>
        </div>

        <div class="col-sm-6 pb-3">
            <a href="#" class="btn btn-black btn-small-font btn-solid-facebook has-radius-small"><span
                    class="icon-facebook"><span class="sr-only">&nbsp;</span></span> LOGIN WITH FACEBOOK</a>
        </div>
        <div class="col-sm-6">
            <a href="#" class="btn btn-black btn-small-font btn-solid-google has-radius-small"><span
                    class="icon-google-plus"><span class="sr-only">&nbsp;</span></span> LOGIN WITH GOOGLE</a>
        </div>
        <div class="divider-border"><span class="sr-only"></span></div>
        <ul class="side-nav">
            <li><a href="index.html">Home</a></li>
            <li><a href="about.html">About</a></li>
            <li><a href="blog-single.html">Blog</a></li>
            <li><a href="contact.html">Contact</a></li>
        </ul>
        <nav class="header-links">
            <ul>
                <li><a href="#">Login</a></li>
                <li><a href="#">Register</a></li>
            </ul>
        </nav>
        <div class="divider-border"><span class="sr-only"></span></div>
        <div class="p-3">
            <ul class="social-network square-icon shadowed-icon">
                <li><a href="#"><span class="icon-facebook"></span></a></li>
                <li><a href="#"><span class="icon-twitter"></span></a></li>
                <li><a href="#"><span class="icon-google-plus"></span></a></li>
                <li><a href="#"><span class="icon-pinterest"></span></a></li>
                <li><a href="#"><span class="icon-dribbble"></span></a></li>
            </ul>
        </div>
    </nav>
    <!-- main wrapper -->
    <div id="wrapper" class="no-overflow-x">
        <div class="page-wrapper">
            <!-- header of the page -->
            @include('pages.partial.navbar')
            <!--/header of the page -->
            <!--/content of the page -->
            @yield('content')
            <!--/content of the page -->
        </div>
        <!-- footer of the pagse -->
        @include('pages.partial.footer')
        <!--/footer of the page -->
        @stack('modal')
    </div>
    <!-- open/close -->
    <div class="search-form-wrapper overlay overlay-hugeinc">
        <button type="button" class="overlay-close"><span class="custom-icon-plus"></span></button>
        <div class="search-form">
            <form action="#" method="post">
                <div class="form-group">
                    <input type="search" class="form-control" placeholder="Enter Your Search">
                    <button type="submit"><span class="icon-search"></span></button>
                </div>
            </form>
        </div>
    </div>
    <a href="#" class="section-scroll" id="scroll-to-top"><i class="fa fa-angle-up"></i></a>
    <!-- jQuery Library -->
    <script src="{{ asset('assets/front/vendors/jquery/jquery-2.1.4.min.js') }}"></script>
    <!-- Vendor Scripts -->
    <script src="{{ asset('assets/front/vendors/tether/dist/js/tether.min.js') }}"></script>
    <script src="{{ asset('assets/front/vendors/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/front/vendors/stellar/jquery.stellar.min.js') }}"></script>
    <script src="{{ asset('assets/front/vendors/isotope/javascripts/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/front/vendors/isotope/javascripts/packery-mode.pkgd.js') }}"></script>
    <script src="{{ asset('assets/front/vendors/owl-carousel/dist/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/front/vendors/waypoint/waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/front/vendors/counter-up/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('assets/front/vendors/fancyBox/source/jquery.fancybox.pack.js') }}"></script>
    <script src="{{ asset('assets/front/vendors/fancyBox/source/helpers/jquery.fancybox-thumbs.js') }}"></script>
    <script src="{{ asset('assets/front/vendors/image-stretcher-master/image-stretcher.js') }}"></script>
    <script src="{{ asset('assets/front/vendors/wow/wow.min.js') }}"></script>
    <script src="{{ asset('assets/front/vendors/rateyo/jquery.rateyo.min.js') }}"></script>
    <script src="{{ asset('assets/front/vendors/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('assets/front/vendors/bootstrap-slider-master/src/js/bootstrap-slider.js') }}"></script>
    <script src="{{ asset('assets/front/vendors/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('assets/front/js/mega-menu.js') }}"></script>
    <script src="{{ asset('assets/front/vendors/retina/retina.min.js') }}"></script>
    <!-- Custom Script -->
    <script src="{{ asset('assets/front/js/jquery.main.js') }}"></script>
    <!-- REVOLUTION JS FILES -->
    <script type="text/javascript"
        src="{{ asset('assets/front/vendors/rev-slider/revolution/js/jquery.themepunch.tools.min.js') }}"></script>
    <script type="text/javascript"
        src="{{ asset('assets/front/vendors/rev-slider/revolution/js/jquery.themepunch.revolution.min.js') }}"></script>
    <!-- SLIDER REVOLUTION 5.0 EXTENSIONS  (Load Extensions only on Local File Systems !  The following part can be removed on Server for On Demand Loading) -->
    <script type="text/javascript"
        src="{{ asset('assets/front/vendors/rev-slider/revolution/js/extensions/revolution.extension.actions.min.js') }}">
    </script>
    <script type="text/javascript"
        src="{{ asset('assets/front/vendors/rev-slider/revolution/js/extensions/revolution.extension.carousel.min.js') }}">
    </script>
    <script type="text/javascript"
        src="{{ asset('assets/front/vendors/rev-slider/revolution/js/extensions/revolution.extension.kenburn.min.js') }}">
    </script>
    <script type="text/javascript"
        src="{{ asset('assets/front/vendors/rev-slider/revolution/js/extensions/revolution.extension.layeranimation.min.js') }}">
    </script>
    <script type="text/javascript"
        src="{{ asset('assets/front/vendors/rev-slider/revolution/js/extensions/revolution.extension.migration.min.js') }}">
    </script>
    <script type="text/javascript"
        src="{{ asset('assets/front/vendors/rev-slider/revolution/js/extensions/revolution.extension.navigation.min.js') }}">
    </script>
    <script type="text/javascript"
        src="{{ asset('assets/front/vendors/rev-slider/revolution/js/extensions/revolution.extension.parallax.min.js') }}">
    </script>
    <script type="text/javascript"
        src="{{ asset('assets/front/vendors/rev-slider/revolution/js/extensions/revolution.extension.slideanims.min.js') }}">
    </script>
    <script type="text/javascript"
        src="{{ asset('assets/front/vendors/rev-slider/revolution/js/extensions/revolution.extension.video.min.js') }}">
    </script>
    <!-- SNOW ADD ON -->
    <script type="text/javascript"
        src="{{ asset('assets/front/vendors/rev-slider/revolution-addons/snow/revolution.addon.snow.min.js') }}">
    </script>
    <!-- Revolution Slider Script -->
    <script src="{{ asset('assets/front/js/revolution.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js"></script>

    
    @stack('scripts')
</body>

</html>